<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desavanje extends CI_Controller {


    //Prikaz zeljenog eventa
     public function Event($id_desavanje){
                $this->load->model('menimodel','meni');
                $podaci['meni']=$this->meni->ucitajMeniPocetna();
                $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
                $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();

                 $this->load->model('eventmodel','em');

                $podaci['desavanja']=$this->em->citajJedanEvent($id_desavanje);

                $podaci['session']=$this->session->all_userdata();

                $this->load->view('header',$podaci);
                $this->load->view('event',$podaci);
                $this->load->view('footer');

}

    //Korisnik unosi svoj novi event

     public function Dogadjaji(){
                $this->load->model('menimodel','meni');
                $podaci['meni']=$this->meni->ucitajMeniPocetna();
                $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
                $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();
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

                    $unesi=$this->input->post('btnUnesi');

                     //Unos novog dogadjaja
                    if($unesi!=''){


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
                    }}


                    $podaci['gradovi']=$this->em->vrati_gradove();
                    $podaci['tipovi']=$this->em->vrati_tipove();


        $podaci['session']=$this->session->all_userdata();

                $this->load->model('eventmodel','em');
                $this->load->view('header',$podaci);
                $this->load->view('novi_event',$podaci);
                $this->load->view('footer');
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

                //Prikaz svih eventova

     public function svi_dogadjaji(){

                $this->load->model('menimodel','meni');
                $this->load->model('eventmodel','em');
                $podaci['meni']=$this->meni->ucitajMeniPocetna();
                $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
                $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();


                //model vadi gradove
                $podaci['gradovi']=$this->em->vrati_gradove();
                //model vadi tipove
                $podaci['tipovi']=$this->em->vrati_tipove();



                $podaci['session']=$this->session->all_userdata();
                $podaci['desavanja']=$this->em->citajEvent();


                $this->load->view('header', $podaci);
                $this->load->view('svi_dogadjaji', $podaci);
                $this->load->view('footer', $podaci);
     }


     // Citanje filtriranih eventova

     public function filter(){

                $this->load->model('menimodel','meni');
                $this->load->model('eventmodel','em');
                $podaci['meni']=$this->meni->ucitajMeniPocetna();
                $podaci['meniAdmin']=$this->meni->ucitajMeniAdmin();
                $podaci['meniKorisnik']=$this->meni->ucitajMeniKorisnik();






                 $klik=$this->input->post('btnFilter');

                 if($klik!='')
                 {

              $idGrad=$this->input->post('ddlGrad');
              $idTip=$this->input->post('ddlTip');

              $f=$this->em->filter($idGrad, $idTip);
                }
              $podaci['desavanjaFilter']=$f;

                $podaci['session']=$this->session->all_userdata();
                $podaci['desavanja']=$this->em->citajEvent();


                $this->load->view('header', $podaci);
                $this->load->view('filter', $podaci);
                $this->load->view('footer', $podaci);
     }

     //Korisnik kupuje kartu

     public function kupi_kartu($idevent, $id_kor)
     {
         $this->load->model('eventmodel','em');
         $this->em->kupovina_karata($idevent, $id_kor);

         redirect('event/moj_event');


     }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
