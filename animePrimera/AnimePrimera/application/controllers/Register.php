<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    private $data;
    public function __construct(){
        parent::__construct();

        error_reporting(0);
        $this->load->helper(array('text','string','url'));
        $this->load->library(array('form_validation','session','parser'));
        $this->load->model('login_model');
        $this->data['contSearch'] = 'Serie/search';
        $this->data['titulo'] = 'Registrar';
    }

    public function registrar(){
        if ($this->login_model->isLoggedIn() == true) {
            echo 'User já logado';
        }
        $this->form_validation->set_rules('username','user','required');
        $this->form_validation->set_rules('password','senha','required');
        if($this->form_validation->run()) {
            if(isset($_POST['username']) && isset($_POST['password'])){
                $uploadFile = $this->UploadFile('fotoperfil');
                $e = $uploadFile['fileData'];
                $pfp = $e['file_name'];
                if($this->login_model->usernameExists($_POST['username'])){
                    $this->session->set_flashdata('error','Username já existe');
                    redirect('register');
                }else{
                    $password = hash('sha256',$_POST['password']);
                    $values = array(
                        'Username' => $_POST['username'],
                        'Email' => $_POST['email'],
                        'Password' => $password,
                        'datacriacao' => date('Y/m/d'),
                        'Permissoes' => 1,
                        'tipoConta' => 0,
                        'FotoPerfil' => $pfp
                    );
                    $this->login_model->add($values);
                    redirect('login');
                    //$this->login();
                }
            }
        }else{
        }

        $this->load->view('registrar',$this->data);
    }

    public function alert($status){
        switch ($status){
            case 0:
                return 'Ocorreu um erro';
            case 1:
                return 'Pedido efetuado com Sucesso';
            default:
                return 'Ocorreu um erro';
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
        $config['allowed_types'] = 'jpg|png|pdf|zip|rar|doc|xls';

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

}// controller Login
