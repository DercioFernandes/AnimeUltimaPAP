<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/ControladorAbstrato.php';

class Logs extends ControladorAbstrato {

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
            $this->data['perms'] = $user['Permissoes'];
        }
        $this->data['contSearch'] = 'Serie/search';
    }

	public function general()
	{
        $this->checkLogin();
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);

        $this->load->view('logsmenu',$this->data);
	}

    public function commentLogs(){
        $this->logsAbstract(1,'comentario','report','idComentario','user','comentario.idUser = user.idUser','comentario.idComentario =','logComentarios');
    }

    public function commentCLogs(){
        $this->logsAbstract(1,'comentariocompost','reports','idComentarioc','user','comentariocompost.idUser = user.idUser','comentariocompost.idComentarioc =','logComentariosC');
    }

    public function compostLogs(){
        $this->logsAbstract(1,'compost','status','idCompost','user','compost.idUser = user.idUser','compost.idCompost =','logCompost');
    }

    public function logMod(){
        $this->logsAbstract(1,'modlogs','status','idModLog','user','modlogs.idUser = user.idUser','modlogs.idModLog =','logMod');
    }

    public function manterLogComentario(){
        $this->manterLog(1,'report','comentario','idComentario','logs/commentsLogs',0);
    }

    public function manterLogCompost(){
        $this->manterLog(1,'status','compost','idCompost','logs/compostLogs',0);
    }

    public function manterModLog(){
        $this->manterLog(1,'status','modlogs','idModLog','logs/logMod',0);
    }

    public function removerLogComentario(){
        $this->removerLog(1,'comentario','idComentario','logs/comentLogs');
    }

    public function removerLogCompost(){
        $this->removerLog(1,'compost','idCompost','logs/compostLogs');
    }

    public function removerModLog(){
        $this->removerLog(1,'modlogs','idModLog','logs/logMod');
    }

    public function manterLogComentarioc(){
        $this->manterLog(1,'reports','comentariocompost','idComentarioc','logs/comentsCLogs',0);
    }

    public function removerLogComentarioc(){
        $this->removerLog(1,'comentariocompost','idComentarioc','logs/comentCLogs');
    }

    private function logsAbstract($permslevel,$table,$report,$idTable,$table2,$whereCondition,$idName,$viewName){
        $this->checkLogin('','');
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $query = $this->main_model->get_table($table);
        $coments = array();
        $count = 0;
        foreach ($query as $comentario){
            if($comentario[$report] > 0){
                $coments[$count] = $comentario[$idTable] ;
                $count += 1;
            }
        }
        $query2 = array();
        for($i = 0; $i < count($coments); $i++){
            //$query2 = array_merge($query2,$this->main_model->get_main_where_array($table,$idTable,$coments[$i]));
            $query2 = array_merge($query2,$this->main_model->get_both_main_whereV2($table,$table2,$whereCondition,$idName,$coments[$i]));
        }
        $this->data['tolog'] = $query2;
        $this->load->view($viewName,$this->data);
    }

    private function manterLog($permslevel,$report,$table,$idTable,$viewName,$is){
        $this->checkLogin();
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $id = $this->uri->segment(3);
        $values = array(
            $report => $is
        );
        $this->main_model->edit($idTable,$table,$id,$values);
        redirect($viewName);
    }

    private function removerLog($permsLevel,$table,$idTable,$viewName){
        $this->checkLogin('','');
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $id = $this->uri->segment(3);
        $this->main_model->delete($idTable,$table,$id);
        redirect($viewName);
    }
}
