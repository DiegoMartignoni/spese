<?php
class Spese_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_spese($tipo, $ordine){
          $this->db->order_by($tipo, $ordine);
          $query = $this->db->get('spese');
          return $query->result_array();
        }

        public function delete_spesa($id){
          $this->db->where('idSpesa', $id);
					$this->db->delete('spese');
					return true;
        }

        public function get_by_date($inizio, $fine){
          $this->db->where('data >=', $inizio);
          $this->db->where('data <=', $fine);
          $this->db->order_by('data', 'desc');
          $query = $this->db->get('spese');
          return $query->result_array();
        }

        public function search_by_title($parola){
          $this->db->like('titolo', $parola);
          $this->db->order_by('titolo', 'asc');
          $query = $this->db->get('spese');
          return $query->result_array();
        }

        public function create_spesa(){
          $cifra = (empty($this->input->post('cifra'))) ? "0.00" : $this->input->post('cifra');
          $data = (empty($this->input->post('data'))) ? date('Y-m-d') : $this->input->post('data');
          $causale = (empty($this->input->post('causale'))) ? "Si è verificato un errore, campi vuoti o errati. <strong class='text-danger'>controllare questa spesa!</strong>" : $this->input->post('causale');
          $titolo = (empty($this->input->post('titolo'))) ? "<span class='badge badge-danger'>Errore</span>" : $this->input->post('titolo');
          $data = array(
            'cifra' => $cifra,
            'data' => $data,
            'causale' => $causale,
            'titolo' => $titolo,
            'pagamento' => $this->input->post('pagamento'),
          );

          return $this->db->insert('spese', $data);
        }

        public function edit_spesa($id){
          $cifra = (empty($this->input->post('cifra'))) ? "0.00" : $this->input->post('cifra');
          $data = (empty($this->input->post('data'))) ? date('Y-m-d') : $this->input->post('data');
          $causale = (empty($this->input->post('causale'))) ? "Si è verificato un errore, campi vuoti o errati. <strong class='text-danger'>controllare questa spesa!</strong>" : $this->input->post('causale');
          $titolo = (empty($this->input->post('titolo'))) ? "<span class='badge badge-danger'>Errore</span>" : $this->input->post('titolo');

          $data = array(
            'idSpesa' => $id,
            'cifra' => $cifra,
            'data' => $data,
            'causale' => $causale,
            'titolo' => $titolo,
            'pagamento' => $this->input->post('pagamento'),
          );

          return $this->db->replace('spese', $data);
        }
}
