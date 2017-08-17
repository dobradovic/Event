<?php

class eventmodel extends CI_Model{

    function __construct() {
     parent::__construct();
     $this->load->database();
    }

    //Prikaz 6 aktivnih dogadjaja na pocetnoj strani
    function citaj_event_pocetna(){

        $this->db->select('*');
        $this->db->from('desavanje');
        $this->db->join('korisnik', 'korisnik.id_korisnik = desavanje.id_korisnik');
        $this->db->join('tip', 'desavanje.id_tip=tip.id_tip');
        $this->db->join('grad', 'desavanje.id_grad=grad.id_grad');

         $this->db->order_by('datum', 'desc');
        $this->db->limit(6);
        $this->db->where('status',1);

        $query = $this->db->get();

        return $query->result();


    }

    //Prikaz svih odobrenih dogadjaja

    function citajEvent(){

        $this->db->select('*');
        $this->db->from('desavanje');
        $this->db->join('korisnik', 'korisnik.id_korisnik = desavanje.id_korisnik');
        $this->db->join('tip', 'desavanje.id_tip=tip.id_tip');
        $this->db->join('grad', 'desavanje.id_grad=grad.id_grad');
        $this->db->where('status',1);


        $query = $this->db->get();

        return $query->result();
    }

    //Prikaz svih dogadjaja u admin panelu

    function citajEventAdmin(){

        $this->db->select('*');
        $this->db->from('desavanje');
        $this->db->join('korisnik', 'korisnik.id_korisnik = desavanje.id_korisnik');
        $this->db->join('tip', 'desavanje.id_tip=tip.id_tip');
        $this->db->join('grad', 'desavanje.id_grad=grad.id_grad');



        $query = $this->db->get();

        return $query->result();
    }

      //Prikaz jedog eventa

      function citajJedanEvent($id_desavanja){

        $this->db->select('*');
        $this->db->from('desavanje');
        $this->db->join('korisnik', 'korisnik.id_korisnik = desavanje.id_korisnik');
        $this->db->join('tip', 'desavanje.id_tip=tip.id_tip');
        $this->db->join('grad', 'desavanje.id_grad=grad.id_grad');

        $this->db->where('id_desavanje',$id_desavanja);

        $query = $this->db->get();

        return $query->result();
    }

  //prikaz filtriranog grada

    function vratiGrad($idGrad){
        $this->db->where('id_grad', $idGrad);
        $query=$this->db->get('grad');
        return $query->result();
    }

    //Brisi event
    function obrisi_event($id){
        $this->db->where('id_desavanje', $id);
        $this->db->delete('desavanje');
    }

      //Novi event
    function unesi_event($data)
    {
        $this->db->insert('desavanje',$data);
        return $this->db->insert_id();
    }

    //Prikaz svih gradova

    function vrati_gradove(){
        $query=$this->db->get('grad');
        return $query->result();
    }

    //Brisanje grada

    function obrisi_grad($id){
        $this->db->where('id_grad', $id);
        $this->db->delete('grad');
    }

    //Unos grada

    function unesi_grad($data){
      $this->db->insert('grad',$data);
      return $this->db->insert_id();
    }

    //prikaz tipova

    function vrati_tipove(){
        $query=$this->db->get('tip');
        return $query->result();
    }

    //brisanje tipova

    function obrisi_tip($id){
        $this->db->where('id_tip', $id);
        $this->db->delete('tip');
    }

    //unos novog tipa

    function unesi_tip($data)
    {
        $this->db->insert('tip',$data);
        return $this->db->insert_id();
    }



    //Prikaz filtriranih eventova po gradu i tipu

    function filter($grad, $tip){
        $this->db->select('*');
        $this->db->from('desavanje');
        $this->db->join('korisnik', 'korisnik.id_korisnik = desavanje.id_korisnik');
        $this->db->join('tip', 'desavanje.id_tip=tip.id_tip');
        $this->db->join('grad', 'desavanje.id_grad=grad.id_grad');
        $this->db->where('grad.id_grad', $grad);
        $this->db->where('tip.id_tip', $tip);

        $query = $this->db->get();

        return $query->result();

   }

   //Kupovina karte

   function kupovina_karata($id_desavanje, $id_kor){
    $this->db->query("UPDATE `desavanje` SET `broj_karata` = broj_karata-1 WHERE `id_desavanje` = $id_desavanje");
    $this->db->query("INSERT INTO desavanje_korisnik VALUES ($id_desavanje, $id_kor)");


   }

   //Prikaz eventa za koju je korisnik kupio kartu

   function moj_event(){
     $this->db->select('*');
     $this->db->from('korisnik');
     $this->db->join('desavanje_korisnik', 'korisnik.id_korisnik = desavanje_korisnik.id_korisnik');
     $this->db->join('desavanje', 'desavanje_korisnik.id_desavanje = desavanje.id_desavanje');
     $this->db->where('korisnik.id_korisnik', $this->session->userdata('id_kor'));


     $query = $this->db->get();

     return $query->result();
   }

   function demand_unesi($data){
     $this->db->insert('demand',$data);
     return $this->db->insert_id();
   }

   function demand_prikaz(){
     $query=$this->db->get('demand');
     return $query->result();
   }

   function demand_obrisi($id){
     $this->db->where('id_demand', $id);
     $this->db->delete('demand');
   }

   function objavi_event($id){
       $this->db->set('status', 1);
       $this->db->where('id_desavanje', $id);
       $this->db->update('desavanje');
   }

   function ugasi_event($id){
       $this->db->set('status', 0);
       $this->db->where('id_desavanje', $id);
       $this->db->update('desavanje');
   }

    }
