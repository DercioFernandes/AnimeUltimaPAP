<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serie extends CI_Controller {

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
    }

    public function allSeries(){
        $this->checkLogin();
        $this->data['h3title'] = 'Series Recentes';
        $this->data['series'] = $this->main_model->get_table_limited('series',50,'idSerie');
        $this->load->view('all',$this->data);
    }

	public function add()
    {
        $this->checkLogin();
        $levelsNeeded = array(
            UPLPERM,
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $this->data['titulo'] = 'Criar Série - AP';
        if(isset($_POST['Criar'])){
            $uploadFile = $this->UploadFile('thumbnail');
            $e = $uploadFile['fileData'];
            $imgname = $e['file_name'];
            $values = array(
                'Titulo' => $_POST['titulo'],
                'Photo' => $imgname,
                'Autor' => $_POST['autor'],
                'Descricao' => $_POST['descricao'],
                'Tipo' => $_POST['tipo'],
                'idUser' => $this->data['idUser']
            );
            $msg = 'Adicionado ' . $_POST['titulo'];
            $valuesml = array(
                'idUser' => $this->data['idUser'],
                'info' => $msg,
                'status' => 1
            );
            $this->main_model->add('modlogs',$valuesml);
            $this->main_model->add('series',$values);
            redirect();
        }else{
            $this->load->view('addSerie',$this->data);
        }
    }

    public function editar(){
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            if(isset($_POST['Editar'])){
                $values = array(
                    'Titulo' => $_POST['titulo'],
                    'Autor' => $_POST['autor'],
                    'Descricao' => $_POST['descricao'],
                    'Tipo' => $_POST['tipo'],
                    'DataRelease' => $_POST['dataRelease']
                );
                $uploadFile = $this->UploadFile('thumbnail');
                if($uploadFile['error'] == 0){
                    $e = $uploadFile['fileData'];
                    $imgname = $e['file_name'];
                    $valuesImg = array(
                        'Photo' => $imgname
                    );
                    $values = array_merge($values,$valuesImg);
                }
                $msg = 'Editado ' . $_POST['titulo'];
                $valuesml = array(
                    'idUser' => $this->data['idUser'],
                    'info' => $msg,
                    'status' => 1
                );
                $this->main_model->add('modlogs',$valuesml);
                $this->main_model->edit('idSerie','series',$_POST['idSerie'],$values);
                redirect('serie/seriesinfo/' . $_POST['idSerie']);
            }else{
                $idSerie = $this->uri->segment(3);
                $this->data['idSerie'] = $idSerie;
                $this->data['idUser'] = $user['idUser'];
                $this->data['serie'] = $this->main_model->get_main_where_array('series','idSerie',$idSerie);
                $this->load->view('editarSerie',$this->data);
            }
            $querys = $this->main_model->get_main_where_array('series','idSerie',$idSerie);
            $levelsNeeded = array(
                MODPERM,
                ADMPERM
            );
            $this->checkPermsV2($querys[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
        }
    }

    public function remover(){
        $idSerie = $this->uri->segment(3);
        $this->checkLogin();
        $querys = $this->main_model->get_main_where_array('series','idSerie',$idSerie);
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPermsV2($querys[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
        $querye = $querye = $this->main_model->get_main_where_array('temporadas','idSerie', $idSerie);
        foreach( $querye as $temporada ){
            $this->main_model->delete('idTemporada','temporadas',$temporada['idTemporada']);
        }
        $queryml = $this->main_model->get_main_where_array('series','idSerie',$idSerie);
        $msg = 'Removido ' . $queryml[0]['Titulo'];
        $valuesml = array(
            'idUser' => $this->data['idUser'],
            'info' => $msg,
            'status' => 1
        );
        $this->main_model->add('modlogs',$valuesml);
        $this->main_model->delete('idSerie','series',$idSerie);
        redirect();
    }


    public function seriesinfo(){
        $idSerie = $this->uri->segment(3);
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            /*$perms = $this->getPerms($user['perms']);
            $this->data['perms'] = $perms;*/
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            $this->data['idUser'] = $user['idUser'];
            $arrayC = array(
                'idSerie' => $idSerie,
                'idUser' => $user['idUser']
            );
            if($this->main_model->double_get_main_where_array('rating',$arrayC)){
                $this->data['ratingC'] = 'seguirDone';
            }
            if($this->main_model->double_get_main_where_array('seguir',$arrayC)){
                $this->data['seguirC'] = 'seguirDone';
            }
            if($this->main_model->double_get_main_where_array('dropped',$arrayC)){
                $this->data['droppedC'] = 'seguirDone';
            }
            if($this->main_model->double_get_main_where_array('completo',$arrayC)){
                $this->data['porverC'] = 'seguirDone';
            }
            if($this->main_model->double_get_main_where_array('favorito',$arrayC)){
                $this->data['favoritoC'] = 'seguirDone';
            }
            if($this->main_model->double_get_main_where_array('watching',$arrayC)){
                $this->data['vendoC'] = 'seguirDone';
            }
        }
        $query = $this->main_model->get_main_where_array('series','idSerie',$idSerie);
        $queryT = $this->main_model->get_main_where_array('temporadas','idSerie',$idSerie);
        $queryE = array();
        for($i = 0; $i < count($queryT); $i++){
            $queryE = array_merge($queryE,$this->main_model->get_main_where_array('episodio','idTemporada',$queryT[$i]['idTemporada']));
        }
        $this->data['qFav'] = count($this->main_model->get_table('favorito'));
        //print_r($queryE);
        $this->data['idSerie'] = $idSerie;
        $this->data['temporadas'] = $queryT;
        $this->data['episodios'] = $queryE;
        $this->data['query'] = $query;
        $this->load->view('seriesinfo',$this->data);
    }

    public function rate(){
        $idSerie = $this->uri->segment(3);
        if($this->login_model->isLoggedIn()){
            $comparison = array(
                'idUser' => $_POST['idUser'],
                'idSerie' => $idSerie
            );
            $query = $this->main_model->double_get_main_where_array('rating',$comparison);
            if(!empty($query)){
                if (!empty($_POST['ratesubmited'])) {
                    $values = array(
                        'idSerie' => $idSerie,
                        'idUser' => $_POST['idUser'],
                        'rating' => $_POST['rate']
                    );
                    $this->main_model->edit('idRating','rating',$query[0]['idRating'],$values);
                    redirect('serie/seriesinfo/' . $idSerie);
                }
            }else{
                if (!empty($_POST['ratesubmited'])) {
                    $values = array(
                        'idSerie' => $idSerie,
                        'idUser' => $_POST['idUser'],
                        'rating' => $_POST['rate']
                    );
                    $this->main_model->add('rating',$values);
                    $this->updateRating($idSerie);
                    redirect('serie/seriesinfo/' . $idSerie);
                }
            }

        }else{
            redirect('serie/seriesinfo/' . $idSerie);
        }
        redirect('serie/seriesinfo/' . $idSerie);
    }

    public function seguir(){
        $idSerie = $this->uri->segment(3);
        if($this->login_model->isLoggedIn()){
            $user = $this->data['user'];
            $idUser = $user['idUser'];
            $this->abstrato('seguir',$idSerie,$idUser);
        }
    }

    public function completo(){
        $idSerie = $this->uri->segment(3);
        if($this->login_model->isLoggedIn()){
            $user = $this->data['user'];
            $idUser = $user['idUser'];
            $this->abstrato('completo',$idSerie,$idUser);
        }
    }

    public function dropped(){
        $idSerie = $this->uri->segment(3);
        if($this->login_model->isLoggedIn()){
            $user = $this->data['user'];
            $idUser = $user['idUser'];
            $this->abstrato('dropped',$idSerie,$idUser);
        }
    }

    public function favorito(){
        $idSerie = $this->uri->segment(3);
        if($this->login_model->isLoggedIn()){
            $user = $this->data['user'];
            $idUser = $user['idUser'];
            $this->abstrato('favorito',$idSerie,$idUser);
        }
    }

    public function vendo(){
        $idSerie = $this->uri->segment(3);
        if($this->login_model->isLoggedIn()){
            $user = $this->data['user'];
            $idUser = $user['idUser'];
            $this->abstrato('watching',$idSerie,$idUser);
        }
    }

    private function abstrato($table,$idSerie,$idUser){
        $comparison = array(
            'idUser' => $idUser,
            'idSerie' => $idSerie
        );
        $query = $this->main_model->double_get_main_where_array($table,$comparison);
        if(!empty($query)){
            $values = array(
                'idSerie' => $idSerie,
                'idUser' => $idUser
            );
            $this->main_model->deleteA($table,$values);
            redirect('serie/seriesinfo/' . $idSerie);
        }else{
            $values = array(
                'idSerie' => $idSerie,
                'idUser' => $idUser
            );
            $this->main_model->add($table,$values);
            redirect('serie/seriesinfo/' . $idSerie);
        }
    }

    private function updateRating($idSerie){
        $query = $this->main_model->get_main_where_array('rating','idSerie',$idSerie);
        if(!empty($query)){
            $media = 0;
            foreach ($query as $q){
                $media += $q['rating'];
            }
            $media = $media / count($query);
            $values = array(
                'rating' => $media
            );
            $this->main_model->edit('idSerie','series',$idSerie,$values);
        }
    }

    /*private function checkStates($array,$idUser){
        $class = 'seguirDone';
        /*foreach($array as $a){
            if($value == $a){
                return $class;
            }
        }*/
        /*foreach ($array as $a){
            if($this->main_model->get_main_where_array($a,'idUser',$idUser)){
                return $class;
            }else{
                return '';
            }
        }
    }*/

    private function UploadFile($inputFileName)
    {
        /*
         * O CodeIgniter possui uma biblioteca nativa para trabalhar com upload de arquivos, chamada File Uploading.
         */
        $this->load->library('upload');
        //Definimos um caminho para upload, neste caso será na raiz /app2
        $path = "./resources/img/seriesthumb/";

        //Definimos as configurações para o upload

        //Determinamos o path para gravar o arquivo
        $config['upload_path'] = $path;

        //Definimos os tipos de arquivos suportados
        $config['allowed_types'] = 'jpg|png|gif|pdf|zip|rar|doc|xls';

        //Definimos o maximo permitido
        //Php.ini definimos os tamanhos permitidos
        //post_max_size=15M -> pelo POST
        // upload_max_size=15M // Por Upload
        $config['max_size'] = '51120';//em KB

        //Definimos que o nome do arquivo será criptografado
        $config['encrypt_name'] = TRUE;

        //Verificamos se o diretório existe se não existe criamos com permissão de leitura e escrita
        if (!is_dir($path))
            mkdir($path, 0777, $recursive = true);

        //Setamos as configurações para a library upload
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($inputFileName)) {
            //Em caso de erro retornamos os mesmos para uma variável e enviamos para a view
            $data['error'] = true;
            $data['message'] = $this->upload->display_errors();
        } else {
            $data['error'] = false;

            //Recuperamos os dados do arquivo e enviamos para o array da view
            $data['fileData'] = $this->upload->data();
            $arquivoPath = $path . "/" . $data['fileData']['file_name'];
            //Passando para o array $data
            $data['urlArquivo'] = base_url($arquivoPath);

            //Definimos a URL para download
            $downloadPath = base_url('resources/img/') . $data['fileData']['file_name'];
            //Passando para o Array Data
            $data['urlDownload'] = base_url($downloadPath);


        }
        return $data;
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
        if($perms == 4 || $perms == 5){

        }elseif(($idAuthor == $idUser) && $perms == 3){

        }else{
            redirect();
        }
    }

    private function checkPerms($levelNeeded,$perms){
        if(!in_array($perms,$levelNeeded)){
            redirect();
        }
    }


}
