<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class appocetna extends CI_Controller {


	public function adminpanel()
	{
						$this->load->model('korisnicimodel', 'km' );

						$korisnici=$this->km->svi_korisnici()->result();
						$this->load->library('table');

						$this->table->set_heading('Firstname', 'Password', 'Email', 'User role', 'Edit', 'Delete');
						foreach($korisnici as $korisnik){
								$edit=anchor('admin/appocetna/izmeniKorisnika/'.$korisnik->id_korisnik, "<i class='fa fa-pencil-square-o fa-2x'></i>");
								$del=anchor('admin/appocetna/obrisiKorisnika/'.$korisnik->id_korisnik, "<i class='fa fa-times fa-2x'></i>");
								$this->table->add_row($korisnik->ime, $korisnik->lozinka, $korisnik->email, $korisnik->naziv, $edit, $del);
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

						$podaci['username']=array(

						'placeholder'=>"Username",
						'class'=>'form-control',
						'name'=>'tbIme'
						);
						$podaci['password']=array(

						'placeholder'=>"Password",
						'class'=>'form-control',
						'name'=>'tbLozinka',

						);
						 $podaci['email']=array(

						'placeholder'=>"Email",
						'class'=>'form-control',
						'name'=>'tbEmail',

						);


						$podaci['ddlUloge']=array(
						'value'=>'',
						'placeholder'=>"Type of event:",
						'class'=>'form-control',
						'name'=>'ddlUloge',

						);


						$podaci['dodaj']=array(
						'name'=>'btnDodaj',
						'value'=>'Add user',
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
						                                'ime'=>$this->input->post('tbIme'),
						                                'lozinka'=>$this->input->post('tbLozinka'),
						                                'email'=>$this->input->post('tbEmail'),
						                                'id_uloga'=> $this->input->post('ddlUloge'),

						                            );
							$this->km->unesi_korisnika($data);

	redirect('admin/appocetna/adminpanel', REFRESH);
						}
							$podaci['uloge']=$this->korisnik->uloge();

            $this->load->view('admin/apHeader');
            $this->load->view('admin/apMain', $podaci);
            $this->load->view('admin/apFooter');
	}

	//Brisanje korisnika
	public function obrisiKorisnika($id){
			$this->load->model('korisnicimodel', 'korisnici');
			$this->korisnici->obrisi_korisnika($id);
			redirect('admin/appocetna/adminpanel');
	}

	//Izmeni korisnika
	public function izmeniKorisnika($id){
			$this->load->model('korisnicimodel', 'korisnik');

			$podaci['username']=array(

			'placeholder'=>"Username",
			'class'=>'form-control',
			'name'=>'tbIme'
			);
			$podaci['password']=array(

			'placeholder'=>"Password",
			'class'=>'form-control',
			'name'=>'tbLozinka',

			);
			 $podaci['email']=array(

			'placeholder'=>"Email",
			'class'=>'form-control',
			'name'=>'tbEmail',

			);


			$podaci['ddlUloge']=array(
			'value'=>'',
			'placeholder'=>"Type of event:",
			'class'=>'form-control',
			'name'=>'ddlUloge',

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
					$korisnik=array(
									'ime'=>$this->input->post('tbIme'),
									'lozinka'=>$this->input->post('tbLozinka'),
									'email'=>$this->input->post('tbEmail'),
									'id_uloga'=>$this->input->post('ddlUloge')
							);
					$this->korisnik->izmeni_korisnika($id, $korisnik);

					redirect('admin/appocetna/adminpanel', REFRESH);
			}
			$podaci['uloge']=$this->korisnik->uloge();

			$this->load->view('admin/apHeader');
			$this->load->view('admin/izmeniKorisnika',$podaci);
			$this->load->view('admin/apFooter');

	}


}
