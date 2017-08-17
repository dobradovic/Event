<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class apdemand extends CI_Controller {


	public function admin_demand()
	{
						$this->load->model('eventmodel', 'em' );

						$events=$this->em->demand_prikaz();
						$this->load->library('table');

						$this->table->set_heading('Name of demanded event', 'Picture','Delete');
						foreach($events as $event){


								$del=anchor('admin/apdemand/obrisiDemand/'.$event->id_demand, "<i class='fa fa-times fa-2x'></i>");
								$this->table->add_row($event->demand_naziv, img($event->demand_slika_thumb), $del);
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


            $this->load->view('admin/apHeader');
            $this->load->view('admin/demand', $podaci);
            $this->load->view('admin/apFooter');
	}

	public function obrisiDemand($id){
		$this->load->model('eventmodel','em');
		$this->em->demand_obrisi($id);
		redirect('admin/apdemand/admin_demand', REFRESH);
	}


}
