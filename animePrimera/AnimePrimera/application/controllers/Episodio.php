<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Episodio extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library(array('session','parser','image_lib'));
        $this->load->helper(array('text','string','url','form'));
        $this->load->model('login_model');
        $this->load->model('main_model');
    }

	public function index()
	{
        if($this->login_model->isLoggedIn() == true){
            $user = $this->data['user'];
            $perms = $this->getPerms($user['perms']);
            $this->data['perms'] = $perms;
        }
        $this->data['titulo'] = 'AnimePrimera ADM';
        print_r($this->main_model->get_table('series'));
        $this->data['series'] = $this->main_model->get_table('series');

        $this->load->view('animeprimeraadm',$this->data);
	}

	public function gerirEps(){
        if(isset($_POST['Editar'])){
            if(isset($_POST['idEpisodio'])){
                $values = array(
                    'url' => $_POST['url'],
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
            $this->main_model->delete('idEpisodio','episodio',$_POST['Remover']);
            redirect();
        }else{
            $idTemporada = $this->uri->segment(3);
            $this->data['idTemporada'] = $idTemporada;
            $query = $this->main_model->get_main_where('temporadas','idTemporada',$idTemporada);
            $querye = $this->main_model->get_main_where_array('episodio','idTemporada', $idTemporada);
            $this->data['query'] = $query;
            $this->data['querye'] = $querye;
            print_r($query);
            $this->data['querys'] = $this->main_model->get_main_where('series','idSerie',$query[0]->idSerie);
            $this->load->view('gerirEpisodio',$this->data);
        }

    }

    public function addEps()
    {
        if(isset($_POST['Criar'])){
            $values = array(
                'url' => $_POST['url'],
                'idTemporada' => $_POST['idTemporada']
            );
            $this->main_model->add('episodio',$values);
            redirect();
        }else{
            $idTemporada = $this->uri->segment(3);
            $this->data['idTemporada'] = $idTemporada;
            $this->load->view('addEpisodio',$this->data);
        }
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
