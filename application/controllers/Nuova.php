<?php
class Nuova extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //$this->load->model('news_model');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->helper('url_helper');
    $this->load->library('session');
  }

  public function index()
  {
    $this->load->view('templates/header');
    $this->load->view('spese/create');
    $this->load->view('templates/footer');
  }

  public function create(){
    /*$this->form_validation->set_rules('titolo', 'Titolo', 'required');
    $this->form_validation->set_rules('casuale', 'Causale', 'required');

    if ($this->form_validation->run() === false) {
      header('Location: '.base_url().'lista');
    } else {*/
      $this->Spese_model->create_spesa();
      if ($this->input->post('button') == "exit") {
        header('Location: '.base_url().'lista');
      } else {
        $this->load->view('templates/header');
        $this->load->view('spese/create');
        $this->load->view('templates/footer');
      }
    //}
  }

  /*public function sort($tipo, $ordine){
    if ($tipo == "titolo") {
      $data['spese'] = $this->Spese_model->get_spese($tipo, $ordine);
      $data['ordinato_per'] = "Titolo";
    }

    $this->load->view('templates/header');
    $this->load->view('spese/index', $data);
    $this->load->view('templates/footer');
  }*/
}
