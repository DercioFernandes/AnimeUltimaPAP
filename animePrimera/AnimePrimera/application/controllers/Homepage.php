<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

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
        $this->data['contSearch'] = 'Serie/search';
    }

	public function index()
	{
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            $this->data['idUser'] = $user['idUser'];
            //$perms = $this->getPerms($user['Permissoes']);
            //$this->data['perms'] = $perms;
        }
        $this->data['titulo'] = 'AnimePrimera';
        $this->data['series'] = $this->main_model->get_table_limited('series',9,'idSerie');
        $this->data['episodios'] = $this->main_model->get_table_limited('episodio',9,'idEpisodio');
        $this->data['favseries'] = $this->main_model->get_table_orderby('series','rating',10);

        $size = count($this->main_model->get_table('series'));
        $suprise = $this->random($size,$this->main_model->get_table('series'));
        $this->data['suprise'] = $suprise;



        $this->load->view('homepage',$this->data);
	}

	private function random($size,$query){
        $suprise = rand(0, $size-1);
        if(isset($query[$suprise])){
            return $suprise;
        }else{
            $this->random($size,$query);
        }
    }

}
