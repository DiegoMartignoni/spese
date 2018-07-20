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
          $data = array(
            'cifra' => $this->input->post('cifra'),
            'data' => $this->input->post('data'),
            'causale' => $this->input->post('causale'),
            'titolo' => $this->input->post('titolo'),
            'pagamento' => $this->input->post('pagamento'),
          );

          return $this->db->insert('spese', $data);
        }
}
