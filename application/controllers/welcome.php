<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model', 'product');
        $this->load->model('content_model', 'post_data');
        $this->load->library('form_validation');
        $this->auth = new stdClass;
        $this->load->library('flexi_auth');
        $city1 = $this->session->userdata('city');
        $this->common_model->check_is_city_set();
    }

    public function index() {
        /**  $data['METATITLE'] = "Home";
          $data['METAKEYWORDS'] = "Home";
          $data['METADESCRIPTION'] = "Home";
          $data['current_page_slug'] = "Home";
          $data['banner_slider'] = $this->common_model->getBannerRecords('1');
          $data['banner_promotional'] = $this->common_model->getBannerRecords('2');
          $data['home_product_types'] = $this->product->get_product_types(6);
          $data['home_categories'] = $this->product->get_categories(0, 4);
          $data['city_id'] = $this->session->userdata('city');
          $data['category_data'] = $this->common_model->getFieldsFromAnyTable('parent_id', 0, 'tbl_category', FALSE, FALSE, 'active');
          $this->load->view($this->config->item('template') . '/header', $data);
          $this->load->view($this->config->item('template') . '/home');
          $this->load->view($this->config->item('template') . '/footer'); */
        redirect(site_url('login'));
    }

    public function compare() {
        $this->load->view($this->config->item('template') . '/header');
        $this->load->view($this->config->item('template') . '/compare');
        $this->load->view($this->config->item('template') . '/footer');
    }

    public function productByTypeId() {
        $typeId = $this->input->post('prd_type_id');
        $data['product_data'] = $product_list = $this->product->getProductByArguments(FALSE, $typeId, FALSE, FALSE, FALSE, 6);
        if ($product_list) {
            $response['html'] = $this->load->view($this->config->item('template') . '/product_html/product_div', $data, true);
        }
        $response['success'] = true;
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function subscriber() {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|valid_email|is_unique[tbl_subscriber.email_id]');
            if ($this->form_validation->run()) {
                $this->common_model->addSubscriber();
                $msg = 'Subscribed succesfully';
                echo json_encode($msg);
                die;
            } else {
                $msg = 'Please Enter a valid email or Email Already Subscribed';
                echo json_encode($msg);
                die;
            }
        }
    }

    function change_language($lang_abbr) {
        $this->session->set_userdata('language', $lang_abbr);
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

}
