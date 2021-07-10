<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library(array('session','parser','image_lib'));
        $this->load->helper(array('text','string','url','form','file'));
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

    public function addComment(){
        if(isset($_POST['Submeter'])){
            if($this->login_model->isLoggedIn() == true) {
                if(isset($_POST['commentComment'])){
                    echo $_POST['commentComment'];
                    $q = $this->main_model->get_main_where_array('comentario','idComentario',$_POST['commentComment']);
                    $values = array(
                        'idUser' => $_POST['idUser'],
                        'idCC' => $_POST['commentComment'],
                        'texto' => $_POST['coment'],
                        'idEpisodio' => $_POST['idEpisodio']
                    );
                }else{
                    $values = array(
                        'idUser' => $_POST['idUser'],
                        'idEpisodio' => $_POST['idEpisodio'],
                        'texto' => $_POST['coment']
                    );
                }
                $this->main_model->add('comentario',$values);
                redirect(base_url('Episodio/watchepisode/'.$_POST['idEpisodio']));
            }else{
                redirect(base_url('Episodio/watchepisode/'.$_POST['idEpisodio']));
            }
        }
    }

    public function addCommentC(){
        if(isset($_POST['Submeter'])){
            if($this->login_model->isLoggedIn() == true) {
                if(isset($_POST['commentComment'])){
                    echo $_POST['commentComment'];
                    $q = $this->main_model->get_main_where_array('comentariocompost','idComentarioC',$_POST['commentComment']);
                    $values = array(
                        'idUser' => $_POST['idUser'],
                        'idCC' => $_POST['commentComment'],
                        'texto' => $_POST['coment'],
                        'idCompost' => $_POST['idCompost']
                    );
                }else{
                    $values = array(
                        'idUser' => $_POST['idUser'],
                        'idCompost' => $_POST['idCompost'],
                        'texto' => $_POST['coment']
                    );
                }
                $this->main_model->add('comentariocompost',$values);
                redirect(base_url('Hub/hubinfo/'.$_POST['idCompost']));
            }else{
                redirect(base_url('Hub/hubinfo/'.$_POST['idCompost']));
            }
        }
    }

    public function removeComment(){
        $this->checkLogin();
        $idComentario = $this->uri->segment(3);
        $queryml = $this->main_model->get_main_where_array('comentario','idComentario',$idComentario);
        $querymls = $this->main_model->get_main_where_array('user','idUser',$queryml[0]['idUser']);
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPermsV2($queryml[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
        $msg = 'Removido Comentário de ' . $querymls[0]['Username'] . ' com texto: ' . $queryml[0]['texto'];
        $valuesml = array(
            'idUser' => $this->data['idUser'],
            'info' => $msg,
            'status' => 1
        );
        $this->main_model->add('modlogs',$valuesml);
        $this->main_model->delete('idComentario','comentario',$idComentario);
        redirect('Episodio/watchepisode/' . $queryml[0]['idEpisodio']);
    }

    public function removeCommentC(){
        $this->checkLogin();
        $idComentarioc = $this->uri->segment(3);
        $queryml = $this->main_model->get_main_where_array('comentariocompost','idComentarioc',$idComentarioc);
        $querymls = $this->main_model->get_main_where_array('user','idUser',$queryml[0]['idUser']);
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPermsV2($queryml[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
        $msg = 'Removido Comentário de ' . $querymls[0]['Username'] . ' com texto: ' . $queryml[0]['texto'];
        $valuesml = array(
            'idUser' => $this->data['idUser'],
            'info' => $msg,
            'status' => 1
        );
        $this->main_model->add('modlogs',$valuesml);
        $this->main_model->delete('idComentarioc','comentariocompost',$idComentarioc);
        redirect();
    }

    public function reportComment(){
        $idComentario = $this->uri->segment(3);
        $query = $this->main_model->get_main_where_array('comentario','idComentario',$idComentario);
        $reports = 1 + $query[0]['report'];
        $values = array(
            'report' => $reports
        );
        $this->main_model->edit('idComentario','comentario',$idComentario,$values);
        redirect();
    }

    public function reportCommentC(){
        $idComentario = $this->uri->segment(3);
        $query = $this->main_model->get_main_where_array('comentario','idComentario',$idComentario);
        $reports = 1 + $query[0]['report'];
        $values = array(
            'reports' => $reports
        );
        $this->main_model->edit('idComentarioC','comentariocompost',$idComentario,$values);
        redirect();
    }

    private function checkLogin(){
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            /*$perms = $this->getPerms($user['perms']);
            $this->data['perms'] = $perms;*/
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            $this->data['idUser'] = $user['idUser'];
            $this->data['perms'] = $user['Permissoes'];
        }else{
            redirect();
        }
    }

    private function checkPermsV2($idAuthor,$idUser,$levelNeeded,$perms){
        if($idAuthor = $idUser){

        }elseif(in_array($perms,$levelNeeded)){

        }else{
            redirect();
        }
    }

}
