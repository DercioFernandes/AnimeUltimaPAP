<?php

class Login_model extends CI_Model{
    protected $table = 'user';
    
    public function __construct(){
        parent::__construct();
    }

    public function add($values){
        $this->db->insert($this->table,$values);
    }
    
    public function getByUsername($username){
        $user = array('username' => $username);
        $query = $this->db->get_where($this->table, $user,1);
        if($query->num_rows()>0)
            return $query->row_array();
        return false;
    }
    
    public function isLoggedIn(){
        // $logged_in = $_SESSION['logged_in'];
        //ou
        // $logged_in = $this->session->logged_in;
        $logged_in = $this->session->userdata('logged_in');
        $user = $this->session->userdata('user');
        if($logged_in== TRUE){
            $this->createSession($user);
            return true;
        }
        return false;
    }
    
    public function createSession($user_data){
        $this->session->set_userdata(array('logged_in' =>TRUE, 'user'=>$user_data));
    }
    
    public function emailExists($email){
        $user = array('email' => $email);
        $query = $this->db->get_where($this->table, $user,1);
        if($query->num_rows()>0)
            return true;
        return false;
    }
    
    public function usernameExists($username){
        $user = array('username' => $username);
        $query = $this->db->get_where($this->table, $user,1);
        if($query->num_rows()>0)
            return true;
        return false;
    }
    
    public function getAll(){
        return $this->db->get($this->table)->result_array();
    }
    
    public function checkPassword($password,$hashed_password) {
        return (hash('sha256',$password)==$hashed_password);
    }
    
}








