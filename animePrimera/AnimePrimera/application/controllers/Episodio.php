<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/ControladorAbstrato.php';

class Episodio extends ControladorAbstrato {

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

	public function allEpisodio(){
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            //$perms = $this->getPerms($user['Permissoes']);
            //$this->data['perms'] = $perms;
            $this->data['idUser'] = $user['idUser'];
            $this->data['perms'] = $user['Permissoes'];
        }
        $this->data['h3title'] = 'Adicionados Recentemente';
        $this->data['episodios'] = $this->main_model->get_table_limited('episodio',50,'idEpisodio');
        $this->load->view('allEps',$this->data);
    }

	public function gerirEps(){
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            $this->data['perms'] = $user['Permissoes'];
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            $this->data['idUser'] = $user['idUser'];
            $idTemporada = $this->uri->segment(3);
            if(empty($idTemporada)){
                $idTemporada = $_POST['idTemporada'];
            }
            $queryt = $this->main_model->get_main_where_array('temporadas','idTemporada',$idTemporada);
            $querys = $this->main_model->get_main_where_array('series','idSerie',$queryt[0]['idSerie']);
            $levelsNeeded = array(
                MODPERM,
                ADMPERM
            );
            $this->checkPermsV2($querys[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
            $this->data['idTemporada'] = $idTemporada;
            if(isset($_POST['Editar'])){
                if(isset($_POST['idEpisodio'])){
                    $queryml = $this->main_model->get_main_where_array('episodio','idEpisodio',$_POST['idEpisodio']);
                    $msg = 'Editado ' . $queryml[0]['titulo'];
                    $valuesml = array(
                        'idUser' => $this->data['idUser'],
                        'info' => $msg,
                        'status' => 1
                    );
                    $this->main_model->add('modlogs',$valuesml);
                    $values = array(
                        'titulo' => $_POST['titulo'],
                        'dataRelease' => $_POST['dataRelease']
                    );
                    $this->main_model->edit('idEpisodio','episodio',$_POST['idEpisodio'],$values);
                    redirect();
                }else{
                    $this->data['query'] = $this->main_model->get_main_where('episodio','idEpisodio',$_POST['Editar']);
                    $this->data['idEpisodio'] = $_POST['Editar'];
                    $this->load->view('editarEpisodio',$this->data);
                }
            }elseif(isset($_POST['Remover'])){
                $queryml = $this->main_model->get_main_where_array('episodio','idEpisodio',$_POST['Remover']);
                $msg = 'Removido ' . $queryml[0]['titulo'];
                $valuesml = array(
                    'idUser' => $this->data['idUser'],
                    'info' => $msg,
                    'status' => 1
                );
                $this->main_model->add('modlogs',$valuesml);
                $query = $this->main_model->get_main_where_array('temporadas','idTemporada',$queryml[0]['idTemporada']);
                $valuest = array(
                    'nEpisodios' => $query[0]['nEpisodios'] - 1
                );
                $this->main_model->edit('idTemporada','temporadas',$queryml[0]['idTemporada'],$valuest);
                $this->main_model->delete('idEpisodio','episodio',$_POST['Remover']);
                redirect();
            }else{
                $idTemporada = $this->uri->segment(3);
                $this->data['idTemporada'] = $idTemporada;
                $query = $this->main_model->get_main_where('temporadas','idTemporada',$idTemporada);
                $querye = $this->main_model->get_main_where_array('episodio','idTemporada', $idTemporada);
                $this->data['query'] = $query;
                $this->data['querye'] = $querye;
                $this->data['querys'] = $this->main_model->get_main_where('series','idSerie',$query[0]->idSerie);
                $this->load->view('gerirEpisodio',$this->data);
            }

        }
    }

    public function addEps()
    {
        $this->checkLogin();
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $idTemporada = $this->uri->segment(3);
        if(isset($_POST['idTemporada'])){
            $queryt = $this->main_model->get_main_where_array('temporadas','idTemporada',$_POST['idTemporada']);
            $querys = $this->main_model->get_main_where_array('series','idSerie',$queryt[0]['idSerie']);
            $this->checkPermsV2($querys[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
        }
        if(isset($_POST['Criar'])){
            //$animeName = str_replace(' ', '%20' ,$_POST['animeName']);
            //$url = 'http://localhost:3000/getAnimeEpisode/' . $animeName . '/' . $_POST['animeEps'];
            //$infoeps = file_get_contents($url);
            //print_r($infoeps);
            $video = $this->UploadVideo($_POST);
            $url = $video['video_path'] . $video['video_name'];
            $query = $this->main_model->get_main_where_array('temporadas','idTemporada',$_POST['idTemporada']);
            $queryS = $this->main_model->get_main_where_array('series','idSerie',$query[0]['idSerie']);
            $videoname = $queryS[0]['Titulo'] . ' ' . $query[0]['Titulo'] . ' | ' . $_POST['animeEps'];
            $valuest = array(
                'nEpisodios' => $query[0]['nEpisodios'] + 1
            );
            $values = array(
                'url' => $url,
                'idTemporada' => $_POST['idTemporada'],
                'titulo' => $videoname
            );
            print_r($_POST);
            $msg = 'Adicionado ' . $videoname;
            $valuesml = array(
                'idUser' => $this->data['idUser'],
                'info' => $msg,
                'status' => 1
            );
            $this->main_model->add('modlogs',$valuesml);
            $this->main_model->edit('idTemporada','temporadas',$_POST['idTemporada'],$valuest);
            $this->main_model->add('episodio',$values);
            redirect();
        }else{
            $idTemporada = $this->uri->segment(3);
            $this->data['idTemporada'] = $idTemporada;
            $this->load->view('addEpisodio',$this->data);
        }
    }

    public function watchepisode(){
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            $this->data['perms'] = $user['Permissoes'];
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            $this->data['idUser'] = $user['idUser'];
        }
        $idEpisodio = $this->uri->segment(3);
        $query = $this->main_model->get_main_where('episodio','idEpisodio',$idEpisodio);
        $queryTemp = $this->main_model->get_main_where('temporadas','idTemporada',$query[0]->idTemporada);
        $querySerie = $this->main_model->get_main_where('series','idSerie',$queryTemp[0]->idSerie);
        $queryComentarios = $this->main_model->get_main_where('comentario','idEpisodio',$idEpisodio);
        $this->data['query'] = $query;
        //print_r($queryComentarios);
        if(!empty($queryComentarios)){
            $queryUserCom = $this->main_model->get_both_main_where($idEpisodio);
            //$queryUserCom = $this->db->query('SELECT * FROM user u INNER JOIN comentario c ON u.idUser = c.idUser WHERE u.idUser =' . $queryComentarios[0]->idUser);
            $this->data['comentarios'] = $queryUserCom;
        }else{
            $this->data['comentarios'] = array();
        }
        //print_r($queryUserCom);
        $this->data['idEpisodio'] = $idEpisodio;
        $recommended = $this->getRecommended($querySerie[0]->Tipo);
        $q = array();
        foreach ($recommended as $r){
            $q[] = $this->main_model->get_main_where('series','idSerie',$r->idSerie);
        }
        $this->data['recommended'] = array_slice($q,0,5);
        $this->load->view('watcheps',$this->data);
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

    public function epsProximo(){
        $idEpisodio = $this->uri->segment(3);
        $query = $this->main_model->get_main_where_array('episodio','idEpisodio',$idEpisodio);
        $queryEps = $this->main_model->get_main_where_array('episodio','idTemporada',$query[0]['idTemporada']);
        for($i = 0; $i < count($queryEps); $i++){
            if($queryEps[$i]['idEpisodio'] == $idEpisodio){
                if(isset($queryEps[$i + 1])){
                    $nextEpsId = $queryEps[$i + 1]['idEpisodio'];
                    redirect(base_url('/Episodio/watchepisode/' . $nextEpsId));
                }
                else{}
                    redirect(base_url());
            }
        }
        redirect(base_url());
    }

    public function epsAnterior(){
        $idEpisodio = $this->uri->segment(3);
        $query = $this->main_model->get_main_where_array('episodio','idEpisodio',$idEpisodio);
        $queryEps = $this->main_model->get_main_where_array('episodio','idTemporada',$query[0]['idTemporada']);
        for($i = count($queryEps) - 1; $i >= 0; $i--){
            if($queryEps[$i]['idEpisodio'] == $idEpisodio){
                if(isset($queryEps[$i - 1])){
                    $nextEpsId = $queryEps[$i -1]['idEpisodio'];
                    redirect(base_url('/Episodio/watchepisode/' . $nextEpsId));
                }
            }
        }
        redirect(base_url());
    }

    private function getRecommended($category){
        $categoryArray = explode(',',$category);
        $querymerged = array();
        for($i = 0; $i < count($categoryArray); $i++){
            $tipo = $categoryArray[$i];
            $query = $this->main_model->get_main_where('series','Tipo', $tipo);
            $querymerged = array_merge($querymerged, $query);
        }

        return $querymerged;
    }

    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "\r\n";
    }

    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "\r\n";
    }

    private function UploadVideo($inputFileName){
        if ($this->input->post('video_upload')) {
            //set preferences
            //file upload destination
            $upload_path =  "resources/vid/";
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = '*';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            $config['encrypt_name'] = FALSE;
            //store video info once uploaded
            $video_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload
            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select a video file.');
            }
            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'video_name' is the name of the input
                if (!$this->upload->do_upload('video_name')) {
                    //if file upload failed then catch the errors
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } else {
                    //store the video file info
                    $video_data = $this->upload->data();
                }
            }
            // There were errors, you have to delete the uploaded video
            if ($is_file_error) {
                if ($video_data) {
                    $file = $upload_path . $video_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            } else {
                $data['video_name'] = $video_data['file_name'];
                $data['video_path'] = $upload_path;
                $data['video_type'] = $video_data['file_type'];
                $this->handle_success('Video was successfully uploaded to direcoty <strong>' . $upload_path . '</strong>.');
            }
        }
        //load the error and success messages
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        return $data;
    }

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


}
