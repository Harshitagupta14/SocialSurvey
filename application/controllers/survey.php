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
            $this->form_validation->set_rules('survey_title', 'Survey Title', 'trim|required');
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" id="message" role="alert"><p class="text-primary">Survey <b>' . $this->input->post('survey_title') . '</b> created successfully start adding question to it.</p></div>');
                redirect('survey/' . $date_md);
                exit();
            } else {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->load->view($this->config->item('template') . '/survey/header/header_dashboard', $data);
        $this->load->view($this->config->item('template') . '/survey/main_contents/step_1');
        $this->load->view($this->config->item('template') . '/survey/footer/footer_dashboard');
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
        $data['survey_title'] = $survey_data['survey_title'];
        $data['table_survey_id'] = $date_md;
        if ($survey_data['publish_time'] != '0000-00-00 00:00:00') {
            $data['publish_update'] = $this->components->time_elapsed_string(date($survey_data['publish_time']));
        }
        $this->load->view($this->config->item('template') . '/survey/header/header_dashboard', $data);
        $this->load->view($this->config->item('template') . '/survey/main_contents/step_2');
        $this->load->view($this->config->item('template') . '/survey/footer/step_2_footer', $data);
        $this->load->view($this->config->item('template') . '/survey/footer/footer_dashboard');
    }

    public function ajax_save_question() {
        parse_str($_POST['str'], $_POST);
        $type = $this->input->post("survey_type");
        $config = array(
            'default' => array(
                array(
                    'field' => 'question_title',
                    'label' => 'Question Title',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'survey_type',
                    'label' => 'Survey Type',
                    'rules' => 'required',
                ),
            ),
            'sb' => array(
                array(
                    'field' => 'question_limit_upper',
                    'label' => 'Max Characters allowed',
                    'rules' => 'required|numeric',
                ),
            ),
            'mq' => array(
                array(
                    'field' => 'multiple_choice',
                    'label' => 'Multiple Choice',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'question_limit_lower',
                    'label' => 'Min Characters allowed',
                    'rules' => 'required|numeric',
                ),
                array(
                    'field' => 'question_limit_upper',
                    'label' => 'Max Characters allowed',
                    'rules' => 'required|numeric',
                ),
            ),
            'nm' => array(
                array(
                    'field' => 'question_limit_lower',
                    'label' => 'Min Characters allowed',
                    'rules' => 'required|numeric',
                ),
            ),
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config['default']);
        if ($this->form_validation->run() === TRUE) {
            $this->form_validation->set_rules($config[$type]);
            if ($this->form_validation->run() === TRUE) {
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
            } else {
                $this->form_validation->set_error_delimiters('', '');
                $data['success'] = "false";
                $data['error'] = validation_errors();
            }
        } else {
            $this->form_validation->set_error_delimiters('', '');
            $data['success'] = "false";
            $data['error'] = validation_errors();
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
            $data['question_data'] = $this->common_model->fetch_where('tbl_survey_question', '*', array('survey_fk_id' => $this->input->post('survey_id'), 'question_no' => $this->input->post('question_no')))[0];
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
        $question_count = $this->common_model->num_rows('tbl_survey_question', array('survey_fk_id' => $id));
        if ($question_count == 0) {
            $this->common_model->update_data('tbl_survey', array('id' => $id), array("survey_status" => 'draft'));
        }
        if ($response) {
            $data = array('response' => $response, 'question_count' => $question_count, 'success' => "true");
        } else {
            $data = array('question_count' => $question_count, 'success' => "false");
        }
        echo json_encode($data);
        die;
    }

    function ajax_publish_data() {
        $id = $this->input->post('survey_id');
        $data = array("survey_status" => 'published', "publish_time" => date('Y-m-d h:i:s'));
        $cond = array('id' => $id);
        $response = $this->common_model->update_data('tbl_survey', $cond, $data);
        $update_time = $this->components->time_elapsed_string(date('Y-m-d h:i:s'));
        if ($response) {
            $data = array('response' => $response, 'update_time' => $update_time, 'success' => "true");
        } else {
            $data = array('success' => "false");
        }
        echo json_encode($data);
        die;
    }

    function ajax_unpublish_data() {
        $id = $this->input->post('survey_id');
        $data = array("survey_status" => 'draft');
        $cond = array('survey_id' => $id);
        $response = $this->common_model->update_data('tbl_survey', $cond, $data);
        if ($response) {
            $data = array('response' => $response, 'success' => "true");
        } else {
            $data = array('success' => "false");
        }
        echo json_encode($data);
        die;
    }

}
