<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class apevents extends CI_Controller {


	public function event()
	{
						$this->load->model('eventmodel', 'em' );

						$events=$this->em->citajEventAdmin();
						$this->load->library('table');

						$this->table->set_heading('Name', 'Author', 'Tickets', 'Date','Picture','About','Type','Town','User', 'Publish', 'Delete');
						foreach($events as $event){
							if($event->status!=1){
								 $objava=anchor('admin/apevents/objaviEvent/'.$event->id_desavanje, "<i class='fa fa-file-o fa-2x'></i>");
							}
							else{
									$objava=anchor('admin/apevents/ugasiEvent/'.$event->id_desavanje, "<i class='fa fa-file fa-2x'></i>");
							}

								$del=anchor('admin/apevents/obrisiEvent/'.$event->id_desavanje, "<i class='fa fa-times fa-2x'></i>");
								$this->table->add_row($event->naziv, $event->izvodjac, $event->broj_karata, $event->datum, img($event->slika_thumb),$event->opis,$event->tip,$event->grad,$event->ime, $objava, $del);
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


            $this->load->model('eventmodel','em');

             $podaci['naziv']=array(
                'value'=>'',
                'placeholder'=>"Event name",
                'class'=>'form-control',
                'name'=>'tbNaziv'
                );

                 $podaci['izvodjac']=array(
                'value'=>'',
                'placeholder'=>"Author",
                'class'=>'form-control',
                'name'=>'tbIzvodjac',

                );

                  $podaci['broj_karata']=array(
                'value'=>'',
                'placeholder'=>"Number of tickets",
                'class'=>'form-control',
                'name'=>'tbBrojKarata',

                );

                $podaci['datum']=array(
                'value'=>'',
                'placeholder'=>"Date",
                'class'=>'form-control',
                'name'=>'tbDatum',
                 'type'=>'date'

                );


                $podaci['opis']=array(
                'value'=>'',
                'placeholder'=>"About",
                'class'=>'form-control',
                'name'=>'tbOpis',

                );

                $podaci['grad']=array(
                'value'=>'',
                'placeholder'=>"Town:",
                'class'=>'form-control',
                'name'=>'ddlGrad',

                );

                $podaci['ddlTip']=array(
                'value'=>'',
                'placeholder'=>"Type of event:",
                'class'=>'form-control',
                'name'=>'ddlTip',

                );



                $podaci['btnUnesi']=array(
                'name'=>'btnUnesi',
                'value'=>'Post your event',
                'type'=>'submit',
                'class'=>'btn btn-default'
                );

                $podaci['formaAttr'] = array(
                'name'=>'formaEvent',
                'method'=>'post',
                'class'=>'form-horizontal'

                );

                $dodaj=$this->input->post('btnUnesi');

                 //Unos novog dogadjaja
                if($dodaj!=''){


                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']	= '900';
                $config['upload_path'] = './images/';
                $config['max_width']  = '3000';
                $config['max_height']  = '3338';
                $putanja='images/';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('fSlika')){
                $error = array('error' => $this->upload->display_errors());
                foreach($error as $err){
                  echo $err;
                }
                }
                else{
                   $data=array('upload_data'=>$this->upload->data());

                    $this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);

                $event=array(
                            'naziv'=>$this->input->post('tbNaziv'),
                            'izvodjac'=>$this->input->post('tbIzvodjac'),
                            'broj_karata'=>$this->input->post('tbBrojKarata'),
                            'datum'=> $this->input->post('tbDatum'),
                            'opis'=>$this->input->post('tbOpis'),
                            'slika'=>$putanja.$data['upload_data']['file_name'],
                            'slika_thumb'=>'images/thumb/'.$data['upload_data']['raw_name']
                            .'_thumb'.$data['upload_data']['file_ext'],
                            'id_grad'=>$this->input->post('ddlGrad'),
                            'id_tip'=>$this->input->post('ddlTip'),
                            'id_korisnik'=>$this->session->userdata('id_kor'),
                        );
                        $this->em->unesi_event($event);
                }
                	redirect('admin/apevents/event', REFRESH);

              }


                $podaci['gradovi']=$this->em->vrati_gradove();
                $podaci['tipovi']=$this->em->vrati_tipove();


            $this->load->view('admin/apHeader');
            $this->load->view('admin/events', $podaci);
            $this->load->view('admin/apFooter');
	}


	//Brisanje eventa
	public function obrisiEvent($id){
			$this->load->model('eventmodel', 'em');
			$this->em->obrisi_event($id);
			redirect('admin/apevents/event');
	}

	//Objava eventa

	public function objaviEvent($id){

			$this->load->model('eventmodel', 'em');
			$this->em->objavi_event($id);
			redirect('admin/apevents/event', REFRESH);
	}

	public function ugasiEvent($id){

			$this->load->model('eventmodel', 'em');
			$this->em->ugasi_event($id);
			redirect('admin/apevents/event', REFRESH);
	}


  public function resize($path, $file){
                     $config['image_library']='gd2';
                     $config['source_image']=$path;
                     $config['create_thumb']=TRUE;
                     $config['quality']="100%";
                     $config['width']=70;
                     $config['height']=75;
                     $config['new_image']='./images/thumb/'.$file;
                     $config['overwrite'] = TRUE;

                     $this->load->library('image_lib', $config);
                     $this->image_lib->resize();


                 }




}
