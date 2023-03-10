<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    private $data;
    public function __construct(){
        parent::__construct();

        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->helper(array('text','string','url'));
        $this->load->library(array('form_validation','session','parser'));
        $this->load->model('login_model');
        $this->data['contSearch'] = 'Serie/search';
    }

    public function login()	{
        $this->data['titulo'] = 'Login';
        //if($this->login_model->isLoggedIn()) { redirect('admin'); }
        $this->form_validation->set_rules('username','user','required');
        $this->form_validation->set_rules('password','senha','required');
        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if($user = $this->login_model->getByUsername($username)){
                if($this->login_model->checkPassword($password,$user['Password'])){
                    $this->login_model->createSession($user);
                    redirect();
                }else{
                    $this->session->set_flashdata('error',"Palavra-Passe incorreta.");
                }
            }else
                $this->session->set_flashdata('error',"User não existe.");
        }
        $this->data['titulo'] = 'Login';
        $this->load->view('login',$this->data);
    }

    public function logout(){
        $this->data['titulo'] = 'Logout';
        session_destroy();
        $this->data['login_success'] = 'Logout com Sucesso.';
        $this->load->view('login',$this->data);
    }

}// controller Login
