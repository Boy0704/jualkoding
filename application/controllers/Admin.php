<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		redirect('404');
	}

	public function panel_jualkoding()
	{
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
				$data['web'] 					= $this->Mcrud->get_web_id(1);
				$this->load->view('admin/login', $data);

				if (isset($_POST['btnlogin'])){
						 $username = htmlentities(strip_tags($_POST['username']));
						 $pass	   = htmlentities(strip_tags(md5($_POST['password'])));

						 $query  = $this->Mcrud->get_admin_by_un($username);
						 $cekun  = $query->row()->username;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg_login',
									 '
									 <div class="alert alert-danger">
											 <button class="close" data-dismiss="alert">×</button>
											 <strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg_login',
													 '
													 <div class="alert alert-warning">
															 <button class="close" data-dismiss="alert">×</button>
															 <strong>Username atau Password Salah!</strong>.
													 </div>'
												);
										 } else {
											 date_default_timezone_set('Asia/Jakarta');
											 $waktu	 = date('Y-m-d H:i:s');

																$this->session->set_userdata('un_admin', "$cekun");

																$data = array(
											 					 'waktu_login'		=> $waktu,
											 					 );
											 				 $this->Mcrud->update_user(array('username' => $cekun), $data);

															 $this->session->set_flashdata('msg_login',
			 													 '
																 <div class="alert alert-success">
											               <button class="close" data-dismiss="alert">×</button>
											               <strong>Selamat datang, '.ucwords($row->nama).'</strong>.
											           </div>'
			 												);
										 }
						 }

						 redirect('panel_jualkoding');
				}

		}else{
				$data['web'] 							= $this->Mcrud->get_web_id(1);
				$data['judul']						= 'Panel Admin | '.$data['web']->nama_web;
				$data['jml_member'] 			= $this->Mcrud->get_user_by_level()->num_rows();
	 		  $data['jml_app'] 					= $this->Mcrud->get_app()->num_rows();
	 		  $data['jml_app_view']			= $this->Mcrud->get_app_view()->row();
	 		  $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();

				$this->load->view('admin/header', $data);
				$this->load->view('admin/admin', $data);
				$this->load->view('admin/footer', $data);

				if (isset($_POST['btnsave'])) {
 				 	 $nama  			= htmlentities(strip_tags($this->input->post('nama')));
 					 $no_hp  			= htmlentities(strip_tags($this->input->post('no_hp')));
 					 $email  			= htmlentities(strip_tags($this->input->post('email')));
 					 $alamat  		= htmlentities(strip_tags($this->input->post('alamat')));
 					 $meta_description  		= htmlentities(strip_tags($this->input->post('meta_description')));
 					 $meta_keyword  		= htmlentities(strip_tags($this->input->post('meta_keyword')));
 					 $map  			  = htmlentities(strip_tags($this->input->post('map')));

					 date_default_timezone_set('Asia/Jakarta');
						$waktu	 = date('Y-m-d H:i:s');
						$tgl	 = date('Y-m-d');

						$file_size = 1024 * 2; // 2 MB
						$this->upload->initialize(array(
							"file_type"     => "image/jpeg",
							"upload_path"   => "./images",
							"allowed_types" => "jpg|jpeg|png|gif|bmp",
							"max_size" => "$file_size"
						));

						if ($_FILES['favicon']['error'] <> 4) {
 		 					 if ( ! $this->upload->do_upload('favicon'))
 		 					 {
 		 						 $error = $this->upload->display_errors();
 		 						 $this->session->set_flashdata('msg',
 		 							 '
 		 							 <div class="alert alert-warning">
 		 									<button class="close" data-dismiss="alert">×</button>
 		 									<strong>Gagal Upload!</strong> '.$error.'.
 		 							 </div>'
 		 						 );
 								 redirect('panel_jualkoding');
 		 					 }else{

 								 $cek = $this->Mcrud->get_web_id(1);

 					 				unlink("images/$cek->favicon");

 		 						 $filename = $_FILES['favicon']['name'];
 		 						 $gambar = preg_replace('/ /', '_', $filename);

										 $data = array(
				 							'nama_web'	=> $nama,
				 							'no_hp'			=> $no_hp,
				 							'email'			=> $email,
				 							'alamat'		=> $alamat,
				 							'meta_description'		=> $meta_description,
				 							'meta_keyword'		=> $meta_keyword,
				 							'map'	  		=> $map,
											'favicon'		=> $gambar,
				 							'tgl_diubah'=> $waktu
				 						);
				 						$this->Mcrud->update_web(array('id_web' => 1), $data);
				 						$this->session->set_flashdata('msg',
				 						 '
				 						 <div class="alert alert-success">
				 								 <button class="close" data-dismiss="alert">×</button>
				 								 <strong>Sukses!</strong> Web berhasil diupdate.
				 						 </div>'
				 					 );
 		 					}

 		 			 }else{

								 $data = array(
									 'nama_web'	=> $nama,
									 'no_hp'			=> $no_hp,
									 'email'			=> $email,
									 'alamat'		=> $alamat,
									 'meta_description'		=> $meta_description,
				 							'meta_keyword'		=> $meta_keyword,
									 'map'	  		=> $map,
									 'tgl_diubah'=> $waktu
								 );
								 $this->Mcrud->update_web(array('id_web' => 1), $data);
								 $this->session->set_flashdata('msg',
									'
									<div class="alert alert-success">
											<button class="close" data-dismiss="alert">×</button>
											<strong>Sukses!</strong> Web berhasil diupdate.
									</div>'
								);

 					 }

					 redirect('panel_jualkoding');
				}
		}
	}

	public function profile() {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('404_content');
		}

			$data['web'] 							= $this->Mcrud->get_web_id(1);
			$data['judul']						= 'Profile | '.$data['web']->nama_web;
			$data['jml_member'] 			= $this->Mcrud->get_user_by_level()->num_rows();
			$data['jml_app'] 					= $this->Mcrud->get_app()->num_rows();
			$data['jml_app_view']			= $this->Mcrud->get_app_view()->row();
			$data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
			$data['app'] 							= $this->Mcrud->get_app()->result();
			$data['profile'] 					= $this->Mcrud->get_user_by_un($ceks)->row();

			$this->load->view('admin/header', $data);
			$this->load->view('admin/profile', $data);
			$this->load->view('admin/footer', $data);

			if (isset($_POST['btnsave'])) {
				 $username  	= htmlentities(strip_tags($this->input->post('username')));
	 			 $password  	= htmlentities(strip_tags($this->input->post('password')));
				 $nama  			= htmlentities(strip_tags($this->input->post('nama')));
				 $no_hp  			= htmlentities(strip_tags($this->input->post('no_hp')));
				 $email  			= htmlentities(strip_tags($this->input->post('email')));

				 if ($password == "") {
					 	$pass = $data['profile']->password;
				 }else{
					 	$pass = md5($password);
				 }

				 if ($username == $ceks) {
						 $data = array(
							'password'	=> $pass,
							'nama'			=> $nama,
							'no_hp'			=> $no_hp,
							'email'	  	=> $email
						);
						$this->Mcrud->update_user(array('username' => $ceks), $data);
		 				 $this->session->set_flashdata('msg',
		 					'
		 					<div class="alert alert-success">
		 							<button class="close" data-dismiss="alert">×</button>
		 							<strong>Sukses!</strong> Profile berhasil diupdate.
		 					</div>'
		 				);
						redirect('profile');
				 }else{

						 $cek_userx = $this->Mcrud->get_user_by_un($username)->num_rows();
						 if ($cek_userx == 0) {
								 $data = array(
	  							'username'	=> $username,
	  							'password'	=> $pass,
	  							'nama'			=> $nama,
	  							'no_hp'			=> $no_hp,
	  							'email'	  	=> $email
	  						);
								$this->Mcrud->update_user(array('username' => $ceks), $data);
				 				 $this->session->set_flashdata('msg',
				 					'
				 					<div class="alert alert-success">
				 							<button class="close" data-dismiss="alert">×</button>
				 							<strong>Sukses!</strong> Profile berhasil diupdate.
				 					</div>'
				 				);
								$this->session->has_userdata('un_admin');
					      $this->session->set_userdata('un_admin', "$username");

								redirect('profile');
						 }else{
								 $this->session->set_flashdata('msg',
									'
									<div class="alert alert-warning">
											<button class="close" data-dismiss="alert">×</button>
											<strong>Gagal!</strong> Username "'.$username.'"sudah ada.
									</div>'
								);
								redirect('profile');
						 }

				 }


		 }
	}

	public function aplikasi() {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}

		 	 $data['web'] 					= $this->Mcrud->get_web_id(1);
		 	 $data['judul']					= 'Aplikasi | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
			 $data['app'] 					= $this->Mcrud->get_app()->result();

			 $cek_app = $this->db->query("SELECT * FROM tbl_app ORDER BY kode_app DESC LIMIT 1");
			 if ($cek_app->num_rows() == 0) {
			 		$kode_app = "AP001";
			 }else{
				 	$ambil_kode = $cek_app->row()->kode_app;
					$kode_angka = substr($ambil_kode, 2, 3) + 1;
					if ($kode_angka > "009") {
							$kode_app = "0".$kode_angka;
					}elseif ($kode_angka > "099") {
							$kode_angka = $kode_angka;
					}else{
							$kode_angka = "00".$kode_angka;
					}

					$kode_app = "PS".$kode_angka;
			 }
			 $data['kode_app'] 			= $kode_app;

			 $this->load->view('admin/header', $data);
			 $this->load->view('admin/aplikasi', $data);
			 $this->load->view('admin/footer', $data);

			 if (isset($_POST['btnsave'])) {
				 	 $kode  			= htmlentities(strip_tags($this->input->post('kode')));
					 $nama  			= htmlentities(strip_tags($this->input->post('nama')));
					 $id_kat  		= htmlentities(strip_tags($this->input->post('id_kat')));
					 $meta_description  	= htmlentities(strip_tags($this->input->post('meta_description')));
					 $meta_keyword  	= htmlentities(strip_tags($this->input->post('meta_keyword')));
					 $developer  	= htmlentities(strip_tags($this->input->post('developer')));
					 $harga  			= htmlentities(strip_tags($this->input->post('harga')));
					 $url  			  = htmlentities(strip_tags($this->input->post('url')));
					 $url_download = htmlentities(strip_tags($this->input->post('url_download')));
					 $url_demo 		= htmlentities(strip_tags($this->input->post('url_demo')));
					 $ket   	    = $_POST['ket'];

					 $app_kode = $this->Mcrud->get_app_by_kode($kode)->num_rows();
					 if ($app_kode != 0) {
							 $this->session->set_flashdata('msg',
								 '
								 <div class="alert alert-warning">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Gagal!</strong> Kode APP sudah ada.
								 </div>'
							 );
							 redirect('aplikasi');
					 }

					 date_default_timezone_set('Asia/Jakarta');
					 $waktu	 = date('Y-m-d H:i:s');
					 $tgl	 = date('Y-m-d');

					 $file_size = 1024 * 2; // 2 MB
					 $this->upload->initialize(array(
						 "file_type"     => "image/jpeg",
						 "upload_path"   => "./images/app",
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
					 }else{
						 $uploadx = $this->upload->data();
						 $filename = $uploadx['file_name'];
						 $gambar = preg_replace('/ /', '_', $filename);
						 $data = array(
							 'kode_app'			=> $kode,
							 'nama_app'			=> $nama,
							 'id_kat'				=> $id_kat,
							 'meta_description'		=> $meta_description,
							 'meta_keyword'		=> $meta_keyword,
							 'developer'		=> $developer,
							 'harga'				=> $harga,
							 'img'	  			=> $gambar,
							 'keterangan'		=> $ket,
							 'tanggal'			=> $tgl,
							 'url'					=> $url,
							 'url_download'	=> $url_download,
							 'url_demo'			=> $url_demo,
							 'view'					=> 0,
							 'download'			=> 0
						 );
						 $this->Mcrud->save_app($data);

						 $id_new = $this->db->insert_id();
						 $files = $_FILES;
						 $filename = array();
						 $cpt = count($_FILES['gambar_multi']['name']);
						 for($i=0; $i<$cpt; $i++){
							 $_FILES['gambar_multi']['name']     = $files['gambar_multi']['name'][$i];
							 $_FILES['gambar_multi']['type']     = $files['gambar_multi']['type'][$i];
							 $_FILES['gambar_multi']['tmp_name'] = $files['gambar_multi']['tmp_name'][$i];
							 $_FILES['gambar_multi']['error']    = $files['gambar_multi']['error'][$i];
							 $_FILES['gambar_multi']['size']     = $files['gambar_multi']['size'][$i];
							 if ($_FILES['gambar_multi']['error'] <> 4) {
									 $file_name = $_FILES['gambar_multi']['name'][$i];
									 $this->upload->initialize(array(
										 "file_type"     => "image/jpeg",
										 "upload_path"   => "./images/app_multi",
										 "allowed_types" => "jpg|jpeg|png|gif|bmp",
										 "max_size" => "$file_size",
										 "remove_spaces" => TRUE,
										 "encrypt_name" => TRUE,
									 ));
									 if ( $this->upload->do_upload("gambar_multi"))
									 {
												 $uploadData = $this->upload->data();
												 $filename = $uploadData['file_name'];
												 $foto_multi = preg_replace('/ /', '_', $filename);
												 $data2 = array(
													 'id_app' 			 => $id_new,
													 'img_file' 		 => $foto_multi,
													 'tgl_img_multi' => date('Y-m-d H:i:s')
												 );
												 $this->db->insert("tbl_img_multi",$data2);
									 }
							 }
						 }

						 $this->session->set_flashdata('msg',
							'
							<div class="alert alert-success">
									<button class="close" data-dismiss="alert">×</button>
									<strong>Sukses!</strong> Aplikasi berhasil ditambahkan.
							</div>'
						);

					}
					redirect('aplikasi#tabel');
			 }
  }


	public function edit_app($id) {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}
		if ($id == '') {
			redirect('aplikasi');
		}
				$data['web'] 							= $this->Mcrud->get_web_id(1);
				$data['judul']						= 'Aplikasi | '.$data['web']->nama_web;
				$data['jml_member'] 			= $this->Mcrud->get_user_by_level()->num_rows();
				$data['jml_app'] 					= $this->Mcrud->get_app()->num_rows();
				$data['jml_app_view']			= $this->Mcrud->get_app_view()->row();
				$data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
				$data['app'] 							= $this->Mcrud->get_app_by_id($id)->row();

				$this->load->view('admin/header', $data);
				$this->load->view('admin/aplikasi_edit', $data);
				$this->load->view('admin/footer', $data);


				if (isset($_POST['btnsave'])) {
						//$kode  			= htmlentities(strip_tags($this->input->post('kode')));
						$nama  				= htmlentities(strip_tags($this->input->post('nama')));
						$id_kat  			= htmlentities(strip_tags($this->input->post('id_kat')));
						$meta_description  	= htmlentities(strip_tags($this->input->post('meta_description')));
						$meta_keyword  	= htmlentities(strip_tags($this->input->post('meta_keyword')));
						$developer  	= htmlentities(strip_tags($this->input->post('developer')));
						$harga  			= htmlentities(strip_tags($this->input->post('harga')));
						$url  			  = htmlentities(strip_tags($this->input->post('url')));
						$url_download = htmlentities(strip_tags($this->input->post('url_download')));
 					  $url_demo 		= htmlentities(strip_tags($this->input->post('url_demo')));
						$ket   	    = $_POST['ket'];

 					 $file_size = 1024 * 2; // 2 MB
 					 $this->upload->initialize(array(
 						 "file_type"     => "image/jpeg",
 						 "upload_path"   => "./images/app",
 						 "allowed_types" => "jpg|jpeg|png|gif|bmp",
 						 "max_size" => "$file_size",
						 "remove_spaces" => TRUE,
						 "encrypt_name" => TRUE,
 					 ));

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
								 redirect('admin/edit_app/'.$id.'');
		 					 }else{

								 $cek = $this->Mcrud->get_app_by_id($id)->row();

					 				unlink("images/app/$cek->img");
									unlink("images/app/thumbnails/$cek->img");

									$uploadx = $this->upload->data();
 								 $filename = $uploadx['file_name'];
 								 $gambar = preg_replace('/ /', '_', $filename);

								 $data = array(
									 'nama_app'			=> $nama,
									 'id_kat'				=> $id_kat,
									 'meta_description'		=> $meta_description,
									 'meta_keyword'		=> $meta_keyword,
									 'developer'		=> $developer,
									 'harga'				=> $harga,
									 'img'	  			=> $gambar,
									 'keterangan'		=> $ket,
									 'url'					=> $url,
									 'url_download'	=> $url_download,
									 'url_demo'			=> $url_demo
								 );
								 $this->Mcrud->update_app(array('id_app' => $id), $data);
		 						 $this->session->set_flashdata('msg',
		 							'
		 							<div class="alert alert-success">
		 									<button class="close" data-dismiss="alert">×</button>
		 									<strong>Sukses!</strong> Aplikasi berhasil diupdate.
		 							</div>'
		 						);
								// redirect('aplikasi#tabel');
		 					}

		 			 }else{

							 $data = array(
								 'nama_app'			=> $nama,
								 'id_kat'				=> $id_kat,
								 'meta_description'		=> $meta_description,
								 'meta_keyword'		=> $meta_keyword,
								 'developer'		=> $developer,
								 'harga'				=> $harga,
								 'keterangan'		=> $ket,
								 'url'					=> $url,
								 'url_download'	=> $url_download,
								 'url_demo'			=> $url_demo
							 );
							 $this->Mcrud->update_app(array('id_app' => $id), $data);
							 $this->session->set_flashdata('msg',
								'
								<div class="alert alert-success">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Sukses!</strong> Aplikasi berhasil diupdate.
								</div>'
							);
							// redirect('aplikasi#tabel');
					 }

					 $id_new = $id;
					 $files = $_FILES;
					 $filename = array();
					 $cpt = count($_FILES['gambar_multi']['name']);
					 for($i=0; $i<$cpt; $i++){
						 $_FILES['gambar_multi']['name']     = $files['gambar_multi']['name'][$i];
						 $_FILES['gambar_multi']['type']     = $files['gambar_multi']['type'][$i];
						 $_FILES['gambar_multi']['tmp_name'] = $files['gambar_multi']['tmp_name'][$i];
						 $_FILES['gambar_multi']['error']    = $files['gambar_multi']['error'][$i];
						 $_FILES['gambar_multi']['size']     = $files['gambar_multi']['size'][$i];
						 if ($_FILES['gambar_multi']['error'] <> 4) {
								 $file_name = $_FILES['gambar_multi']['name'][$i];
								 $this->upload->initialize(array(
									 "file_type"     => "image/jpeg",
									 "upload_path"   => "./images/app_multi",
									 "allowed_types" => "jpg|jpeg|png|gif|bmp",
									 "max_size" => "$file_size",
									 "remove_spaces" => TRUE,
									 "encrypt_name" => TRUE,
								 ));
								 if ( $this->upload->do_upload("gambar_multi"))
								 {
											 $uploadData = $this->upload->data();
											 $filename = $uploadData['file_name'];
											 $foto_multi = preg_replace('/ /', '_', $filename);
											 $data2 = array(
												 'id_app' 			 => $id_new,
												 'img_file' 		 => $foto_multi,
												 'tgl_img_multi' => date('Y-m-d H:i:s')
											 );
											 $this->db->insert("tbl_img_multi",$data2);
								 }
						 }
					 }
					 redirect('aplikasi#tabel');

			}
	}


	public function hapus_app($id) {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}
		if ($id == '') {
			redirect('aplikasi');
		}
		$where=array('id_app'=>$id);
		$cek_multi = $this->db->get_where("tbl_img_multi",$where);
		foreach ($cek_multi->result() as $key => $value) {
			unlink("images/app_multi/$value->img_file");
		}
		$this->db->delete("tbl_img_multi",$where);
			$cek = $this->Mcrud->get_app_by_id($id)->row();

			unlink("images/app/$cek->img");
			unlink("images/app/thumbnails/$cek->img");
			$this->Mcrud->delete_app_by_id($id);
			$this->session->set_flashdata('msg',
			 '
			 <div class="alert alert-success">
					 <button class="close" data-dismiss="alert">×</button>
					 <strong>Sukses!</strong> Aplikasi berhasil dihapus.
			 </div>'
		 );
		 redirect('aplikasi#tabel');
	}

	public function hapus_app1($id) {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}
		if ($id == '') {
			redirect('aplikasi');
		}
		$where=array('id_img_multi'=>$id);
		$cek_multi = $this->db->get_where("tbl_img_multi",$where);
		unlink("images/app_multi/".$cek_multi->row()->img_file);
		$id_app = $cek_multi->row()->id_app;
		$this->db->delete("tbl_img_multi",$where);
			$this->session->set_flashdata('msg',
			 '
			 <div class="alert alert-success">
					 <button class="close" data-dismiss="alert">×</button>
					 <strong>Sukses!</strong> 1 Gambar Multi berhasil dihapus.
			 </div>'
		 );
		 redirect('admin/edit_app/'.$id_app);
	}


	public function member($id='', $bln_thn='') {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}

		if ($id == '' or $id == 'tgl') {
			if ($bln_thn == '') {
  			$bln = date('m');
  			$thn = date('Y');
  			$bln_thn = date('Y').'-'.date('m');
  		}else {
  			$bln = substr($bln_thn, 0, 2);
  			$thn = substr($bln_thn, 2, 4);
  			$bln_thn = "$thn-$bln";
  		}
			 $data['web'] 					= $this->Mcrud->get_web_id(1);
			 $data['judul']					= 'Data Member | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
			 $data['member'] 				= $this->Mcrud->get_user_by_level($bln_thn)->result();
			 $data['bln'] 					= $bln;
			 $data['thn'] 					= $thn;

			 $this->load->view('admin/header', $data);
			 $this->load->view('admin/member', $data);
			 $this->load->view('admin/footer', $data);

		}else{

			$cek_user = $this->Mcrud->get_user_by_un($id)->row();
			if ($cek_user->download == "yes") {
					$status = "no";
			}else{
					$status = "yes";
			}

			$data = array(
				'download'		=> $status,
				);
			$this->Mcrud->update_user(array('username' => $id), $data);
			$this->session->set_flashdata('msg',
				'
				<div class="alert alert-success">
						<button class="close" data-dismiss="alert">×</button>
						<strong>Sukses!</strong> Username '.$id.' diperbarui.
				</div>'
			);
			redirect('data_member');

		}

	}


	public function transaksi($aksi='',$bln_thn='') {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}
		if ($bln_thn == '') {
			$bln = date('m');
			$thn = date('Y');
			$bln_thn = date('Y').'-'.date('m');
		}else {
			$bln = substr($bln_thn, 0, 2);
			$thn = substr($bln_thn, 2, 4);
			$bln_thn = "$thn-$bln";
		}
		 $data['bln'] 					= $bln;
		 $data['thn'] 					= $thn;

		 	 $data['web'] 					= $this->Mcrud->get_web_id(1);
		 	 $data['judul']					= 'Data Transaksi | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
			 $data['transaksi'] 		= $this->Mcrud->get_transaksi($bln_thn)->result();
			 $data['user']					= $this->Mcrud->get_user_by_level()->result();

			 $this->load->view('admin/header', $data);
			 $this->load->view('admin/transaksi', $data);
			 $this->load->view('admin/footer', $data);

			 if (isset($_POST['btnsave'])) {
				 	 $id_user			= htmlentities(strip_tags($this->input->post('id_user')));
					 $bank  			= htmlentities(strip_tags($this->input->post('bank')));
					 $jumlah   	  = htmlentities(strip_tags($this->input->post('jumlah')));

					 date_default_timezone_set('Asia/Jakarta');
					 $waktu	 = date('Y-m-d');

					  $data = array(
							 'id_user'				=> $id_user,
							 'bank'						=> $bank,
							 'jumlah'					=> $jumlah,
							 'tgl_transaksi'	=> $waktu
						 );
						 $this->Mcrud->save_transaksi($data);
						 $this->session->set_flashdata('msg',
							'
							<div class="alert alert-success">
									<button class="close" data-dismiss="alert">×</button>
									<strong>Sukses!</strong> Transaksi berhasil ditambahkan.
							</div>'
						);

					redirect('transaksi#tabel');
			 }
  }

	public function hapus_transaksi($id) {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}
		if ($id == '') {
			redirect('transaksi');
		}

			$this->Mcrud->delete_transaksi_by_id($id);
			$this->session->set_flashdata('msg',
			 '
			 <div class="alert alert-success">
					 <button class="close" data-dismiss="alert">×</button>
					 <strong>Sukses!</strong> Transaksi berhasil dihapus.
			 </div>'
		 );
		 redirect('transaksi#tabel');
	}

	public function article() {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}

		 	 $data['web'] 					= $this->Mcrud->get_web_id(1);
		 	 $data['judul']					= 'Data Article | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
			 $data['article'] 			= $this->Mcrud->get_article()->result();

			 $this->load->view('admin/header', $data);
			 $this->load->view('admin/article', $data);
			 $this->load->view('admin/footer', $data);

			 if (isset($_POST['btnsave'])) {
				 	 $judul			= htmlentities(strip_tags($this->input->post('judul')));
					 $url  			= htmlentities(strip_tags($this->input->post('url')));
					 $isi   	  = $_POST['isi'];

					 date_default_timezone_set('Asia/Jakarta');
					 $waktu	 = date('Y-m-d H:i:s');

					 $file_size = 1024 * 2; // 2 MB
					 $this->upload->initialize(array(
						 "file_type"     => "image/jpeg",
						 "upload_path"   => "./images/article",
						 "allowed_types" => "jpg|jpeg|png|gif|bmp",
						 "max_size" => "$file_size"
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
					 }else{

						 /* kita buat thumbnailnya */
						 $conf['image_library'] = 'gd2';
						 $conf['source_image'] = 'images/article/'.$_FILES['gambar']['name'];
						 $conf['new_image'] = 'images/article/thumbnails/'.$_FILES['gambar']['name'];
						 // $conf['create_thumb'] = TRUE;
						 $conf['create'] = TRUE;
						 $conf['maintain_ratio'] = FALSE;
						 $conf['width'] = 300;
						 $conf['height'] = 300;

						 $this->load->library('image_lib', $conf);
						 $this->image_lib->initialize($conf);
						 $this->image_lib->resize();

						 $filename = $_FILES['gambar']['name'];
						 $gambar = preg_replace('/ /', '_', $filename);

						 $data = array(
							 'gambar'				=> $gambar,
							 'judul'				=> $judul,
							 'url'					=> $url,
							 'isi'					=> $isi,
							 'tgl_article'	=> $waktu,
							 'dibaca'				=> 0
						 );
						 $this->Mcrud->save_article($data);
						 $this->session->set_flashdata('msg',
							'
							<div class="alert alert-success">
									<button class="close" data-dismiss="alert">×</button>
									<strong>Sukses!</strong> Article berhasil ditambahkan.
							</div>'
						);

					}
					redirect('data_article#tabel');
			 }
  }

	public function edit_article($id) {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}
		if ($id == '') {
			redirect('data_article');
		}
				$data['web'] 					= $this->Mcrud->get_web_id(1);
				$data['judul']					= 'Data Article | '.$data['web']->nama_web;
				$data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
				$data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
				$data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
				$data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
				$data['article'] 			= $this->Mcrud->get_article_by_id($id)->row();

				$this->load->view('admin/header', $data);
				$this->load->view('admin/article_edit', $data);
				$this->load->view('admin/footer', $data);


				if (isset($_POST['btnsave'])) {
 				 	 $judul			= htmlentities(strip_tags($this->input->post('judul')));
 					 $url  			= htmlentities(strip_tags($this->input->post('url')));
 					 $isi   	  = $_POST['isi'];

 					 $file_size = 1024 * 2; // 2 MB
 					 $this->upload->initialize(array(
 						 "file_type"     => "image/jpeg",
 						 "upload_path"   => "./images/article",
 						 "allowed_types" => "jpg|jpeg|png|gif|bmp",
 						 "max_size" => "$file_size"
 					 ));

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
								 redirect('admin/edit_article/'.$id.'');
		 					 }else{

								 $cek = $this->Mcrud->get_article_by_id($id)->row();

					 				unlink("images/article/$cek->gambar");
									unlink("images/article/thumbnails/$cek->gambar");

									/* kita buat thumbnailnya */
									$conf['image_library'] = 'gd2';
									$conf['source_image'] = 'images/article/'.$_FILES['gambar']['name'];
									$conf['new_image'] = 'images/article/thumbnails/'.$_FILES['gambar']['name'];
									// $conf['create_thumb'] = TRUE;
									$conf['create'] = TRUE;
									$conf['maintain_ratio'] = FALSE;
									$conf['width'] = 300;
									$conf['height'] = 300;

									$this->load->library('image_lib', $conf);
			 						$this->image_lib->initialize($conf);
			 						$this->image_lib->resize();

		 						 $filename = $_FILES['gambar']['name'];
		 						 $gambar = preg_replace('/ /', '_', $filename);

		 						 $data = array(
		 							 'gambar'				=> $gambar,
		 							 'judul'				=> $judul,
		 							 'url'					=> $url,
		 							 'isi'					=> $isi
		 						 );
								 $this->Mcrud->update_article(array('id_article' => $id), $data);
		 						 $this->session->set_flashdata('msg',
		 							'
		 							<div class="alert alert-success">
		 									<button class="close" data-dismiss="alert">×</button>
		 									<strong>Sukses!</strong> Article berhasil diupdate.
		 							</div>'
		 						);
								redirect('data_article#tabel');
		 					}

		 			 }else{

							 $data = array(
								 'judul'				=> $judul,
								 'url'					=> $url,
								 'isi'					=> $isi
							 );
							 $this->Mcrud->update_article(array('id_article' => $id), $data);
							 $this->session->set_flashdata('msg',
								'
								<div class="alert alert-success">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Sukses!</strong> Article berhasil diupdate.
								</div>'
							);
							redirect('data_article#tabel');
					 }


			}
	}

	public function hapus_article($id) {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}
		if ($id == '') {
			redirect('data_article');
		}
			$cek = $this->Mcrud->get_article_by_id($id)->row();

			unlink("images/article/$cek->gambar");
			unlink("images/article/thumbnails/$cek->gambar");
			$this->Mcrud->delete_article_by_id($id);
			$this->session->set_flashdata('msg',
			 '
			 <div class="alert alert-success">
					 <button class="close" data-dismiss="alert">×</button>
					 <strong>Sukses!</strong> Article berhasil dihapus.
			 </div>'
		 );
		 redirect('data_article#tabel');
	}

	public function kontak() {
		$ceks = $this->session->userdata('un_admin');
		if (!isset($ceks)) {
			redirect('panel_jualkoding');
		}

		 	 $data['web'] 					= $this->Mcrud->get_web_id(1);
		 	 $data['judul']					= 'Data Member | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
			 $data['kontak'] 				= $this->Mcrud->get_kontak()->result();

			 $this->load->view('admin/header', $data);
			 $this->load->view('admin/kontak', $data);
			 $this->load->view('admin/footer', $data);
  }

	public function logout() {
     if ($this->session->has_userdata('un_admin')) {
         $this->session->sess_destroy();
         redirect('panel_jualkoding');
     }
     redirect('panel_jualkoding');
  }
}
