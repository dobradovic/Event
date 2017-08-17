<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class aptip extends CI_Controller{


  function tipovi()
  {
    $this->load->model('eventmodel', 'em' );

    $tipovi=$this->em->vrati_tipove();
    $this->load->library('table');

    $this->table->set_heading('Type', 'Delete');
    foreach($tipovi as $t){

        $del=anchor('admin/aptip/obrisiTip/'.$t->id_tip, "<i class='fa fa-times fa-2x'></i>");
        $this->table->add_row($t->tip, $del);
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
    'value'=>'Add city',
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

                                    'tip'=>$this->input->post('tbNaziv')


                                );
      $this->em->unesi_tip($data);

redirect('admin/aptip/tipovi', REFRESH);
    }


    $this->load->view('admin/apHeader');
    $this->load->view('admin/tipovi', $podaci);
    $this->load->view('admin/apFooter');
}

//Brisanje tipa
public function obrisiTip($id){
$this->load->model('eventmodel', 'em');
$this->em->obrisi_tip($id);
redirect('admin/aptip/tipovi');
}


}
