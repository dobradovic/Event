<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Strane extends CI_Controller {


	public function registracija()
	{

                $this->load->model('menimodel','meni');
                $podaci['meni']=$this->meni->ucitajMeniPocetna();
                $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
                $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();

                $this->load->model('korisnicimodel', 'km');

        //forma za registracija

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



        $podaci['registruj']=array(
        'name'=>'btnRegister',
        'value'=>'Register',
        'type'=>'submit',
        'class'=>'btn btn-default'
        );

        $podaci['formaAttr'] = array(
        'name'=>'formaRegistracijan',
        'method'=>'post',
        'class'=>'form-horizontal'

        );


				 //Dodavanje korisnika
				 $unesi=$this->input->post('btnRegister');
				 if($unesi!=''){

				 $this->form_validation->set_rules('tbIme','Username','required');
					$this->form_validation->set_rules('tbLozinka','Password','required');
					$this->form_validation->set_rules('tbEmail','Email','required|valid_email');

					$this->form_validation->set_message('required','Field %s is required!');


				if($this->form_validation->run()){

				 $config['allowed_types'] = 'gif|jpg|png';
				 $config['max_size']	= '6900';
				 $config['upload_path'] = './images/korisnici/';
				 $config['max_width']  = '6024';
				 $config['max_height']  = '6768';
				 $putanja='images/korisnici/';
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
								$korisnik=array(
										 'ime'=>$this->input->post('tbIme'),
										 'email'=>$this->input->post('tbEmail'),
										 'lozinka'=>$this->input->post('tbLozinka'),
										 'avatar'=>$putanja.$data['upload_data']['file_name'],
										 'slikaa'=>'images/korisnici/'.$data['upload_data']['raw_name']
										 .'_thumb'.$data['upload_data']['file_ext'],
										 'id_uloga'=>'2'
								 );


								 $this->km->unesi_korisnika($korisnik);
								 $this->session->set_flashdata('uspesno', '<div class="alert alert-success" role="alert">Well done, you can login now.</div>');
								 redirect('strane/registracija');
							 }


}
$this->form_validation->set_message('required','Polje %s je obavezno!');


}
                $podaci['session']=$this->session->all_userdata();
								$this->load->view('header',$podaci);
                $this->load->view('registracija', $podaci);
                $this->load->view('footer');
	}







	public function resize($path, $file){
										 $config['image_library']='gd2';
										 $config['source_image']=$path;
										 $config['create_thumb']=TRUE;
										 $config['quality']="100%";
										 $config['width']=85;
										 $config['height']=80;
										 $config['new_image']='./images/korisnici/'.$file;
										 $config['overwrite'] = TRUE;

										 $this->load->library('image_lib', $config);
										 $this->image_lib->resize();


								 }


        public function autor(){
                $this->load->model('menimodel','meni');
                $podaci['meni']=$this->meni->ucitajMeniPocetna();
                $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
                $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();


                $podaci['session']=$this->session->all_userdata();
                $this->load->view('header',$podaci);
                $this->load->view('autor',$podaci);
                $this->load->view('footer');
        }

         public function kontakt(){
                $this->load->model('menimodel','meni');
                $this->load->model('korisnicimodel','km');
                $podaci['meni']=$this->meni->ucitajMeniPocetna();
                $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
                $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();

        $podaci['ime']=array(
        'value'=>'',
        'placeholder'=>"Username",
        'class'=>'form-control',
        'name'=>'tbIme'
        );

         $podaci['email']=array(
        'value'=>'',
        'placeholder'=>"Email",
        'class'=>'form-control',
        'name'=>'tbEmail',

        );
        $podaci['poruka']=array(
        'value'=>'',
        'placeholder'=>"Message",
        'class'=>'form-control',
        'name'=>'taPoruka',
        'type'=>'textarea'
        );
        $podaci['kontakt']=array(
        'name'=>'btnKontakt',
        'value'=>'Send message',
        'type'=>'submit',
        'content'=>'Send message',
        'class'=>'btn btn-default'
        );

        $podaci['formaAttr'] = array(
        'name'=>'formaKontakt',
        'method'=>'post',
        'class'=>'form-horizontal'

        );

        $dugme=$this->input->post('btnKontakt');
               if($dugme){

                 $this->form_validation->set_rules('tbIme','Username','required');

                 $this->form_validation->set_rules('tbEmail','Email','required|valid_email');
                 $this->form_validation->set_rules('taPoruka','Message','required');
                 $this->form_validation->set_message('required','Field %s is required!');


               if($this->form_validation->run()){

               $data = array(
            'ime' => $this->input->post('tbIme'),
            'email' => $this->input->post('tbEmail'),
            'poruka' =>   $this->input->post('taPoruka'),
            );
               $this->km->unosKontakt($data);
                 $this->session->set_flashdata('uspesno', '<div class="alert alert-success" role="alert">Your message was sent successfully!</div>');


                redirect('strane/kontakt');

                }
                $this->form_validation->set_message('required','Polje %s je obavezno!');
            }

                $podaci['session']=$this->session->all_userdata();

		$this->load->view('header',$podaci);
                $this->load->view('kontakt',$podaci);
                $this->load->view('footer');
        }




        }




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
