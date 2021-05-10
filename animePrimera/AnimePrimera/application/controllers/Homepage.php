<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library(array('session','parser','image_lib'));
        $this->load->helper(array('text','string','url','form'));
        $this->load->model('login_model');
        $this->load->model('main_model');

    }

	public function index()
	{
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            $perms = $this->getPerms($user['perms']);
            $this->data['perms'] = $perms;
        }
        $this->data['titulo'] = 'AnimePrimera';

        $this->data['series'] = $this->main_model->get_table('series');
        $this->data['episodios'] = $this->main_model->get_table('episodio');


        $this->load->view('homepage',$this->data);
	}

}
