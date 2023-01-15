<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autor_model extends CI_Model
{

    function get_autor_list()
    {
        $this->db->where('activo', 1);
        $query = $this->db->get('autor');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
}
