<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class apgrad extends CI_Controller{


  function gradovi()
  {
    $this->load->model('eventmodel', 'em' );

    $gradovi=$this->em->vrati_gradove();
    $this->load->library('table');

    $this->table->set_heading('Town', 'Delete');
    foreach($gradovi as $g){

        $del=anchor('admin/apgrad/obrisiGrad/'.$g->id_grad, "<i class='fa fa-times fa-2x'></i>");
        $this->table->add_row($g->grad, $del);
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

                                    'grad'=>$this->input->post('tbNaziv')


                                );
      $this->em->unesi_grad($data);

redirect('admin/apgrad/gradovi', REFRESH);
    }


    $this->load->view('admin/apHeader');
    $this->load->view('admin/gradovi', $podaci);
    $this->load->view('admin/apFooter');
}

//Brisanje menija
public function obrisiGrad($id){
$this->load->model('eventmodel', 'em');
$this->em->obrisi_grad($id);
redirect('admin/apgrad/gradovi');
}


}
