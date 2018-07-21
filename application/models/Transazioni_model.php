<?php
class Transazioni_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_transazioni($tipo, $ordine){
          $this->db->order_by($tipo, $ordine);
          $this->db->join('pagamenti', 'pagamenti.idPagamento = transazioni.idPagamento');
          $query = $this->db->get('transazioni');
          return $query->result_array();
        }

        public function get_pagamenti(){
          $query = $this->db->get('pagamenti');
          return $query->result_array();
        }

        public function delete_transazione($id){
          $this->db->where('idTransazione', $id);
					$this->db->delete('transazioni');
					return true;
        }

        public function get_by_date($inizio, $fine){
          $this->db->where('data >=', $inizio);
          $this->db->where('data <=', $fine);
          $this->db->order_by('data', 'desc');
          $this->db->join('pagamenti', 'pagamenti.idPagamento = transazioni.idPagamento');
          $query = $this->db->get('transazioni');
          return $query->result_array();
        }

        public function search_by_title($parola){
          $this->db->like('titolo', $parola);
          $this->db->order_by('titolo', 'asc');
          $this->db->join('pagamenti', 'pagamenti.idPagamento = transazioni.idPagamento');
          $query = $this->db->get('transazioni');
          return $query->result_array();
        }

        public function create_transazione(){
          $cifra = (empty($this->input->post('cifra'))) ? "0.00" : $this->input->post('cifra');
          $data = (empty($this->input->post('data'))) ? date('Y-m-d') : $this->input->post('data');
          $causale = (empty($this->input->post('causale'))) ? "Si è verificato un errore, campi vuoti o errati. <strong class='text-danger'>controllare questa transazione!</strong>" : $this->input->post('causale');
          $titolo = (empty($this->input->post('titolo'))) ? "<span class='badge badge-danger'>Errore</span>" : $this->input->post('titolo');
          $data = array(
            'cifra' => $cifra,
            'data' => $data,
            'causale' => $causale,
            'titolo' => $titolo,
            'idPagamento' => $this->input->post('idPagamento'),
          );

          return $this->db->insert('transazioni', $data);
        }

        public function edit_transazione($id){
          $cifra = (empty($this->input->post('cifra'))) ? "0.00" : $this->input->post('cifra');
          $data = (empty($this->input->post('data'))) ? date('Y-m-d') : $this->input->post('data');
          $causale = (empty($this->input->post('causale'))) ? "Si è verificato un errore, campi vuoti o errati. <strong class='text-danger'>controllare questa transazione!</strong>" : $this->input->post('causale');
          $titolo = (empty($this->input->post('titolo'))) ? "<span class='badge badge-danger'>Errore</span>" : $this->input->post('titolo');

          $data = array(
            'idTransazione' => $id,
            'cifra' => $cifra,
            'data' => $data,
            'causale' => $causale,
            'titolo' => $titolo,
            'idPagamento' => $this->input->post('idPagamento'),
          );

          return $this->db->replace('transazioni', $data);
        }
}
