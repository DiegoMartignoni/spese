<?php
class Portafoglio extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //$this->load->model('news_model');
    $this->load->helper('url_helper');
  }

  public function index(){
    $data['budgets'] = $this->Portafoglio_model->get_budget();
    $giorno = date('w');
    $veroGiorno = ($giorno == 0) ? 6 : $giorno - 1 ;
    $settimanaInizio = date('Y-m-d', strtotime('-'.$veroGiorno.' days'));
    foreach ($data['budgets'] as $budget) {
      $data['trans_settimana'][$budget['idPagamento']] = $this->Portafoglio_model->get_count_by_date($settimanaInizio, $budget['idPagamento']);
      $data['trans_mese'][$budget['idPagamento']] = $this->Portafoglio_model->get_count_by_date(date('Y-m-01'), $budget['idPagamento']);
      $data['trans_anno'][$budget['idPagamento']] = $this->Portafoglio_model->get_count_by_date(date('Y-01-01'), $budget['idPagamento']);
    }

    $this->load->view('templates/header');
    $this->load->view('portafoglio/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit_budget(){
    if ($this->Transazioni_model->create_transazione()) {
      redirect('portafoglio');
    }
  }

}
