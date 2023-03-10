<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/ControladorAbstrato.php';

class User extends ControladorAbstrato {

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
            $query = $this->main_model->get_main_where_array('notification','idUser',$user['idUser']);
            $this->data['notif'] = $query;
            $this->checkIfBanned($user['Permissoes']);
        }
        $this->data['contSearch'] = 'User/search';
    }

	public function myprofile()
	{
        $this->data['titulo'] = 'Meu Perfil';
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            if($user['Permissoes'] >= 2 && !empty($user['Banner'])){
                $this->data['bannerUrl'] = '../../resources/img/pfp/' . $user['Banner'];
            }
            $this->data['serieFav'] = $this->main_model->get_both_main_where_limited('series', 'favorito', 'series.idSerie = favorito.idSerie', 'favorito.idUser', $user['idUser'],9);
            $this->data['serieSeg'] = $this->main_model->get_both_main_where_limited('series', 'seguir', 'series.idSerie = seguir.idSerie', 'seguir.idUser', $user['idUser'],9);
            $this->data['serieHol'] = $this->main_model->get_both_main_where_limited('series', 'onhold', 'series.idSerie = onhold.idSerie', 'onhold.idUser', $user['idUser'],9);
            $this->data['serieCom'] = $this->main_model->get_both_main_where_limited('series', 'completo', 'series.idSerie = completo.idSerie', 'completo.idUser', $user['idUser'],9);
            $this->data['serieDro'] = $this->main_model->get_both_main_where_limited('series', 'dropped', 'series.idSerie = dropped.idSerie', 'dropped.idUser', $user['idUser'],9);
            $this->data['serieAss'] = $this->main_model->get_both_main_where_limited('series', 'watching', 'series.idSerie = watching.idSerie', 'watching.idUser', $user['idUser'],9);
            $this->data['myPosts'] = $this->main_model->get_main_where_limited('compost','idUser',$user['idUser'],3);
            $this->data['likedPosts'] = $this->main_model->get_both_main_where_limited('compost', 'compostvotes', 'compost.idCompost = compostvotes.idCompost', 'compostvotes.idUser', $user['idUser'],3);
            $this->load->view('myprofile', $this->data);
        }
	}

	public function viewProfile(){
        $idUser = $this->uri->segment(3);
        $this->data['serieFav'] = $this->main_model->get_both_main_where_limited('series', 'favorito', 'series.idSerie = favorito.idSerie', 'favorito.idUser', $idUser,9);
        $this->data['serieSeg'] = $this->main_model->get_both_main_where_limited('series', 'seguir', 'series.idSerie = seguir.idSerie', 'seguir.idUser', $idUser,9);
        $this->data['serieHol'] = $this->main_model->get_both_main_where_limited('series', 'onhold', 'series.idSerie = onhold.idSerie', 'onhold.idUser', $idUser,9);
        $this->data['serieCom'] = $this->main_model->get_both_main_where_limited('series', 'completo', 'series.idSerie = completo.idSerie', 'completo.idUser', $idUser,9);
        $this->data['serieDro'] = $this->main_model->get_both_main_where_limited('series', 'dropped', 'series.idSerie = dropped.idSerie', 'dropped.idUser', $idUser,9);
        $this->data['serieAss'] = $this->main_model->get_both_main_where_limited('series', 'watching', 'series.idSerie = watching.idSerie', 'watching.idUser', $idUser,9);
        $this->data['myPosts'] = $this->main_model->get_main_where_limited('compost','idUser',$idUser,3);
        $this->data['likedPosts'] = $this->main_model->get_both_main_where_limited('compost', 'compostvotes', 'compost.idCompost = compostvotes.idCompost', 'compostvotes.idUser', $idUser,3);
        $this->data['userinfo'] = $this->main_model->get_main_where_array('user','idUser',$idUser);
        $this->data['titulo'] = 'Perfil de '.$this->data['userinfo'][0]['Username'];
        if($this->data['userinfo'][0]['Permissoes'] >= 2 && !empty($this->data['userinfo'][0]['Banner'])){
            $this->data['bannerUrl'] = '../../resources/img/pfp/' . $this->data['userinfo'][0]['Banner'];
        }
        $this->load->view('viewprofile', $this->data);
    }

	public function gerirUser(){
        $this->checkLogin('','Fa??a Login primeiro.');
        $levelsNeeded = array(
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $cont = 0;
        $this->data['users'] = $this->main_model->get_table('user');
        foreach ($this->data['users'] as $user){
            $this->data['users'][$cont]['Permissoes'] = $this->getPermissionsName($user['Permissoes']);
            $cont += 1;
        }
        $this->data['titulo'] = 'Gerir Utilizadores';
        $this->load->view('gerirUser',$this->data);
    }

    private function getPermissionsName($perms){
        switch ($perms){
            case 0:
                return 'Banido';
                break;
            case 1:
                return 'Normal';
                break;
            case 2:
                return 'Premium';
                break;
            case 3:
                return 'Uploader';
                break;
            case 4:
                return 'Moderador';
                break;
            case 5:
                return 'Administrador';
                break;
            default:
                return 'N??o Definido';
        }
    }

	public function editUser(){
        $this->data['titulo'] = 'Editar User';
        if($this->login_model->isLoggedIn() == true) {
            if(isset($_POST['Editar'])){
                $values = array(
                    'Username' => $_POST['username']
                );
                if(!empty($_POST['email'])){
                    $valuesemail = array(
                        'Email' => $_POST['email']
                    );
                    $values = array_merge($values,$valuesemail);
                }
                if(!isset($_POST['manterImagem'])){
                    $uploadFile = $this->UploadFile('fotoperfil',1);
                    $e = $uploadFile['fileData'];
                    $pfp = $e['file_name'];
                    $valuepfp = array(
                        'FotoPerfil' => $pfp
                    );
                    $values = array_merge($values,$valuepfp);
                }
                if(!isset($_POST['manterBanner'])){
                    $uploadFileB = $this->UploadFile('banner',0);
                    $b = $uploadFileB['fileData'];
                    $banner = $b['file_name'];
                    $valueban = array(
                        'Banner' => $banner
                    );
                    $values = array_merge($values,$valueban);
                    $this->session->set_flashdata('error',"Tem de fazer login novamente para atualizar a Banner.");
                }
                if(!empty($_POST['password'])){
                    $password = hash('sha256',$_POST['password']);
                    $valuespass = array(
                        'Password' => $password
                    );
                    $values = array_merge($values,$valuespass);
                }
                if(isset($_POST['permissoes'])){
                    $valuesperm = array(
                        'Permissoes' => $_POST['permissoes']
                    );
                    $values = array_merge($values,$valuesperm);
                }
                $this->main_model->edit('idUser','user',$_POST['idUser'],$values);
                redirect('User/myprofile/' . $_POST['idUser']);
            }else{
                $user = $this->data['user'];
                $idUser = $this->uri->segment(3);
                $query = $this->main_model->get_main_where_array('user','idUser',$idUser);
                $this->data['idUser'] = $idUser;
                $this->data['selected'] = 'selected';
                if($user['idUser'] == $query[0]['idUser']){
                    $this->data['isUser'] = 1;
                }else if($user['Permissoes'] == 5){
                    $this->data['isAdmin'] = 1;
                }
                $levelsNeeded = array(
                    MODPERM,
                    ADMPERM
                );
                $this->checkPermsV2($query[0]['idUser'],$this->data['idUser'],$levelsNeeded,$this->data['perms']);
                $this->data['query'] = $query[0];
                $this->load->view('myprofileedit', $this->data);
            }
        }
    }

    public function removerUser(){
        $this->checkLogin('','N??o tem permiss??es.');
        $levelsNeeded = array(
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $idUser = $this->uri->segment(3);
        $this->main_model->delete('idUser','user',$idUser);
        $this->main_model->delete('idUser','comentario',$idUser);
        $this->main_model->delete('idUser','comentariocompost',$idUser);
        $this->main_model->delete('idUser','notification',$idUser);
        $this->main_model->delete('idUser','rating',$idUser);
        $this->main_model->delete('idUser','seguir',$idUser);
        $this->main_model->delete('idUser','onhold',$idUser);
        $this->main_model->delete('idUser','completo',$idUser);
        $this->main_model->delete('idUser','compostvotes',$idUser);
        $this->main_model->delete('idUser','dropped',$idUser);
        $this->main_model->delete('idUser','favorito',$idUser);
        $this->main_model->delete('idUser','compost',$idUser);
        redirect('User/gerirUser');
    }

    public function allSeriesFav(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'favorito', 'series.idSerie = favorito.idSerie', 'series.idUser', $idUser);
            $this->data['h3title'] = 'Meus Favoritos';
            $this->data['titulo'] = 'Favoritos';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesSeg(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'seguir', 'series.idSerie = seguir.idSerie', 'series.idUser', $idUser);
            $this->data['h3title'] = 'S??ries que Segues';
            $this->data['titulo'] = 'Seguindo';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesHol(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'onhold', 'series.idSerie = onhold.idSerie', 'series.idUser', $idUser);
            $this->data['h3title'] = 'S??ries em Espera ';
            $this->data['titulo'] = 'Em Espera';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesCom(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'completo', 'series.idSerie = completo.idSerie', 'series.idUser', $idUser);
            $this->data['h3title'] = 'S??ries Completas';
            $this->data['titulo'] = 'Completas';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesAss(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'watching', 'series.idSerie = watching.idSerie', 'series.idUser', $idUser);
            $this->data['h3title'] = 'S??ries que est??s a ver ';
            $this->data['titulo'] = 'A ver';
            $this->load->view('all',$this->data);
        }
    }

    public function allSeriesDro(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['series'] = $this->main_model->get_both_main_whereV2('series', 'dropped', 'series.idSerie = dropped.idSerie', 'series.idUser', $idUser);
            $this->data['h3title'] = 'S??ries Dropadas ';
            $this->data['titulo'] = 'Dropadas';
            $this->load->view('all',$this->data);
        }
    }

    public function allMyPosts(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['posts'] = $this->main_model->get_main_where_array('compost','idUser',$idUser);
            $this->data['h3title'] = 'Posts';
            $this->data['titulo'] = 'Posts';
            $this->load->view('allPost',$this->data);
        }
    }

    public function allMyLikedPosts(){
        if($this->login_model->isLoggedIn() == true) {
            $user = $this->data['user'];
            $idUser = $this->uri->segment(3);
            $this->data['posts'] = $this->main_model->get_both_main_whereV2('compost', 'compostvotes', 'compost.idCompost = compostvotes.idCompost' , 'compostvotes.idUser', $idUser);
            $this->data['h3title'] = 'Posts Curtidos';
            $this->data['titulo'] = 'Posts Curtidos';
            $this->load->view('allPost',$this->data);
        }
    }

    public function banUser(){
        $this->checkLogin('','Fa??a Login primeiro');
        $levelsNeeded = array(
            MODPERM,
            ADMPERM
        );
        $this->checkPerms($levelsNeeded,$this->data['perms']);
        $idUser = $this->uri->segment(3);
        $query = $this->main_model->get_main_where_array('user','idUser',$idUser);
        if(($query[0]['Permissoes'] != 5) && ($this->data['perms'] > $query[0]['Permissoes'])){
            $msg = 'User ' . $query[0]['Username'] . ' banido pela raz??o: ' . $_POST['reason'];
            $valuesml = array(
                'idUser' => $this->data['idUser'],
                'info' => $msg,
                'status' => 1
            );
            $this->main_model->add('modlogs',$valuesml);
            $values = array(
                'Permissoes' => 0
            );
            $this->main_model->edit('idUser','user',$idUser,$values);
            redirect();
        }else{
            $msg = 'User ' . $query[0]['Username'] . ' ia ser banido pela raz??o: ' . $_POST['reason'] ;
            $valuesml = array(
                'idUser' => $this->data['idUser'],
                'info' => $msg,
                'status' => 1
            );
            $this->main_model->add('modlogs',$valuesml);
            redirect();
        }

    }

    public function search(){
        $this->data['titulo'] = 'Procurar User';
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            //$perms = $this->getPerms($user['Permissoes']);
            //$this->data['perms'] = $perms;
            $this->data['idUser'] = $user['idUser'];
        }
        $query = $this->main_model->get_table('user');
        if(!empty($_POST['animename'])){
            $searchitem = $_POST['animename'];
            $cont = 0;
            $results = array();
            $seriesres = array();
            foreach ($query as $serie){
                //print_r($serie);
                //$results = array_search($searchitem,$serie);
                if(strpos($serie['Username'], $searchitem) !== false){
                    $results[$cont] = $serie['idUser'];
                    $cont += 1;
                }
            }
            if(!empty($results)){
                for($i = 0; $i <= $cont - 1; $i++){
                    $seriesres = array_merge($seriesres,$this->main_model->get_main_where_array('user','idUser',$results[$i]));
                }
            }
            $this->data['n'] = $cont;
            $this->data['users'] = $seriesres;
            $this->load->view('searchUsers',$this->data);
        }else{
            redirect();
        }
    }

    public function goPremium(){
        $this->data['titulo'] = 'Go Premium';
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            /*$perms = $this->getPerms($user['perms']);
            $this->data['perms'] = $perms;*/
            $this->data['fotoPerfil'] = $user['FotoPerfil'];
            $this->data['idUser'] = $user['idUser'];
            $this->data['perms'] = $user['Permissoes'];
        }
        $this->load->view('goPrem',$this->data);
    }

    public function confirmPrem(){
        $this->checkLogin('','Fa??a Login primeiro');
        $values = array(
            'Permissoes' => 2
        );
        $this->main_model->edit('idUser','user',$this->data['idUser'],$values);
        redirect();
    }



    private function UploadFile($inputFileName,$type)
    {
        /*
         * O CodeIgniter possui uma biblioteca nativa para trabalhar com upload de arquivos, chamada File Uploading.
         */
        $this->load->library('upload');
        //Definimos um caminho para upload, neste caso ser?? na raiz /app2
        $path = "./resources/img/pfp/";

        //Definimos as configura????es para o upload

        //Determinamos o path para gravar o arquivo
        $config['upload_path'] = $path;

        //Definimos os tipos de arquivos suportados
        if($type == 0){
            $config['max_width'] = 3840;
            $config['max_height'] = 2160;
            $config['allowed_types'] = 'jpg|png|gif|pdf|zip|rar|doc|xls';
        }else{
            $config['max_width'] = 1000;
            $config['max_height'] = 1000;
            $config['allowed_types'] = 'jpg|png|pdf|zip|rar|doc|xls';
        }

        //Definimos o maximo permitido
        //Php.ini definimos os tamanhos permitidos
        //post_max_size=15M -> pelo POST
        // upload_max_size=15M // Por Upload
        $config['max_size'] = '51120';//em KB

        //Definimos que o nome do arquivo ser?? criptografado
        $config['encrypt_name'] = TRUE;

        //Verificamos se o diret??rio existe se n??o existe criamos com permiss??o de leitura e escrita
        if (!is_dir($path))
            mkdir($path, 0777, $recursive = true);

        //Setamos as configura????es para a library upload
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($inputFileName)) {
            //Em caso de erro retornamos os mesmos para uma vari??vel e enviamos para a view
            $data['error'] = true;
            $data['message'] = $this->upload->display_errors();
            $this->session->set_flashdata('error',$this->upload->display_errors());
            redirect();
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
