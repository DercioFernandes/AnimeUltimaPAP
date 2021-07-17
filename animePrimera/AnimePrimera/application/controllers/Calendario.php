<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/ControladorAbstrato.php';

class Calendario extends ControladorAbstrato {

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
            $this->checkIfBanned($user['Permissoes']);
        }
        $this->data['contSearch'] = 'Serie/search';
    }

    public function index(){
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            /*$perms = $this->getPerms($user['perms']);
            $this->data['perms'] = $perms;*/
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            $this->data['idUser'] = $user['idUser'];
            $this->data['perms'] = $user['Permissoes'];
        }
        $this->data['titulo'] = 'Calendário';
        $query = $this->main_model->get_table('calendario');
        $this->data['calendario'] = $query;
        $this->load->view('calendario',$this->data);
    }

    public function addCalendario(){
        $this->data['titulo'] = 'Adicionar ao Calendário';
        if(isset($_POST['submitcalendar'])){
            $idSerie = $this->uri->segment(3);
            $this->checkLogin('Serie/seriesinfo/' . $idSerie,"Faça Login primeiro.");
            $levelsNeeded = array(
                UPLPERM,
                MODPERM,
                ADMPERM
            );
            $this->checkPerms($levelsNeeded,$this->data['perms']);
            $serie = $this->main_model->get_main_where_array('series','idSerie',$idSerie);
            $check = $this->main_model->get_main_where_array('calendario','idSerie',$idSerie);
            if(!empty($check)){
                $values = array(
                    'dayOfWeek' => $_POST['dataDaSemana']
                );
                $info = ' Editado Calendário de ' . $serie[0]['Titulo'];
                $valuesml = array(
                    'idUser' => $this->data['idUser'],
                    'info' => $info,
                    'status' => 1
                );
                $this->main_model->add('modlogs',$valuesml);
                $this->main_model->edit('idCalendario','calendario',$check[0]['idCalendario'],$values);
            }else{
                $values = array(
                    'idSerie' => $idSerie,
                    'dayOfWeek' => $_POST['dataDaSemana'],
                    'status' => 0
                );
                $info = ' Adicionado Calendário de ' . $serie[0]['Titulo'];
                $valuesml = array(
                    'idUser' => $this->data['idUser'],
                    'info' => $info,
                    'status' => 1
                );
                $this->main_model->add('modlogs',$valuesml);
                $this->main_model->add('calendario',$values);
            }
            redirect('Serie/seriesinfo/' . $idSerie);
        }
    }

    public function removerCalendario(){
        $this->data['titulo'] = 'Remover do Calendário';
        $idSerie = $this->uri->segment(3);
        $this->checkLogin('Serie/seriesinfo/'.$idSerie,"Faça Login com sucesso.");
        $levelsNeeded = array(
            UPLPERM,
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $query = $this->main_model->get_main_where_array('calendario','idSerie',$idSerie);
        if(!empty($query)){
            $this->main_model->delete('idCalendario','calendario',$query[0]['idCalendario']);
        }
        redirect('Serie/seriesinfo/'.$idSerie);
    }


}
