<?php

class menimodel extends CI_Model{

    function __construct() {
     parent::__construct();
     $this->load->database();
    }

    function ucitajMeni(){
        $query=$this->db->query('SELECT * FROM meni');
        return $query->result();
    }

    function ucitajMeniPocetna(){
        $query=$this->db->query('SELECT * FROM meni WHERE broj <> 2 and broj <> 3');
        return $query->result();
    }

 function ucitajMeniKorisnik(){
         $query=$this->db->query('SELECT * FROM meni WHERE broj <> 3');
        return $query->result();
    }

    function ucitajMeniAdmin(){
        $query=$this->db->query('SELECT * FROM meni');
        return $query->result();
    }

    function unesiMeni($data){
        $this->db->insert('meni',$data);
    }

    function savMeni(){
        $this->db->select('*');
        $this->db->from('meni');
        $query=$this->db->get();
        return $query->result();
    }

    function obrisiMeni($id){
        $this->db->where('id_meni',$id);
        $this->db->delete('meni');
    }

    function izmeniMeni($id, $data){
        $this->db->where('id_meni', $id);
        $this->db->update('meni', $data);
    }


    }
