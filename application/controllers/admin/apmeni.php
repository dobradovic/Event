<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class apmeni extends CI_Controller{


  function meni()
  {
    $this->load->model('menimodel', 'meni' );

    $meni=$this->meni->ucitajMeni();
    $this->load->library('table');

    $this->table->set_heading('Link', 'Name','Edit', 'Delete');
    foreach($meni as $m){
        $edit=anchor('admin/apmeni/izmeniMeni/'.$m->id_meni, "<i class='fa fa-pencil-square-o fa-2x'></i>");
        $del=anchor('admin/apmeni/obrisiMeni/'.$m->id_meni, "<i class='fa fa-times fa-2x'></i>");
        $this->table->add_row($m->putanja, $m->naziv, $edit, $del);
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


    $this->load->model('korisnicimodel', 'korisnik');

    $podaci['putanja']=array(

    'placeholder'=>"",
    'class'=>'form-control',
    'name'=>'tbPutanja'
    );
    $podaci['naziv']=array(

    'placeholder'=>"",
    'class'=>'form-control',
    'name'=>'tbNaziv',

    );


    $podaci['dodaj']=array(
    'name'=>'btnDodaj',
    'value'=>'Add menu',
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
                                    'putanja'=>$this->input->post('tbPutanja'),
                                    'naziv'=>$this->input->post('tbNaziv'),


                                );
      $this->meni->unesiMeni($data);

redirect('admin/apmeni/meni', REFRESH);
    }


    $this->load->view('admin/apHeader');
    $this->load->view('admin/menu', $podaci);
    $this->load->view('admin/apFooter');
}

//Brisanje menija
public function obrisiMeni($id){
$this->load->model('menimodel', 'meni');
$this->meni->obrisiMeni($id);
redirect('admin/apmeni/meni');
}

//Izmeni korisnika
public function izmeniMeni($id){
$this->load->model('menimodel', 'meni');

$podaci['putanja']=array(

'placeholder'=>"",
'class'=>'form-control',
'name'=>'tbPutanja'
);
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
'name'=>'formaRegistracijan',
'method'=>'post',
'class'=>'form-horizontal'

);

$promeni=$this->input->post('btnPromeni');
$podaci['id']=$id;
if($promeni!=''){
  $meni=array(
          'putanja'=>$this->input->post('tbPutanja'),
          'naziv'=>$this->input->post('tbNaziv'),
      );
  $this->meni->izmeniMeni($id, $meni);

  redirect('admin/apmeni/meni', REFRESH);
}


$this->load->view('admin/apHeader');
$this->load->view('admin/izmeniMeni',$podaci);
$this->load->view('admin/apFooter');


  }

}
