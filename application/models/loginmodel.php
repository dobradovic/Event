<?php

class loginmodel extends CI_Model{

    function __construct() {
     parent::__construct();
     $this->load->database();
    }

    function login($username,$password){
        $upit_log="SELECT * FROM korisnik k JOIN uloga u ON k.id_uloga=u.id_uloga WHERE ime='".$username."' AND lozinka ='".$password."'";
        $rez_login=  $this->db->query($upit_log);
        $podaci['logovanje_redovi']=  $rez_login->result_array();
        $podaci['broj_redova']= $rez_login->num_rows;

        return $podaci;
    }




    }
