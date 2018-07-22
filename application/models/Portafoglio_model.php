<?php
class Portafoglio_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_budget()
        {
          //$this->db->where('idPagamento', $id);
          $this->db->order_by("numTransazioni", "desc");
          $query = $this->db->get('pagamenti');
          return $query->result_array();
        }

        public function get_count_by_date($dataInizio, $id){
          $this->db->where('data >=', $dataInizio);
          $this->db->where('data <=', date('Y-m-d'));
          $this->db->order_by('data', 'desc');
          $this->db->where('idPagamento', $id);
          return $this->db->count_all_results('transazioni');
        }
}
