<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hub extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library(array('session','parser','image_lib'));
        $this->load->helper(array('text','string','url','form'));
        $this->load->model('login_model');
        $this->load->model('main_model');

        if ($this->login_model->isLoggedIn()) {
            $this->data['user'] = $this->session->userdata('user');
            $this->data['estado'] = 1;
            $this->data['seg'] = FALSE;
            $user = $this->data['user'];
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            $this->data['perms'] = $user['Permissoes'];
        }
    }

	public function index()
	{
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            //$perms = $this->getPerms($user['Permissoes']);
            //$this->data['perms'] = $perms;
        }
        $this->data['titulo'] = 'AnimePrimera';

        $this->data['series'] = $this->main_model->get_table('series');
        $this->data['episodios'] = $this->main_model->get_table('episodio');


        $this->load->view('hub',$this->data);
	}

}
