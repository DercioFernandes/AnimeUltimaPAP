<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class ControladorAbstrato extends CI_Controller {

    protected function checkLogin($view,$data){
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            /*$perms = $this->getPerms($user['perms']);
            $this->data['perms'] = $perms;*/
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            $this->data['idUser'] = $user['idUser'];
            $this->data['perms'] = $user['Permissoes'];
        }else{
            $this->session->set_flashdata('error',$data);
            redirect($view);
        }
    }

    protected function checkPermsV2($idAuthor,$idUser,$levelNeeded,$perms){
        if($perms == 4 || $perms == 5){

        }elseif(($idAuthor == $idUser) || $perms == 3){

        }else{
            redirect();
        }
    }

    protected function checkPerms($levelNeeded,$perms){
        if(!in_array($perms,$levelNeeded)){
            redirect();
        }
    }

}
