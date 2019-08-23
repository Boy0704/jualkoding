<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index() {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_ordodev');
		}

		 	 $data['web'] 	= $this->Mcrud->get_web_id(1);
		 	 $data['judul']	= 'Aplikasi | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
       $data['app'] 	= $this->Mcrud->get_kat();
			 $this->load->view('admin/header', $data);
			 $this->load->view('admin/kategori/index', $data);
			 $this->load->view('admin/footer', $data);

			 if (isset($_POST['btnsave'])) {
				 	 $kat	= htmlentities(strip_tags($this->input->post('kat')));
						 $data = array(
							 'kat' => $kat,
						 );
						 $this->Mcrud->save_kat($data);
						 $this->session->set_flashdata('msg',
							'
							<div class="alert alert-success">
									<button class="close" data-dismiss="alert">×</button>
									<strong>Sukses!</strong> Kategori berhasil ditambahkan.
							</div>'
						);
					redirect('kategori#tabel');
			 }
  }


	public function edit($id='') {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_ordodev');
		}
		if ($id == '') {
			redirect('aplikasi');
		}
				$data['web'] 							= $this->Mcrud->get_web_id(1);
				$data['judul']						= 'Aplikasi | '.$data['web']->nama_web;
   			$data['jml_member'] 		  = $this->Mcrud->get_user_by_level()->num_rows();
   			$data['jml_app'] 			    = $this->Mcrud->get_app()->num_rows();
   			$data['jml_app_view']	    = $this->Mcrud->get_app_view()->row();
   			$data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
				$data['app'] 							= $this->Mcrud->get_kat_by_id($id)->row();

				$this->load->view('admin/header', $data);
				$this->load->view('admin/kategori/edit', $data);
				$this->load->view('admin/footer', $data);


				if (isset($_POST['btnsave'])) {
						$kat = htmlentities(strip_tags($this->input->post('kat')));

 					 			 $data = array(
									 'kat' => $kat,
								 );
								 $this->Mcrud->update_kat(array('id_kat' => $id), $data);
		 						 $this->session->set_flashdata('msg',
		 							'
		 							<div class="alert alert-success">
		 									<button class="close" data-dismiss="alert">×</button>
		 									<strong>Sukses!</strong> Kategori berhasil diupdate.
		 							</div>'
		 						);
								redirect('kategori#tabel');
			   }
	}


	public function hapus($id='') {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_ordodev');
		}
		if ($id == '') {
			redirect('kategori');
		}
			$this->Mcrud->delete_kat_by_id($id);
			$this->session->set_flashdata('msg',
			 '
			 <div class="alert alert-success">
					 <button class="close" data-dismiss="alert">×</button>
					 <strong>Sukses!</strong> Kategori berhasil dihapus.
			 </div>'
		 );
		 redirect('kategori#tabel');
	}

}
