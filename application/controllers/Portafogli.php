<?php
class Portafogli extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //$this->load->model('news_model');
    $this->load->helper('url_helper');
  }

  public function index(){
    $data['budgets'] = $this->Portafogli_model->get_budget();

    $this->load->view('templates/header');
    $this->load->view('portafogli/index', $data);
    $this->load->view('templates/footer');
  }

}
