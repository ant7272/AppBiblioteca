<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Libro_model extends CI_Model
{

    function get_Libro_list()
    {
        $this->db->where('activo', 1);
        $query = $this->db->get('libro');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
}
