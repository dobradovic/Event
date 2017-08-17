<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class apuloge extends CI_Controller{


  function uloge()
  {
    $this->load->model('korisnicimodel', 'km' );

    $uloge=$this->km->uloge();
    $this->load->library('table');

    $this->table->set_heading('Role name','Edit', 'Delete');
    foreach($uloge as $u){
        $edit=anchor('admin/apuloge/izmeniUlogu/'.$u->id_uloga, "<i class='fa fa-pencil-square-o fa-2x'></i>");
        $del=anchor('admin/apuloge/obrisiUlogu/'.$u->id_uloga, "<i class='fa fa-times fa-2x'></i>");
        $this->table->add_row($u->naziv, $edit, $del);
    }

    //Izgled tagova
    $tmpl = array (
            'table_open'          => '<table class="table table-bordered table-hover">',

            'heading_row_start'   => '<tr>',
            'heading_row_end'     => '</tr>',
            'heading_cell_start'  => '<th>',
            'heading_cell_end'    => '</th>',

            'row_start'           => '<tr>',
            'row_end'             => '</tr>',
            'cell_start'          => '<td>',
            'cell_end'            => '</td>',

            'row_alt_start'       => '<tr>',
            'row_alt_end'         => '</tr>',
            'cell_alt_start'      => '<td>',
            'cell_alt_end'        => '</td>',

            'table_close'         => '</table>'
      );
    $this->table->set_template($tmpl);

    $podaci['tabela']=$this->table->generate();




    $podaci['naziv']=array(

    'placeholder'=>"",
    'class'=>'form-control',
    'name'=>'tbNaziv'
    );


    $podaci['dodaj']=array(
    'name'=>'btnDodaj',
    'value'=>'Add role',
    'type'=>'submit',
    'class'=>'btn btn-default'
    );

    $podaci['formaAttr'] = array(
    'name'=>'formaDodajKorisnika',
    'method'=>'post',
    'class'=>'form-horizontal'

    );

    $dodaj=$this->input->post('btnDodaj');
    if($dodaj!=''){

                        $data=array(

                                    'naziv'=>$this->input->post('tbNaziv')


                                );
      $this->km->unosUloge($data);

redirect('admin/apuloge/uloge', REFRESH);
    }


    $this->load->view('admin/apHeader');
    $this->load->view('admin/uloge', $podaci);
    $this->load->view('admin/apFooter');
}

//Brisanje menija
public function obrisiUlogu($id){
$this->load->model('korisnicimodel', 'km');
$this->km->obrisi_ulogu($id);
redirect('admin/apuloge/uloge');
}

//Izmeni korisnika
public function izmeniUlogu($id){
$this->load->model('korisnicimodel', 'km');


$podaci['naziv']=array(

'placeholder'=>"",
'class'=>'form-control',
'name'=>'tbNaziv',

);


$podaci['promeni']=array(
'name'=>'btnPromeni',
'value'=>'Change',
'type'=>'submit',
'class'=>'btn btn-default'
);

$podaci['formaAttr'] = array(
'name'=>'formaUloga',
'method'=>'post',
'class'=>'form-horizontal'

);

$promeni=$this->input->post('btnPromeni');
$podaci['id']=$id;
if($promeni!=''){
  $uloga=array(

          'naziv'=>$this->input->post('tbNaziv')
      );
  $this->km->izmeni_ulogu($id, $uloga);

  redirect('admin/apuloge/uloge', REFRESH);
}


$this->load->view('admin/apHeader');
$this->load->view('admin/izmeniUlogu',$podaci);
$this->load->view('admin/apFooter');


  }

}
