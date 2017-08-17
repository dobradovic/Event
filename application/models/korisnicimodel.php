<?php

class korisnicimodel extends CI_Model{

    function __construct() {
     parent::__construct();
     $this->load->database();
    }

        //Vraca sve korisnike
        function svi_korisnici(){
            $this->db->select('*');
            $this->db->from('korisnik');
            $this->db->join('uloga', 'uloga.id_uloga = korisnik.id_uloga');
            return $query = $this->db->get();
            }

        //Brise korisnika
        function obrisi_korisnika($id){
            $this->db->where('id_korisnik', $id);
            $this->db->delete('korisnik');
        }

        //Dodavanje novog korisnika
        function unesi_korisnika($data){
            $this->db->insert('korisnik', $data);
        }


        //Update korisnika
        function izmeni_korisnika($id, $data){
            $this->db->where('id_korisnik', $id);
            $this->db->update('korisnik', $data);
        }

          //Unos poslate kontakt forme u bazu

    function unosKontakt($data)
    {
        $this->db->insert('kontakt',$data);
    }

    function uloge(){
        $query=$this->db->get('uloga');
        return $query->result();
    }

    function unosUloge($data){
        $this->db->insert('uloga',$data);
    }

    function obrisi_ulogu($id){
        $this->db->where('id_uloga', $id);
        $this->db->delete('uloga');
    }

    function izmeni_ulogu($id, $data){
        $this->db->where('id_uloga', $id);
        $this->db->update('uloga', $data);
    }



    }
