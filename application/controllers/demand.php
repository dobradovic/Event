<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demand extends CI_Controller {


	//Korisnik unosi demandovan event

	public function demandevent()
	{

              $this->load->model('menimodel','meni');
              $this->load->model('eventmodel','em');
              $podaci['meni']=$this->meni->ucitajMeniPocetna();
              $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
              $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();


         		$podaci['session']=$this->session->all_userdata();


				         $podaci['naziv']=array(

				         'placeholder'=>"",
				         'class'=>'form-control',
				         'name'=>'tbNaziv'
				         );




				         $podaci['btnDemand']=array(
				         'name'=>'btnDemand',
				         'value'=>'Demand',
				         'type'=>'submit',
				         'class'=>'btn btn-default'
				         );

				         $podaci['formaAttr'] = array(
				         'name'=>'formaRegistracijan',
				         'method'=>'post',
				         'class'=>'form-horizontal'

				         );


				 				 //Dodavanje korisnika
				 				 $unesi=$this->input->post('btnDemand');
				 				 if($unesi!=''){

				 				 $this->form_validation->set_rules('tbNaziv','Name of event','required');


				 					$this->form_validation->set_message('required','Field %s is required!');


				 				if($this->form_validation->run()){

				 				 $config['allowed_types'] = 'gif|jpg|png';
				 				 $config['max_size']	= '6900';
				 				 $config['upload_path'] = './images/korisnici/';
				 				 $config['max_width']  = '6024';
				 				 $config['max_height']  = '6768';
				 				 $putanja='images/';
				 				 $this->load->library('upload', $config);
				 				 if (!$this->upload->do_upload('fKorSlika')){
				 				 $error = array('error' => $this->upload->display_errors());
				 				 foreach($error as $err){
				 					 echo $err;
				 				 }
				 				 }
				 				 else{
				 						 $data=array('upload_data'=>$this->upload->data());

				 						$this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
				 								$data=array(
				 										 'demand_naziv'=>$this->input->post('tbNaziv'),
				 										 'demand_slika'=>$putanja.$data['upload_data']['file_name'],
				 										 'demand_slika_thumb'=>'images/'.$data['upload_data']['raw_name']
				 										 .'_thumb'.$data['upload_data']['file_ext']

				 								 );


				 								 $this->em->demand_unesi($data);
				 								 $this->session->set_flashdata('uspesno', '<div class="alert alert-success" role="alert">Well done, event has been demanded.</div>');
				 								 redirect('demand/demandevent');
				 							 }


				 }
				 $this->form_validation->set_message('required','Polje %s je obavezno!');


				 }
				                $podaci['session']=$this->session->all_userdata();
				 								$this->load->view('header',$podaci);
				                 $this->load->view('demand_event', $podaci);
				                 $this->load->view('footer');

        }



								 	public function resize($path, $file){
								 										 $config['image_library']='gd2';
								 										 $config['source_image']=$path;
								 										 $config['create_thumb']=TRUE;
								 										 $config['quality']="100%";
								 										 $config['width']=300;
								 										 $config['height']=200;
								 										 $config['new_image']='./images/'.$file;
								 										 $config['overwrite'] = TRUE;

								 										 $this->load->library('image_lib', $config);
								 										 $this->image_lib->resize();
				}

				//Prikaz svih demandovanih eventa

				public function svi_demandovi(){

					$this->load->model('menimodel','meni');
					$this->load->model('eventmodel','em');
					$podaci['meni']=$this->meni->ucitajMeniPocetna();
					$podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
					$podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();

					$podaci['demended']=$this->em->demand_prikaz();
					$podaci['session']=$this->session->all_userdata();

					$this->load->view('header',$podaci);
					 $this->load->view('prikaz_demands', $podaci);
					 $this->load->view('footer');
				}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
