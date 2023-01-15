<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code


        $this->load->model('Autor_model', 'autor');
    }

    public function index()
    {
     
        $head['menu'] = $this->config->item('menu');
        $head['menu']['autor'] = 'active';

        $data['autor'] = $this->autor->get_autor_list();

        $data['header'] = $this->load->view('layout/header', $head, TRUE);
        $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
        $this->load->view('autor/list', $data);
    }

    public function create()
    {
    
        $head['menu'] = $this->config->item('menu');
        $head['menu']['rewards'] = 'active';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nombre','required');
        $this->form_validation->set_rules('apellido', 'Apellido','required');
        $this->form_validation->set_rules('Fecha_registro', 'Fecha_registro','required');
        $this->form_validation->set_rules('Pais', 'Pais','required');
        if ($this->form_validation->run() == TRUE) {
            $name = set_value('name');
            $apellido = set_value('apellido');
            $Fecha_registro = set_value('Fecha_registro');
            $Pais = set_value('Pais');

            $created = $this->session->userdata('id');

            $insert = array(
                'name'           =>  $name,
                'apellido'       =>  $apellido,
                'Fecha_registro' =>  $Fecha_registro,
                'Pais'           =>  $Pais

            );
            $this->db->insert('autor', $insert);

            $reward = $this->db->insert_id();

          

            $this->session->set_flashdata('success', 'Autor creado con exito.</a>');

            redirect('autor', 'redirect');
        }

        $data['header'] = $this->load->view('layout/header', $head, TRUE);
        $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
        $this->load->view('autor/create', $data);
    }

    public function update($id)
    {
    
        $head['menu'] = $this->config->item('menu');
        $head['menu']['rewards'] = 'active';

        $this->load->helper('form');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Nombre','required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('Fecha_registro', 'Fecha_registro', 'required');
        $this->form_validation->set_rules('Pais','Pais', 'required');
        $this->form_validation->set_rules('Libro_Sistema', 'Libro_Sistema');
        if ($this->form_validation->run() == TRUE) {
            $name = set_value('name');
            $apellido = set_value('apellido');
            $Fecha_registro = set_value('Fecha_registro');
            $Pais = set_value('Pais');
            $Libro_Sistema = set_value('Libro_Sistema');
            


            $update = array(
                'name'            =>  $name,
                'apellido'        =>  $apellido,
                'Fecha_registro'  =>  $Fecha_registro,
                'Pais'            =>  $Pais,
                'Libro_Sistema'   =>  $Libro_Sistema,

            );
            $this->db->where('id', $id);
            $this->db->update('autor', $update);


            $this->session->set_flashdata('success', 'Autor actualizado correctamente.</a>');

            redirect('autor', 'redirect');
        }

        $query = $this->db->get_where('autor', array('id' => $id));
        if ($query->num_rows() > 0) {
            $data['reward'] = $query->row_array();
        } else {
            $this->session->set_flashdata('error', 'No existe el autor.</a>');

            redirect('autor', 'redirect');
        }

       
          $query =  $this->db->where('activo', 1); //Solo obtenemos los autores activo.
          $query = $this->db->get('autor'); //Tabla DB
          if ($query->num_rows() > 0) {
              $data['autor'] = $query->result_array();
          }

        $data['header'] = $this->load->view('layout/header', $head, TRUE);
        $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
        $this->load->view('autor/update', $data);
    }




    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('autor');
    }
}
