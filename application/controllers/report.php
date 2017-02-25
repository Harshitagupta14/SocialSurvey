<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model', 'product');
        $this->load->model('content_model', 'post');
        $this->load->model('survey_model', 'survey');
        $this->load->model('report_model', 'report');
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

    public function index() {
        $data['id'] = $user_id = $this->flexi_auth->get_user_by_identity_row_array()['uacc_id'];
        $cond = array("user_id_fk" => $user_id);
        $data['surveys'] = $this->common_model->fetch_where("tbl_survey", "*", $cond);
        $cond1 = array("uacc_parent_id_fk" => $user_id);
        $data['auditors'] = $this->common_model->fetch_where("user_accounts", "*", $cond1);
        $data['METATITLE'] = "SocialSurvey - Report";
        $data['METAKEYWORDS'] = "SocialSurvey - Report";
        $data['METADESCRIPTION'] = "SocialSurvey - Report";
        $this->load->view($this->config->item('template') . '/report/header/header_report', $data);
        $this->load->view($this->config->item('template') . '/report/main_contents/report');
        $this->load->view($this->config->item('template') . '/report/footer/footer_report');
    }

    function ajax_generate_surveyor_reports() {
        $data['reports'] = $this->report->get_reports();
        echo json_encode($data);
        die;
    }

}
