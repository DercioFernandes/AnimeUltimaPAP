<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
            $this->data['username'] = $user['Username'];
            $this->data['email'] = $user['Email'];
            $this->data['idUser'] = $user['idUser'];
            $this->data['perms'] = $user['Permissoes'];
        }
        $this->data['contSearch'] = 'Serie/search';
    }

	public function myprofile()
	{
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $this->data['serieFav'] = $this->main_model->get_both_main_where_limited('series', 'favorito', 'series.idSerie = favorito.idSerie', 'series.idUser', $user['idUser'],9);
            $this->data['serieSeg'] = $this->main_model->get_both_main_where_limited('series', 'seguir', 'series.idSerie = seguir.idSerie', 'series.idUser', $user['idUser'],9);
            $this->data['serieHol'] = $this->main_model->get_both_main_where_limited('series', 'onhold', 'series.idSerie = onhold.idSerie', 'series.idUser', $user['idUser'],9);
            $this->data['serieCom'] = $this->main_model->get_both_main_where_limited('series', 'completo', 'series.idSerie = completo.idSerie', 'series.idUser', $user['idUser'],9);
            $this->data['serieDro'] = $this->main_model->get_both_main_where_limited('series', 'dropped', 'series.idSerie = dropped.idSerie', 'series.idUser', $user['idUser'],9);
            $this->data['serieAss'] = $this->main_model->get_both_main_where_limited('series', 'watching', 'series.idSerie = watching.idSerie', 'series.idUser', $user['idUser'],9);
            $this->load->view('myprofile', $this->data);
        }
	}

	public function editUser(){
        if($this->login_model->isLoggedIn() == true) {
            if(isset($_POST['Editar'])){
                $values = array(
                    'Username' => $_POST['username'],
                    'Email' => $_POST['email']
                );
                if(!isset($_POST['manterImagem'])){
                    $uploadFile = $this->UploadFile('fotoperfil');
                    $e = $uploadFile['fileData'];
                    $pfp = $e['file_name'];
                    $valuepfp = array(
                        'FotoPerfil' => $pfp
                    );
                    $values = array_merge($values,$valuepfp);
                }
                if(!isset($_POST['password'])){
                    $password = hash('sha256',$_POST['password']);
                    $valuespass = array(
                        'Password' => $password
                    );
                    $values = array_merge($values,$valuespass);
                }
                $this->main_model->edit('idUser','user',$_POST['idUser'],$values);
                redirect('User/myprofile/' . $_POST['idUser']);
            }else{
                $user = $this->data['user'];
                $idUser = $this->uri->segment(3);
                $this->data['idUser'] = $idUser;
                $this->data['query'] = $user;
                $this->load->view('myprofileedit', $this->data);
            }
        }
    }

    public function allSeriesFav(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'favorito', 'series.idSerie = favorito.idSerie', 'series.idUser', $user['idUser']);
            $this->data['h3title'] = 'Meus Favoritos';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesSeg(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'seguir', 'series.idSerie = seguir.idSerie', 'series.idUser', $user['idUser']);
            $this->data['h3title'] = 'Séries que Segues';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesHol(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'onhold', 'series.idSerie = onhold.idSerie', 'series.idUser', $user['idUser']);
            $this->data['h3title'] = 'Séries em Espera ';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesCom(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'completo', 'series.idSerie = completo.idSerie', 'series.idUser', $user['idUser']);
            $this->data['h3title'] = 'Séries Completas';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesAss(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'watching', 'series.idSerie = watching.idSerie', 'series.idUser', $user['idUser']);
            $this->data['h3title'] = 'Séries que estás a ver ';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesDro(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'dropped', 'series.idSerie = dropped.idSerie', 'series.idUser', $user['idUser']);
            $this->data['h3title'] = 'Séries Dropadas ';
            $this->load->view('all',$this->data);
        }
    }

    private function UploadFile($inputFileName)
    {
        /*
         * O CodeIgniter possui uma biblioteca nativa para trabalhar com upload de arquivos, chamada File Uploading.
         */
        $this->load->library('upload');
        //Definimos um caminho para upload, neste caso será na raiz /app2
        $path = "./resources/img/pfp/";

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
