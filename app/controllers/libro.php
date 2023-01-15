<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Libro extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code

        $this->load->model('Libro_model', 'Libro');
    }

    public function index()
    {

        $head['menu'] = $this->config->item('menu');
        $head['menu']['Libro'] = 'active';

        $data['Libro'] = $this->Libro->get_Libro_list();

        $data['header'] = $this->load->view('layout/header', $head, TRUE);
        $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
        $this->load->view('Libro/list', $data);
    }

    public function create()
    {

        $head['menu'] = $this->config->item('menu');
        $head['menu']['rewards'] = 'active';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nombre', 'required');
        $this->form_validation->set_rules('Fecha_Publicacion', 'Fecha_Publicacion', 'required');
        $this->form_validation->set_rules('Edicion', 'Edicion', 'required');
        $this->form_validation->set_rules('Autores', 'Autores', 'required');
        if ($this->form_validation->run() == TRUE) {
            $name = set_value('name');
            $Fecha_Publicacion = set_value('Fecha_Publicacion');
            $Edicion = set_value('Edicion');
            $Autores = set_value('Autores');


            $insert = array(
                'name'           =>  $name,
                'Fecha_Publicacion'       =>  $Fecha_Publicacion,
                'Edicion' =>  $Edicion,
                'Autores'           =>  $Autores

            );
            $this->db->insert('Libro', $insert);

            $this->session->set_flashdata('success', 'Libro creado con exito.</a>');

            redirect('Libro', 'redirect');
        }

        //Conseguimos los datos de los autores.
        $query =  $this->db->where('activo', 1); //Solo obtenemos los autores activo.
        $query = $this->db->get('autor'); //Tabla DB
        if ($query->num_rows() > 0) {
            $data['autor'] = $query->result_array();
        }


        $data['header'] = $this->load->view('layout/header', $head, TRUE);
        $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
        $this->load->view('Libro/create', $data);
    }

    public function update($id)
    {

        $head['menu'] = $this->config->item('menu');
        $head['menu']['rewards'] = 'active';

        $this->load->helper('form');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nombre', 'required');
        $this->form_validation->set_rules('Fecha_Publicacion', 'Fecha_Publicacion', 'required');
        $this->form_validation->set_rules('Edicion', 'Edicion', 'required');
        $this->form_validation->set_rules('Autores', 'Autores', 'required');

        if ($this->form_validation->run() == TRUE) {
            $name = set_value('name');
            $Fecha_Publicacion = set_value('Fecha_Publicacion');
            $Edicion = set_value('Edicion');
            $Autores = set_value('Autores');


            $update = array(
                'name'                 =>  $name,
                'Fecha_Publicacion'    =>  $Fecha_Publicacion,
                'Edicion'              =>  $Edicion,
                'Autores'              =>  $Autores

            );
            $this->db->where('id', $id);
            $this->db->update('Libro', $update);


            $this->session->set_flashdata('success', 'Libro actualizado correctamente.</a>');

            redirect('Libro', 'redirect');
        }

        $query = $this->db->get_where('Libro', array('id' => $id));
        if ($query->num_rows() > 0) {
            $data['reward'] = $query->row_array();
        } else {
            $this->session->set_flashdata('error', 'No existe el autor.</a>');

            redirect('Libro', 'redirect');
        }

        //Conseguimos los datos de los autores.
        $query =  $this->db->where('activo', 1); //Solo obtenemos los autores activo.
        $query = $this->db->get('autor'); //Tabla DB
        if ($query->num_rows() > 0) {
            $data['autor'] = $query->result_array();
        }


        $data['header'] = $this->load->view('layout/header', $head, TRUE);
        $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
        $this->load->view('Libro/update', $data);
    }




    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('Libro', array('activo' => 0));
    }
}
