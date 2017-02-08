<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Survey extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model', 'product');
        $this->load->model('content_model', 'post');
        $this->load->model('survey_model', 'survey');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('components');
        $this->auth = new stdClass;
        $this->load->library('flexi_auth');
        if (!$this->flexi_auth->is_logged_in()) {
            $this->flexi_auth->set_error_message('You must login to access this area.', TRUE);
            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            redirect($this->config->item('login_url'));
        }
    }

    public function survey_step_1() {
        $data['survey_category_data'] = $this->common_model->fetch_where('tbl_survey_category', '*', array('parent_id' => '0', 'status' => 'active'));
        $data['METATITLE'] = "Create Survey - Step 1";
        $data['METAKEYWORDS'] = "Create Survey - Step 1";
        $data['METADESCRIPTION'] = "Create Survey - Step 1";
        //$data['current_page_slug'] = "categories";
        $data['breadcrumb'] = '<li class="active">Services</li>';
        if (!empty($_POST)) {
            $this->form_validation->set_rules('survey_title', 'Survey Title', 'trim|required|is_unique[tbl_survey.survey_title]');
            $this->form_validation->set_rules('survey_category', 'Category', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $date = date('Y-m-d H:i:s');
                $data_survey = array(
                    'survey_title' => $this->input->post('survey_title'),
                    'survey_category' => $this->input->post('survey_category'),
                    'survey_type' => $this->input->post('survey_type'),
                    'user_id_fk' => $this->flexi_auth->get_user_by_identity_row_array()['uacc_id'],
                    'add_time' => $date
                );
                $date_md = md5($date);
                $data_survey['survey_id'] = $date_md;
                $this->common_model->insert_data('tbl_survey', $data_survey);
                $uniqueId = uniqid($this->input->ip_address(), TRUE);
                $this->session->set_userdata('my_session_id', md5($uniqueId));
                redirect('survey/' . $date_md);
                exit();
            } else {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->load->view($this->config->item('template') . '/header_dashboard', $data);
        $this->load->view($this->config->item('template') . '/survey/step_1');
        $this->load->view($this->config->item('template') . '/footer_dashboard');
    }

    public function survey_step_2($date_md = NULL) {
        $data['survey_data'] = $survey_data = $this->common_model->fetch_where('tbl_survey', '*', array('survey_id' => $date_md))[0];
        $data['METATITLE'] = "Create Survey - Step 1";
        $data['METAKEYWORDS'] = "Create Survey - Step 1";
        $data['METADESCRIPTION'] = "Create Survey - Step 1";
        $data['id'] = $this->flexi_auth->get_user_by_identity_row_array()['uacc_id'];
        //$data['current_page_slug'] = "categories";
        $data['breadcrumb'] = '<li class="active">Services</li>';
        $data['survey_types'] = $this->common_model->fetch_where('tbl_survey_question_type');
        $data['survey_id'] = $survey_data['id'];
        //$data['table_survey_id'] = $date_md;

        $this->load->view($this->config->item('template') . '/header_dashboard', $data);
        $this->load->view($this->config->item('template') . '/survey/step_2');
        $this->load->view($this->config->item('template') . '/footer_dashboard');
    }

    public function ajax_save_question() {
        parse_str($_POST['str'], $_POST);
        if ($_POST && $_POST['question_title'] != '') {
            $id = $this->handle_save_survey_question();
        }
        if ($id == '') {
            $data['success'] = "false";
        } else {
            $next_question_no = $this->input->post('question_no') + 1;
            $data['prev_question_no'] = $this->input->post('question_no');
            $data['next_question_no'] = $next_question_no;
            $data['question_data'] = $this->common_model->fetch_where('tbl_survey_question', '*', array('id' => $id))[0];
            $data['success'] = "true";
            $data['success_state'] = "save";
        }
        echo json_encode($data);
        die;
    }

    public function handle_save_survey_question() {

        $type = $this->input->post("survey_type");
        $select_type = $this->common_model->fetch_where('tbl_survey_question_type', '*', array('type_small_name' => $type))[0];
        $type_id = $select_type['id'];

        if ($this->input->post('multiple_choice') != 0) {
            $multiple_choice = implode("|", $this->input->post('multiple_choice'));
        } else {
            $multiple_choice = 0;
        }
        $data_array = array(
            'question_title' => $this->input->post('question_title'),
            'question_help_text' => $this->input->post('question_help_text'),
            'question_one_word' => $this->input->post('question_one_word'),
            'question_limit_lower' => $this->input->post('question_limit_lower'),
            'question_limit_upper' => $this->input->post('question_limit_upper'),
            'question_multiple_options' => $multiple_choice,
            'survey_fk_id' => $this->input->post('survey_id'),
            'type_id_fk' => $type_id,
            'question_no' => $this->input->post('question_no'),
            'add_time' => date('Y-m-d H:i:s')
        );
        if ($this->input->post('question_state') == "save") {
            $this->common_model->insert_data('tbl_survey_question', $data_array);
            return $this->db->insert_id();
        } else {
            $this->common_model->update_data('tbl_survey_question', array('survey_fk_id' => $this->input->post('survey_id'), 'question_no' => $this->input->post('question_no')), $data_array);
            $data['success'] = "true";
            $data['success_state'] = "update";
            echo json_encode($data);
            die;
        }
    }

    public function ajax_get_survey_questions() {
        $id = $this->input->post('survey_id');
        $question_data = $this->survey->get_survey_questions_by_args($id);
        $question_list = '';
        foreach ($question_data as $key => $value) {
            $active = "class='row question-row'";
            if ($key == 0) {
                $active = "class='question-active row question-row'";
            }
            $question_list .= "<div data-question-id='" . $value['question_no'] . "' style='margin-bottom:10px;'" . $active . "><span class='badge badge-danger' style='margin-right:10px;'> " . $value['question_no'] . " </span>" . $value['question_title'] . "</br><div class='col-lg-7 col-md-7 col-sm-7 col-xs-7'><label class='label label-warning'>" . $value['type_name'] . "</label></div><div class='col-lg-5 col-md-5 col-sm-5 col-xs-5'><span class='btn btn-icon-only btn-default' onclick='edit_question(" . $value['question_no'] . ");'><i class='fa fa-edit'></i></span></div></div>";
        }
        if (count($question_data[0]) > 0) {
            $data = array('question_list' => $question_list,
                'first_question' => $question_data[0], 'success' => "true");
        } else {
            $data = array('success' => "false");
        }
        echo json_encode($data);
        die;
    }

    function ajax_edit_survey_question() {
        $id = $this->input->post('survey_id');
        $question_no = $this->input->post('question_no');
        $question_list_data = $this->survey->get_survey_questions_by_args($id);
        $question_data = $this->survey->get_survey_questions_by_args($id, $question_no);
        $question_list = '';
        foreach ($question_list_data as $key => $value) {
            $active = "class='row question-row'";
            if ($key == $question_no - 1) {
                $active = "class='question-active row question-row'";
            }
            $question_list .= "<div data-question-id='" . $value['question_no'] . "' style='margin-bottom:10px;'" . $active . "><span class='badge badge-danger' style='margin-right:10px;'> " . $value['question_no'] . " </span>" . $value['question_title'] . "</br><div class='col-lg-7 col-md-7 col-sm-7 col-xs-7'><label class='label label-warning'>" . $value['type_name'] . "</label></div><div class='col-lg-5 col-md-5 col-sm-5 col-xs-5'><span class='btn btn-icon-only btn-default' onclick='edit_question(" . $value['question_no'] . ");'><i class='fa fa-edit'></i></span></div></div>";
        }
        if (count($question_data[0]) > 0) {
            $data = array('question_list' => $question_list, 'question_data' => $question_data[0], 'success' => "true");
        } else {
            $data = array('success' => "false");
        }
        echo json_encode($data);
        die;
    }

    function ajax_delete_survey_question() {
        $id = $this->input->post('survey_id');
        $question_no = $this->input->post('question_no');
        $cond = array('question_no' => $question_no,
            'survey_fk_id' => $id);
        $response = $this->common_model->delete_data('tbl_survey_question', $cond);
        $this->survey->rearrange_survey_question_no($question_no);
        if ($response) {
            $data = array('response' => $response, 'success' => "true");
        } else {
            $data = array('success' => "false");
        }
        echo json_encode($data);
        die;
    }

}
