<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

        public function index()
        {
                
           

                $head['menu'] = $this->config->item('menu');
                $head['menu']['dashboard'] = 'active';

             
                $data['header'] = $this->load->view('layout/header', $head, TRUE);
                $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
                $this->load->view('dashboard', $data);
        }






    
}
