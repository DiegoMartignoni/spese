<?php
class Registra extends CI_Controller {

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
    $data['lista_pagamenti'] = $this->Transazioni_model->get_pagamenti();
    $this->load->view('templates/header');
    $this->load->view('registra/create', $data);
    $this->load->view('templates/footer');
  }

  public function create(){
    /*$this->form_validation->set_rules('titolo', 'Titolo', 'required');
    $this->form_validation->set_rules('casuale', 'Causale', 'required');

    if ($this->form_validation->run() === false) {
      header('Location: '.base_url().'lista');
    } else {*/
      $this->Transazioni_model->create_transazione();
      if ($this->input->post('button') == "exit") {
        header('Location: '.base_url().'lista');
      } else {
        $data['lista_pagamenti'] = $this->Transazioni_model->get_pagamenti();
        $this->load->view('templates/header');
        $this->load->view('registra/create', $data);
        $this->load->view('templates/footer');
      }
    //}
  }

  /*public function sort($tipo, $ordine){
    if ($tipo == "titolo") {
      $data['spese'] = $this->Transazioni_model->get_spese($tipo, $ordine);
      $data['ordinato_per'] = "Titolo";
    }

    $this->load->view('templates/header');
    $this->load->view('spese/index', $data);
    $this->load->view('templates/footer');
  }*/
}
