<?php


class Main_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_count($table){
        //print_r($this->db->count_all($this->table));
        return $this->db->count_all($table);
    }

    public function get_main($limit,$start,$table){
        $this->db->limit($limit,$start);
        $query = $this->db->get($table);
        //print_r($writeQuery);
        return $query->result(); //Retorna array de objetos quando se usa o Result
    }

    public function get_main_fot($table){
        $this->db->order_by('posicao','asc');
        $this->db->order_by('lado','asc');
        $query = $this->db->get($table);
        return $query->result_array(); //Retorna array de objetos quando se usa o Result
    }

    public function get_table($table){
        //$this->db->order_by('id');
        $query = $this->db->get($table);
        return $query->result_array(); //Retorna array de objetos quando se usa o Result
    }

    public function get_main_where($table,$whereName,$equalsName){
        $this->db->where($whereName, $equalsName);
        $query = $this->db->get($table);
        //print_r($writeQuery);
        return $query->result(); //Retorna array de objetos quando se usa o Result
    }

    public function double_get_main_where_array($table,$array){
        $this->db->where($array);
        $query = $this->db->get($table);
        //print_r($writeQuery);
        return $query->result_array(); //Retorna array de objetos quando se usa o Result
    }

    public function get_main_where_array($table,$whereName,$equalsName){
        $this->db->where($whereName, $equalsName);
        $query = $this->db->get($table);
        //print_r($writeQuery);
        return $query->result_array(); //Retorna array de objetos quando se usa o Result
    }

    public function get_both_main_where($idEpisodio){
        $this->db->select('*');
        $this->db->from('comentario');
        $this->db->join('user','comentario.idUser = user.idUser');
        $this->db->where('comentario.idEpisodio =', $idEpisodio);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function add($table,$values){
        $this->db->insert($table,$values);
    }

    public function delete($idNome, $table,$id){
        $this->db->where($idNome , $id);
        $this->db->delete($table);
    }

    public function deletep($table,$idNome,$id,$idNome2,$id2){
        $this->db->where($idNome, $id);
        $this->db->where($idNome2, $id2);
        $this->db->delete($table);
    }

    public function edit($idNome,$table,$id,$values){
        $this->db->set($values);
        $this->db->where($idNome , $id);
        $this->db->update($table);
    }
}

?>