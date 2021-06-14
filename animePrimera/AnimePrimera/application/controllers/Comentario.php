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
    }

    public function addComment(){
        if(isset($_POST['Submeter'])){
            if($this->login_model->isLoggedIn() == true) {
                $values = array(
                    'idUser' => $_POST['idUser'],
                    'idEpisodio' => $_POST['idEpisodio'],
                    'texto' => $_POST['coment']
                );
                $this->main_model->add('comentario',$values);
                redirect(base_url('Episodio/watchepisode/'.$_POST['idEpisodio']));
            }else{
                
            }
        }
    }

    public function removeComment(){
        $idComentario = $this->uri->segment(3);
        $this->main_model->delete('idComentario','comentario',$idComentario);
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

}
