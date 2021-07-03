<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class PermsAbstrato extends CI_Controller {

    private function checkPermsV2($idAuthor,$idUser,$levelNeeded,$perms){
        if($idAuthor = $idUser){

        }elseif($perms == $levelNeeded){

        }else{
            redirect();
        }
    }

}
