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
        $this->auth = new stdClass;
        $this->load->library('flexi_auth');
    }

    public function survey_step_1() {
        $data['category_data'] = $this->common_model->getFieldsFromAnyTable('parent_id', 0, 'tbl_category', FALSE, FALSE, 'active');
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
        $survey_id = $this->common_model->fetch_where('tbl_survey', 'id', array('survey_id' => $date_md))[0];
        $data['METATITLE'] = "Create Survey - Step 1";
        $data['METAKEYWORDS'] = "Create Survey - Step 1";
        $data['METADESCRIPTION'] = "Create Survey - Step 1";
        $data['id'] = $this->flexi_auth->get_user_by_identity_row_array()['uacc_id'];
        //$data['current_page_slug'] = "categories";
        $data['breadcrumb'] = '<li class="active">Services</li>';
        $data['survey_types'] = $this->common_model->fetch_where('tbl_survey_question_type');
        $data['survey_id'] = $survey_id['id'];
        //$data['table_survey_id'] = $date_md;

        $this->load->view($this->config->item('template') . '/header_dashboard', $data);
        $this->load->view($this->config->item('template') . '/survey/step_2');
        // $this->load->view($this->config->item('template') . '/footer_dashboard');
    }

    public function serializedFormDatajQuery2Array($serializedArr) {
        $aFormData = array();
        foreach ($serializedArr as $aRow) {

            if (isset($aFormData[$aRow['name']]) && !is_array($aFormData[$aRow['name']])) {

                $sValue = $aFormData[$aRow['name']];
                $aFormData[$aRow['name']] = array();
                $aFormData[$aRow['name']][] = $sValue;
                $aFormData[$aRow['name']][] = $aRow['value'];
                continue;
            }

            if (is_array($aFormData[$aRow['name']])) {
                $aFormData[$aRow['name']][] = $sValue;
                continue;
            }

            $aFormData[$aRow['name']] = $aRow['value'];
        }

        return $aFormData;
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
            'question_help_text' => $this->input->post('help_text_note'),
            'question_one_word' => $this->input->post('unique_one_word'),
            'question_limit_lower' => $this->input->post('qLimitLow'),
            'question_limit_upper' => $this->input->post('qLimitUp'),
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
        foreach ($question_data as $question) {
            $question_list .= "<div data-question-id='" . $question['question_no'] . "' style='margin-bottom:10px;'> Question " . $question['question_no'] . "<span style='margin-left:30px;' class='btn btn-circle btn-icon-only btn-default' onclick='edit_question(" . $question['question_no'] . ");'><i class='fa fa-edit'></i></span></div>";
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
        $question_data = $this->survey->get_survey_questions_by_args($id, $question_no);
        if (count($question_data[0]) > 0) {
            $data = array('question_data' => $question_data[0], 'success' => "true");
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
        $response = $this->survey->delete_data('tbl_survey_question', $cond);
        if ($response) {
            $data = array('response' => $response, 'success' => "true");
        } else {
            $data = array('success' => "false");
        }
        echo json_encode($data);
        die;
    }

}
