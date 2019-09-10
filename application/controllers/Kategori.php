<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index() {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('404');
		}

		 	 $data['web'] 	= $this->Mcrud->get_web_id(1);
		 	 $data['judul']	= 'Kategori Aplikasi | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
       $data['app'] 	= $this->Mcrud->get_kat();
			 $this->load->view('admin/header', $data);
			 $this->load->view('admin/kategori/index', $data);
			 $this->load->view('admin/footer', $data);

			 if (isset($_POST['btnsave'])) {
				 $file_size = 1024 * 2; // 2 MB
				 $this->upload->initialize(array(
					 "file_type"     => "image/jpeg",
					 "upload_path"   => "./images/kategori",
					 "allowed_types" => "jpg|jpeg|png|gif|bmp",
					 "max_size" => "$file_size",
					 "remove_spaces" => TRUE,
					 "encrypt_name" => TRUE,
				 ));

				 if ( ! $this->upload->do_upload('gambar'))
				 {
					 $error = $this->upload->display_errors();
					 $this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-warning">
								<button class="close" data-dismiss="alert">×</button>
								<strong>Gagal Upload!</strong> '.$error.'.
						 </div>'
					 );
					 redirect('kategori');
				 }else{
					 $upload_data = $this->upload->data();
					 $filename = $upload_data['file_name'];

					 $config_thumb = array(
						 'image_library' => 'gd2',
						 'source_image'  => './images/kategori/'.$filename,
						 'new_image'  	 => './images/kategori/thumb/'.$filename,
						 'create_thumb'  => TRUE,
						 'maintain_ratio'=> TRUE,
						 'thumb_marker'  => '',
						 'width' 				 => 248,
						 'height' 			 => 200,
					 );
					 $this->load->library('image_lib', $config_thumb);
					 $this->image_lib->resize();

				 	 $kat	= htmlentities(strip_tags($this->input->post('kat')));
						 $data = array(
							 'kat' => $kat,
							 'gambar' => $filename
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
  }


	public function edit($id='') {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('404');
		}
		if ($id == '') {
			redirect('aplikasi');
		}
				$data['web'] 							= $this->Mcrud->get_web_id(1);
				$data['judul']						= 'Kategori Aplikasi | '.$data['web']->nama_web;
   			$data['jml_member'] 		  = $this->Mcrud->get_user_by_level()->num_rows();
   			$data['jml_app'] 			    = $this->Mcrud->get_app()->num_rows();
   			$data['jml_app_view']	    = $this->Mcrud->get_app_view()->row();
   			$data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
				$data['app'] 							= $this->Mcrud->get_kat_by_id($id)->row();

				$this->load->view('admin/header', $data);
				$this->load->view('admin/kategori/edit', $data);
				$this->load->view('admin/footer', $data);


				if (isset($_POST['btnsave'])) {
				 $file_size = 1024 * 2; // 2 MB
 				 $this->upload->initialize(array(
 					 "file_type"     => "image/jpeg",
 					 "upload_path"   => "./images/kategori",
 					 "allowed_types" => "jpg|jpeg|png|gif|bmp",
 					 "max_size" => "$file_size",
 					 "remove_spaces" => TRUE,
 					 "encrypt_name" => TRUE,
 				 ));

				$simpan='ya';
				if ($_FILES['gambar']['error'] <> 4) {
 				 if ( ! $this->upload->do_upload('gambar'))
 				 {
 					 $error = $this->upload->display_errors();
 					 $this->session->set_flashdata('msg',
 						 '
 						 <div class="alert alert-warning">
 								<button class="close" data-dismiss="alert">×</button>
 								<strong>Gagal Upload!</strong> '.$error.'.
 						 </div>'
 					 );
					 redirect('kategori/edit/'.$id);
 				 }else{
					 unlink("images/kategori/thumb/".$data['app']->gambar);
					 unlink("images/kategori/".$data['app']->gambar);

 					 $upload_data = $this->upload->data();
 					 $filename = $upload_data['file_name'];
				 }
			 }else {
				 $filename=$data['app']->gambar;
			 }

				 if ($simpan=='ya') {
					 $config_thumb = array(
 						'image_library' => 'gd2',
 						'source_image'  => './images/kategori/'.$filename,
 						'new_image'  	  => './images/kategori/thumb/'.$filename,
 						'create_thumb'  => TRUE,
 						'maintain_ratio'=> TRUE,
 						'thumb_marker'  => '',
 						'width' 				=> 248,
 						'height' 			  => 200,
 					);
 					$this->load->library('image_lib', $config_thumb);
 					$this->image_lib->resize();

 					 $kat = htmlentities(strip_tags($this->input->post('kat')));

 								$data = array(
 									'kat' => $kat,
 									'gambar' => $filename
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
	}


	public function hapus($id='') {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('404');
		}
		if ($id == '') {
			redirect('kategori');
		}
		$cek_kat = $this->Mcrud->get_kat_by_id($id)->row();
		unlink("images/kategori/thumb/".$cek_kat->gambar);
		unlink("images/kategori/".$cek_kat->gambar);

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


	public function p($url='',$d='')
	{
		$ceks = $this->session->userdata('ordodev@2017');

		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= 'Kategori | '.$data['web']->nama_web;

		if ($url=='') {
			$data['breadcrumb'] = '<li class="breadcrumb-item active" aria-current="page">Semua Kategori</li>';

			$this->db->order_by('kat','kat');
			$data['v_kat'] = $this->db->get('tbl_kat');
			$p = 'kategori/index';
		}else {
			$nama_kat = $this->db->get_where('tbl_kat', array('id_kat'=>$url))->row()->kat;
			$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="kategori/p.html">Semua Kategori</a></li>';
			$data['breadcrumb'] .= '<li class="breadcrumb-item active" aria-current="page">'.ucwords($nama_kat).'</li>';

			$this->db->where('id_kat',$url);
			$jml = $this->db->get('tbl_app');
			if ($jml->num_rows()==0) {
				// redirect('kategori/p');
			}
			$config['base_url'] = base_url().'kategori/p/'.$url.'/';

			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 20; /*Jumlah data yang dipanggil perhalaman*/
			$config['uri_segment'] = 4; /*data selanjutnya di parse diurisegmen 2*/

			/*Class bootstrap pagination yang digunakan*/
			$config['full_tag_open'] = "<div class='center'><ul class='pagination'>";
			$config['full_tag_close'] ="</ul></div>";
			$config['num_tag_open'] = '';
			$config['num_tag_close'] = '';
			$config['cur_tag_open'] = "<a class='disabled active'>";
			$config['cur_tag_close'] = "</a>";
			$config['next_tag_open'] = "";
			$config['next_tagl_close'] = "";
			$config['prev_tag_open'] = "";
			$config['prev_tagl_close'] = "";
			$config['first_tag_open'] = "";
			$config['first_tagl_close'] = "";
			$config['last_tag_open'] = "";
			$config['last_tagl_close'] = "";

			$this->pagination->initialize($config);

			$data['offset'] = $d;
			$data['v_data'] = $this->Mcrud->view_app($config['per_page'], $d, '', $url);
			$data['halaman']  = $this->pagination->create_links();
			$data['path'] = "d";
			$p = 'download';
		}

			$this->load->view('header', $data);
			$this->load->view($p, $data);
			$this->load->view('footer', $data);
	}

}
