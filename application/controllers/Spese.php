<?php
class Spese extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //$this->load->model('news_model');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->helper('url_helper');
    $this->load->library('session');
  }

  public function index($tipo = "idSpesa", $ordine = "desc", $filtra = "disabled")
  {
    $this->session->set_flashdata('pagamento', 'disabled');
    //$tipo = 'idSpesa';
    //$ordine = 'DESC';
    switch ($ordine) {
      case 'desc':
        $print_ordine = "decrescente";
        break;

      default:
        $print_ordine = "crescente";
        break;
    }
    if ($tipo == "idSpesa") {
      $print_ordine = "<u>ultimo inserito</u>";
    }
    $data['spese'] = $this->Spese_model->get_spese($tipo, $ordine);
    $data['ordinato_per'] = "<span class='badge badge-secondary'>".ucwords($tipo)."</span> ".$print_ordine;
    //$data['filtraPer'] = $filtra;

    $this->session->set_userdata('spese', $data['spese']);
    $this->session->set_userdata('ordinato_per', $data['ordinato_per']);

    $this->load->view('templates/header');
    $this->load->view('spese/index', $data);
    $this->load->view('templates/footer');
  }

  public function delete($id)
  {
    if ($this->Spese_model->delete_spesa($id)) {
      redirect('lista');
    }
  }

  public function sort_by_date(){
    $this->session->set_flashdata('pagamento', 'disabled');
    $inizio = $this->input->post('inizio');
    $fine = $this->input->post('fine');
    $datainizioanno = ($inizio == date("Y-01-01")) ? "l'<u>inizio di quest'anno</u>" : " ".date("d/m/Y", strtotime($inizio));
    $dataoggi = ($fine == date("Y-m-d")) ? " <u>oggi</u>" : "l ".date("d/m/Y",strtotime($fine)) ;

    $data['spese'] = $this->Spese_model->get_by_date($inizio, $fine);
    $ultimaSpesa = $data['spese'];
    $data['ordinato_per'] = "<span class='badge badge-secondary'>Data</span> dal".$datainizioanno." a".$dataoggi;

    $this->session->set_userdata('spese', $data['spese']);
    $this->session->set_userdata('ordinato_per', $data['ordinato_per']);

    $this->load->view('templates/header');
    $this->load->view('spese/index', $data);
    $this->load->view('templates/footer');
  }

  public function filter_by(){
    $this->session->set_flashdata('pagamento', $this->input->post('opzioneTipo'));
    $data['spese'] = $_SESSION['spese'];
    $data['ordinato_per'] = $_SESSION['ordinato_per'];
    $this->load->view('templates/header');
    $this->load->view('spese/index', $data);
    $this->load->view('templates/footer');
  }

  public function search(){
    $this->session->set_flashdata('pagamento', 'disabled');
    if (empty($this->input->post('cerca'))) {
      $data['spese'] = "";
      $data['ordinato_per'] = "<span class='badge badge-secondary'>Titolo</span> <u>nessuna parola cercata</u>";
    } else {
      $data['spese'] = $this->Spese_model->search_by_title($this->input->post('cerca'));
      $data['ordinato_per'] = "<span class='badge badge-secondary'>Titolo</span> ricerca parola <u>".$this->input->post('cerca')."</u>";
    }
    $this->session->set_userdata('spese', $data['spese']);
    $this->session->set_userdata('ordinato_per', $data['ordinato_per']);
    $this->load->view('templates/header');
    $this->load->view('spese/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit($id){
    if ($this->Spese_model->edit_spesa($id)) {
      redirect('lista');
    }
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
