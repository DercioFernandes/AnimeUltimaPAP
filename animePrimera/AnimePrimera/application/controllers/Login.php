<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    private $data;
    public function __construct(){
        parent::__construct();
        $this->data['styles'] =  array (
            "inicio.css",
            "owl.carousel.css",
            "owl.theme.default.css"
        );
        $this->data['scripts'] = array (
            "owl.carousel.js",
            "carousel_inicio.js",
            "botao.js"
        );

        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->helper(array('text','string','url'));
        $this->load->library(array('form_validation','session','parser'));
        $this->load->model('login_model');
    }

    public function login()	{
        //if($this->login_model->isLoggedIn()) { redirect('admin'); }
        $this->form_validation->set_rules('username','user','required');
        $this->form_validation->set_rules('password','senha','required');

        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if($user = $this->login_model->getByUsername($username)){
                if($this->login_model->checkPassword($password,$user['password'])){
                    $this->login_model->createSession($user);
                    redirect(base_url().'Homepage/index');
                }else
                    $this->data['login_error'] = 'Palavra-passe incorreta';
            }else
                $this->data['login_error'] = 'User não existe';
        }
        $this->data['titulo'] = 'Login';
        $this->parser->parse('login',$this->data);
    }

    public function logout(){
        session_destroy();
        $this->data['login_success'] = 'Logout com Sucesso.';
        $this->load->view('login',$this->data);
    }

}// controller Login
