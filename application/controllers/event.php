<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {


	public function index()
	{
                 //Meni
                $this->load->model('menimodel','meni');
                $this->load->model('eventmodel','em');
                $podaci['meni']=$this->meni->ucitajMeniPocetna();
                $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
                $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();

        //Login forma

        $podaci['username']=array(
        'value'=>'',
        'placeholder'=>"Username",
        'class'=>'form-control',
        'name'=>'username'
        );
        $podaci['password']=array(
        'value'=>'',
        'placeholder'=>"Password",
        'class'=>'form-control',
        'name'=>'password',
        'type'=>'password'
        );
        $podaci['dugme']=array(
        'name'=>'login',
        'value'=>'Login',
        'type'=>'submit',
        'content'=>'Sign in',
        'class'=>'btn btn-default'
        );

        $podaci['formaAttr'] = array(
        'name'=>'formaLogin',
        'method'=>'post',
        'class'=>'navbar-form navbar-right'

        );




         //Logovanje
        $username=  $this->input->post('username');
        $password=  $this->input->post('password');

        $this->load->model('loginmodel','lm');
        $rezultat= $this->lm->login($username,$password);



        $dugme=  $this->input->post('login');

        if($dugme!=''){

        if($rezultat['broj_redova']==1){
        $sesija=array(
        'korisnik'=>$rezultat['logovanje_redovi'][0]['ime'],
        'uloga'=>$rezultat['logovanje_redovi'][0]['naziv'],
				'email'=>$rezultat['logovanje_redovi'][0]['email'],
        'id_kor'=>$rezultat['logovanje_redovi'][0]['id_korisnik'],
				'avatarkorisnik'=>$rezultat['logovanje_redovi'][0]['slikaa'],
            'isLoggedIn'=>true
        );
        $this->session->set_userdata($sesija);

         redirect('event/index');
        }

        else{

        redirect(base_url());
        }
        }

         $podaci['session']=$this->session->all_userdata();

         $podaci['desavanja']=$this->em->citaj_event_pocetna();


        $this->load->view('header', $podaci);
        $this->load->view('main', $podaci);
        $this->load->view('footer', $podaci);
        }


        //Logout

         public function logout(){
        $this->session->sess_destroy();
        redirect('event/index');
        }

        //Citaj jedan event - details



				// Prikaz eventova za koje je korisnik kupio kartu
				public function moj_event(){
					$this->load->model('menimodel','meni');
									 $this->load->model('eventmodel','em');
									 $podaci['meni']=$this->meni->ucitajMeniPocetna();
									 $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
									 $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();

									 $moj_event=$this->em->moj_event();

									 $this->load->library('table');

									 $this->table->set_heading('Picture', 'Name of event', 'Date');
									 foreach($moj_event as $em){

									 $this->table->add_row(img($em->slika_thumb),$em->naziv, $em->datum);
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


					 $podaci['session']=$this->session->all_userdata();
					$this->load->view('header', $podaci);
					$this->load->view('moj_event', $podaci);
					$this->load->view('footer', $podaci);
				}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
