<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/ControladorAbstrato.php';

class Notificacoes extends ControladorAbstrato {

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
            $query = $this->main_model->get_main_where_array('notification','idUser',$user['idUser']);
            $this->data['notif'] = $query;
        }
        $this->data['contSearch'] = 'Serie/search';
    }

    public function removerNotification(){
        $idNotification = $this->uri->segment(3);
        $query = $this->main_model->get_main_where_array('notification','idNotification',$idNotification);
        $this->checkLogin('',"Faça Login com sucesso.");
        $levelsNeeded = array(
            NORPERM,
            PREPERM,
            UPLPERM,
            MODPERM,
            ADMPERM
        );
        $this->checkPermsV2($query[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
        $this->main_model->delete('idNotification','notification',$idNotification);
        redirect();
    }

    public function clearAll(){
        $this->checkLogin('',"Faça Login com sucesso.");
        $idUser = $this->data['idUser'];
        $this->main_model->delete('idUser','notification',$idUser);
        redirect();
    }


}
