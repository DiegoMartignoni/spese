<?php
class Portafogli_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_budget()
        {
          $query = $this->db->get('portafoglio');
          return $query->result_array();
        }
}
