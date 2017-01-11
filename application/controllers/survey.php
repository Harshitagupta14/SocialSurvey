<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Survey extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model', 'product');
        $this->load->model('content_model', 'post');
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
            $this->form_validation->set_rules('survey_title', 'Survey Title', 'trim|required');
            $this->form_validation->set_rules('survey_category', 'Category', 'trim|required');
            if ($this->form_validation->run()) {
                $date = date('Y-m-d H:i:s');
                $data_survey = array(
                    'survey_title' => $this->input->post('survey_title'),
                    'survey_category' => $this->input->post('survey_category'),
                    'survey_type' => $this->input->post('survey_type'),
                    'user_id_fk' => $this->flexi_auth->get_user_by_identity_row_array()['uacc_id'],
                    'add_time' => $date
                );
                $date_md = md5($date);
                $data_survey["survey_id"] = $date_md;
                $this->common_model->insert_data('tbl_survey', $data_survey);
                $uniqueId = uniqid($this->input->ip_address(), TRUE);
                $this->session->set_userdata("my_session_id", md5($uniqueId));
                redirect('survey/' . $date_md);
                exit();
            }
        }
        $this->load->view($this->config->item('template') . '/header_dashboard', $data);
        $this->load->view($this->config->item('template') . '/survey/step_1');
        $this->load->view($this->config->item('template') . '/footer_dashboard');
    }

    public function survey_step_2($date_md = NULL) {

        //$data['category_data'] = $this->common_model->getFieldsFromAnyTable('parent_id', 0, 'tbl_category', FALSE, FALSE, 'active');
        $select_id = $this->common_model->fetch_where('tbl_survey', '*', array('survey_id' => $date_md))[0];
        $data['METATITLE'] = "Create Survey - Step 1";
        $data['METAKEYWORDS'] = "Create Survey - Step 1";
        $data['METADESCRIPTION'] = "Create Survey - Step 1";
        $data['id'] = $this->flexi_auth->get_user_by_identity_row_array()["uacc_id"];
        //$data['current_page_slug'] = "categories";
        $data['breadcrumb'] = '<li class="active">Services</li>';
        $data['survey_types'] = $this->common_model->fetch_where('tbl_survey_question_type');
        $data['survey_id'] = $select_id["id"];
        $this->load->view($this->config->item('template') . '/header_dashboard', $data);
        $this->load->view($this->config->item('template') . '/survey/step_2');
        $this->load->view($this->config->item('template') . '/footer_dashboard');
    }

    public function ajax_save_question() {
        if ($_POST) {
            $type = $this->input->post("type");
            $select_type = $this->db->get_where("tbl_survey_question_type", array("type_small_name" => $type));
            $type_id = $select_type->row()->id;
            $data_array = array(
                'question_title' => $this->input->post('question_title'),
                'question_help_text' => $this->input->post('help_text_note'),
                'question_one_word' => $this->input->post('unique_one_word'),
                'question_limit_lower' => $this->input->post('qLimitLow'),
                'question_limit_upper' => $this->input->post('max_input'),
                'question_multiple_options' => $this->input->post('multiple_choice'),
                'survey_fk_id' => json_decode($this->input->post('survey_id')),
                'type_id_fk' => $type_id,
                'question_no' => $this->input->post('i'),
                'add_time' => date('Y-m-d H:i:s')
            );

            $this->common_model->insert_data('tbl_survey_question', $data_array);
            $id = $this->db->insert_id();
            if ($id == '') {
                $data['success'] = "false";
            } else {
                $data['question_data'] = $this->common_model->fetch_where('tbl_survey_question', '*', array('id' => $id))[0];
                $data['success'] = "true";
            }
            echo json_encode($data);
            die;
        }
    }

}
