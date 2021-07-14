<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/ControladorAbstrato.php';

class Temporada extends ControladorAbstrato {

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

    public function addTemp(){
        if(isset($_POST['Criar'])){
            $this->checkLogin('serie/seriesinfo/'.$_POST['idSerie'],"Faça Login primeiro.");
            $levelsNeeded = array(
                UPLPERM,
                MODPERM,
                ADMPERM
            );
            $this->checkPerms($levelsNeeded,$this->data['perms']);
            $query = $this->main_model->get_main_where('series','idSerie',$_POST['idSerie']);
            $uploadFile = $this->UploadFile('thumbnail');
            $e = $uploadFile['fileData'];
            $imgname = $e['file_name'];
            $values = array(
                'idSerie' => $_POST['idSerie'],
                'Titulo' => $_POST['tempTitle'],
                'Status' => $_POST['status'],
                'Thumbnail' => $imgname
            );
            $this->main_model->add('temporadas',$values);
            $valuesS = array(
                'nTemporadas' => $query[0]->nTemporadas + 1
            );
            $querymls = $this->main_model->get_main_where_array('series','idSerie',$_POST['idSerie']);
            $msg = 'Adicionado ' . $querymls[0]['Titulo'] . ' ' . $_POST['tempTitle'];
            $valuesml = array(
                'idUser' => $this->data['idUser'],
                'info' => $msg,
                'status' => 1
            );
            $this->main_model->add('modlogs',$valuesml);
            $this->main_model->edit('idSerie','series',$_POST['idSerie'],$valuesS);
            redirect('serie/seriesinfo/'.$_POST['idSerie']);
        }else{
            $idSerie = $this->uri->segment(3);
            $this->checkLogin('serie/seriesinfo/'.$idSerie,"Faça Login primeiro.");
            $levelsNeeded = array(
                UPLPERM,
                MODPERM,
                ADMPERM
            );
            $this->checkPerms($levelsNeeded,$this->data['perms']);
            $this->data['idSerie'] = $idSerie;
            $this->load->view('addTemporada',$this->data);
        }
    }

    public function editarTemp(){
        $idSerie = $this->uri->segment(3);
        $this->checkLogin('serie/seriesinfo/'.$idSerie,'Faça Login primeiro.');
        $querys = $this->main_model->get_main_where_array('series','idSerie',$idSerie);
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPermsV2($querys[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
        if(isset($_POST['Editar'])){
            $values = array(
                'Titulo' => $_POST['titulo'],
                'Status' => $_POST['status'],
                'DataRelease' => $_POST['dataRelease']
            );
            $uploadFile = $this->UploadFile('thumbnail');
            if($uploadFile['error'] == 0){
                $e = $uploadFile['fileData'];
                $imgname = $e['file_name'];
                $valuesImg = array(
                    'Thumbnail' => $imgname
                );
                $values = array_merge($values,$valuesImg);
            }
            $queryml = $this->main_model->get_main_where_array('temporadas','idTemporada',$_POST['idTemporada']);
            $querymls = $this->main_model->get_main_where_array('series','idSerie',$queryml[0]['idSerie']);
            $msg = 'Editado ' . $querymls[0]['Titulo'] . ' ' . $queryml[0]['Titulo'];
            $valuesml = array(
                'idUser' => $this->data['idUser'],
                'info' => $msg,
                'status' => 1
            );
            $this->main_model->add('modlogs',$valuesml);
            $this->main_model->edit('idTemporada','temporadas',$_POST['idTemporada'],$values);
            redirect('serie/seriesinfo/' . $_POST['idSerie']);
        }else{
            $idSerie = $this->uri->segment(3);
            $idTemporada = $this->uri->segment(4);
            $this->data['idSerie'] = $idSerie;
            $this->data['idTemporada'] = $idTemporada;
            $this->data['temporada'] = $this->main_model->get_main_where_array('temporadas','idTemporada',$idTemporada);
            $this->load->view('editarTemporada',$this->data);
        }
    }

    public function remover(){
        $idTemporada = $this->uri->segment(3);
        $queryml = $this->main_model->get_main_where_array('temporadas','idTemporada',$idTemporada);
        $this->checkLogin('serie/seriesinfo/'.$queryml[0]['idSerie'],'Faça Login primeiro.');
        $querymls = $this->main_model->get_main_where_array('series','idSerie',$queryml[0]['idSerie']);
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPermsV2($querymls[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
        $querye = $this->main_model->get_main_where_array('episodio','idTemporada', $idTemporada);
        foreach( $querye as $episodio ){
            $this->main_model->delete('idEpisodio','episodio',$episodio['idEpisodio']);
        }
        $msg = 'Removido ' . $querymls[0]['Titulo'] . ' ' . $queryml[0]['Titulo'];
        $valuesml = array(
            'idUser' => $this->data['idUser'],
            'info' => $msg,
            'status' => 1
        );
        $this->main_model->add('modlogs',$valuesml);
        $this->main_model->delete('idTemporada','temporadas',$idTemporada);
        redirect();
    }

    public function watchepisode(){
        $idEpisodio = $this->uri->segment(3);
        $query = $this->main_model->get_main_where('episodio','idEpisodio',$idEpisodio);
        $this->data['query'] = $query;
        $this->load->view('watcheps',$this->data);
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
