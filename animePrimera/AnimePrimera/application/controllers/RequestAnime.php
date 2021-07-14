<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/ControladorAbstrato.php';

class RequestAnime extends ControladorAbstrato {

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
        }
        $this->data['contSearch'] = 'Serie/search';
    }

    public function addRequest(){
        $this->checkLogin('','Faça Login primeiro.');
        $levelsNeeded = array(
            NORPERM,
            PREPERM,
            UPLPERM,
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $query = $this->main_model->get_main_where_array('user','idUser',$_POST['idUser']);
        $info = 'User: ' . $query[0]['Username'] . ' solicitou a Série: ' . $_POST['titulo'];
        if(!empty($_POST['link'])){
            $info .= ' Link Informativo: ' . $_POST['link'];
        }
        $values = array(
            'idUser' => $_POST['idUser'],
            'status' => 1,
            'info' => $info
        );
        $this->main_model->add('requestAnime',$values);
        redirect();
    }

    public function animesRequested(){
        $this->checkLogin('','Faça Login primeiro.');
        $levelsNeeded = array(
            UPLPERM,
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $query = $this->main_model->get_both_main_where_orderby('requestanime','user','requestanime.idUser = user.idUser','requestanime.status=',1,'user.Permissoes');
        $this->data['solicitacoes'] = $query;
        $this->load->view('animesRequested',$this->data);
    }

    public function addToDoList(){
        $this->checkLogin('','Faça Login primeiro.');
        $levelsNeeded = array(
            UPLPERM,
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $idRequest = $this->uri->segment(3);
        $query = $this->main_model->get_both_main_whereV2('requestanime','user','requestanime.idUser = user.idUser','requestanime.idRequest=',$idRequest);
        $info = ' Completou o request: ' . $query[0]['info'] . ' do User: ' . $query[0]['Username'];
        $valuesml = array(
            'idUser' => $query[0]['idUser'],
            'info' => $info,
            'status' => 1
        );
        $this->main_model->add('modlogs',$valuesml);
        $values = array(
            'status' => 0
        );
        $this->main_model->edit('idRequest','requestAnime',$idRequest,$values);
        redirect('requestAnime/animesRequested');
    }

    public function removerRequest(){
        $this->checkLogin('','Faça Login primeiro');
        $levelsNeeded = array(
            UPLPERM,
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $idRequest = $this->uri->segment(3);
        $query = $this->main_model->get_both_main_whereV2('requestanime','user','requestanime.idUser = user.idUser','requestanime.idRequest=',$idRequest);
        $info = ' Rejeitou o request: ' . $query[0]['info'] . ' do User: ' . $query[0]['Username'];
        $valuesml = array(
            'idUser' => $query[0]['idUser'],
            'info' => $info,
            'status' => 1
        );
        $this->main_model->add('modlogs',$valuesml);
        $this->main_model->delete('idRequest','requestanime',$idRequest);
        redirect('requestAnime/animesRequested');
    }

}
