<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Web extends CI_Controller {

	public function index($offset=0)
	{
		$this->page();
	}

	public function page($offset=0)
	{
		$ceks = $this->session->userdata('un_member');

		$data['web'] 					= $this->Mcrud->get_web_id(1);
		$data['judul']				= $this->Mcrud->get_web('nama_web').' : Situs Gudang Download Source Code Aplikasi Terlengkap dan Termurah Tersedia juga private belajar pemrograman';

		$this->db->join('tbl_kat','tbl_kat.id_kat=tbl_app.id_kat');
		$jml = $this->db->get('tbl_app');
		$config['base_url'] = base_url().'web/page';

		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 12; /*Jumlah data yang dipanggil perhalaman*/
		$config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 2*/

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

		$data['offset'] = $offset;
		$data['v_data'] = $this->Mcrud->view_app($config['per_page'], $offset);
		$data['halaman']  = $this->pagination->create_links();

			$this->load->view('header', $data);
			$this->load->view('web', $data);
			$this->load->view('footer', $data);
	}

	public function panduan()
	{
		$ceks = $this->session->userdata('un_member');

		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= 'Panduan | '.$data['web']->nama_web;
			$this->load->view('header', $data);
			$this->load->view('panduan', $data);
			$this->load->view('footer', $data);
	}

	public function registrasi()
	{
		$ceks = $this->session->userdata('un_member');
		if (isset($ceks)) {
			redirect('');
		}
		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= 'Registrasi | '.$data['web']->nama_web;
		$data['jml_member'] 	= $this->Mcrud->get_user_by_level()->num_rows();
		$data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			$this->load->view('header', $data);
			$this->load->view('registrasi', $data);
			$this->load->view('footer', $data);

			if (isset($_POST['reg'])) {
					$email  			= htmlentities(strip_tags($this->input->post('email')));
					$username 		= htmlentities(strip_tags($this->input->post('username')));
					$no_hp  			= htmlentities(strip_tags($this->input->post('no_hp')));
					$password			= htmlentities(strip_tags($this->input->post('password')));
					$password2		= htmlentities(strip_tags($this->input->post('password2')));

					date_default_timezone_set('Asia/Jakarta');
					$tgl = date('Y-m-d H:i:s');

					if ($password != $password2) {
							$this->session->set_flashdata('msg',
								'
								<div class="alert alert-block">
										<strong>Gagal!</strong> Password tidak cocok.
								</div>'
							);
					}else{
							$cek_email  = $this->Mcrud->get_user_by_email($email)->num_rows();
							$cek_un     = $this->Mcrud->get_user_by_email($username)->num_rows();
							if ($cek_email != 0) {
									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-block">
												<strong>Gagal!</strong> Email <b>"'.$email.'"</b> sudah ada.
										</div>'
									);
							}else{
									if ($cek_un != 0) {
											$this->session->set_flashdata('msg',
												'
												<div class="alert alert-block">
														<strong>Gagal!</strong> Username <b>"'.$username.'"</b> sudah ada.
												</div>'
											);
									}else{
												$this->Mcrud->sent_mail($username,$email,'reg');

												if ($this->email->send()){

														$data = array(
															'username'				=> $username,
															'email' 					=> $email,
															'password' 				=> md5($password),
															'nama'						=> $username,
															'no_hp'						=> $no_hp,
															'level'						=> 'member',
															'tgl_daftar'			=> $tgl,
															'aktif'						=> 'no',
															'download'				=> 'no',
														);
														$this->Mcrud->save_user($data);

														$this->session->set_flashdata('msg',
															'
															<div class="alert alert-success">
																	<strong>Sukses!</strong> Silahkan cek email Anda untuk Aktivasi akun anda agar bisa download semua file ini.
															</div>'
														);
														$this->session->set_userdata('un_member', "$username");
														if ($this->db->get_where('tbl_user', "username='$username'")->row()->aktif == 'no') {
															redirect('panduan');
														}else {
															redirect('');
														}
												}else{
													$this->session->set_flashdata('msg',
														'
														<div class="alert alert-error">
																<strong>Error!</strong> Gagal Kirim ke email, silahkan cek internet anda atau hubungi kami [<a href="hubungi">klik disini</a>].
														</div>'
													);
												}
									}
							}
					}

					redirect('registrasi');

			}
	}

	public function verify($id='',$email='',$kirim='') {
		date_default_timezone_set('Asia/Jakarta');
		$tgl	 = date('Y-m-d');

     if ($kirim == '') {
			 $cek_id = md5("$email * $tgl");
			 if ($id == $cek_id) {
				 $data = array(
					 'aktif'		=> 'yes',
					 );
				 $this->Mcrud->update_user(array('email' => $email), $data);
				 $this->session->set_flashdata('msg',
					 '
					 <div class="alert alert-success">
							 <strong>Sukses!</strong> Silahkan login.
					 </div>'
				 );
			 }else{

				 $this->session->set_flashdata('msg',
					 '
					 <div class="alert alert-block">
							 <strong>Gagal!</strong> Aktivasi kadaluarsa. <a href="web/verify/'.$cek_id.'/'.$email.'/kirim" class="btn btn-default"><span class="glyphicon glyphicon-envelope"></span> Kirim Ulang!</a>
					 </div>'
				 );
			 }
     }else{
			 $this->Mcrud->sent_mail($email,$email,'reg');
			 $this->email->send();

			 $this->session->set_flashdata('msg',
				 '
				 <div class="alert alert-success">
							<strong>Sukses!</strong> Silahkan cek email Anda untuk Aktivasi akun untuk download semua aplikasi .
				 </div>'
			 );
		 }

		 redirect('');
  }


	public function download($url='', $d='')
	{
		$ceks = $this->session->userdata('un_member');

		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= 'Download | '.$data['web']->nama_web;
											$this->db->order_by('id_app', 'DESC');
		$data['app'] 		= $this->Mcrud->get_app()->result();

		if($url=='' || $url== 'page'){
			$this->db->join('tbl_kat','tbl_kat.id_kat=tbl_app.id_kat');
			$jml = $this->db->get('tbl_app');
			$config['base_url'] = base_url().'download/page';

			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 15; /*Jumlah data yang dipanggil perhalaman*/
			$config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 2*/

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
			$data['v_data'] = $this->Mcrud->view_app($config['per_page'], $d);
			$data['halaman']  = $this->pagination->create_links();

			$data['path'] = "d";
				$this->load->view('header', $data);
				$this->load->view('download', $data);
				$this->load->view('footer', $data);
		}else{
				$download 	= $this->Mcrud->get_app_by_id($url)->row();
				$akun 			= $this->Mcrud->get_user_by_un($ceks)->row();
				if (!isset($ceks)) {
						redirect('registrasi');
				}

				if ($download->url_download == '') {
						$this->session->set_flashdata('msg_download',
						 '
						 <div class="alert alert-danger" style="background-color:red;">
									<strong>404!</strong> Link Download tidak ditemukan.
						 </div>'
					 );
				}elseif ($akun->download == "no") {
							$this->session->set_flashdata('msg_download',
							 '
							 <div class="alert alert-danger" style="background-color:danger;">
									 <strong> Maaf, Akun Anda '.$ceks.' PENDING SILAHKAN AKTIFKAN DI <a href="panduan">SINI</a> AKUN ANDA INFO  082377168756</strong>.
						   </div>'
						 );
						 redirect('panduan');
				}elseif ($akun->download == "yes"){
						$data = array(
							'download'				=> $download->download+1
						);
						$this->Mcrud->update_app(array('id_app' => $url), $data);

						redirect('web/ambil/'.$url);
				}

				if ($d == '') {
					// redirect('download');
					redirect('login');
				}else{
					redirect('d/'.$download->url.'');
				}
		}

			//force_download('images/logo.png', null);
	}


	public function aplikasi($url='', $d='')
	{
		$ceks = $this->session->userdata('un_member');

		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= 'Aplikasi | '.$data['web']->nama_web;
											$this->db->order_by('id_app', 'DESC');
		$data['app'] 		= $this->Mcrud->get_app()->result();

		$this->db->join('tbl_kat','tbl_kat.id_kat=tbl_app.id_kat');
		$jml = $this->db->get('tbl_app');
			$config['base_url'] = base_url().'app/page';

			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 15; /*Jumlah data yang dipanggil perhalaman*/
			$config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 2*/

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
			$data['v_data'] = $this->Mcrud->view_app($config['per_page'], $d, 'RANDOM');
			$data['halaman']  = $this->pagination->create_links();
			$data['path'] = "app_d";
				$this->load->view('header', $data);
				$this->load->view('download', $data);
				$this->load->view('footer', $data);

	}

	function ambil($url){

		$ceks = $this->session->userdata('un_member');
		if($ceks){
				$download 	= $this->Mcrud->get_app_by_id($url)->row();

$data = array(
							'download'				=> $download->download+1
						);
						$this->Mcrud->update_app(array('id_app' => $url), $data);
			$data['url'] = $download->url_download;
			$this->load->view('header', $data);
			$this->load->view('ambil', $data);
			$this->load->view('footer', $data);
		}else{
			redirect('login');
		}
	}

	public function d($url='')
	{
		$ceks = $this->session->userdata('un_member');
		if ($url == '') {
			redirect('');
		}
		$data['download'] = $this->Mcrud->get_app_url($url)->row();
		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= $data['download']->nama_app.' | '.$data['web']->nama_web;
		$data['jml_member'] 	= $this->Mcrud->get_user_by_level()->num_rows();
		$data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
		$data['app'] 		= $this->Mcrud->get_app()->result();

			$this->load->view('header', $data);
			$this->load->view('download_detail', $data);
			$this->load->view('footer', $data);

		if ($data['download'] == "") {
			redirect('error_not_found');
		}
			$data = array(
				'view'				=> $data['download']->view+1
			);
			$this->Mcrud->update_app(array('url' => $url), $data);

	}

	public function judul_ta()
	{
		$ceks = $this->session->userdata('un_member');

		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= 'Judul TA | '.$data['web']->nama_web;
			$this->load->view('header', $data);
			$this->load->view('judul_ta', $data);
			$this->load->view('footer', $data);
	}

	public function pesan()
	{
		$ceks = $this->session->userdata('un_member');

		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= 'Hubungi | '.$data['web']->nama_web;
			$this->load->view('header', $data);
			$this->load->view('hubungi', $data);
			$this->load->view('footer', $data);

					$this->session->set_flashdata('msg',
	 				 '
	 				 <div class="alert alert-info">
	 							<strong>Pesan!</strong> Untuk pemesanan silahkan hubungi kami.
	 				 </div>'
	 			 );
				 redirect('hubungi');

	}


	public function article($offset=0)
	{

		$ceks = $this->session->userdata('un_member');

		//$offset = strtolower($this->uri->segment(2));

				$data['web'] 		= $this->Mcrud->get_web_id(1);
				$data['judul']	= 'Article | '.$data['web']->nama_web;
				$data['jml_member'] 	= $this->Mcrud->get_user_by_level()->num_rows();
				$data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
				//$data['article'] 			= $this->Mcrud->get_article()->result();

				$jml = $this->db->get('tbl_article');

				   $config['base_url'] = base_url().'article';

				   $config['total_rows'] = $jml->num_rows();
				   $config['per_page'] = 4; /*Jumlah data yang dipanggil perhalaman*/
				   $config['uri_segment'] = 2; /*data selanjutnya di parse diurisegmen 3*/

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

				   $data['halaman'] = $this->pagination->create_links();
				   /*membuat variable halaman untuk dipanggil di view nantinya*/
				   $data['offset'] = $offset;
					 										$this->db->order_by('id_article', 'DESC');
				   $data['v_data'] = $this->Mcrud->view_article($config['per_page'], $offset);

					$this->load->view('header', $data);
					$this->load->view('article', $data);
					$this->load->view('footer', $data);

	}

	public function article_detail($url='')
	{
		$ceks = $this->session->userdata('un_member');
		if ($url == '') {
			redirect('article');
		}else{
			$data['web'] 		= $this->Mcrud->get_web_id(1);
			$data['jml_member'] 	= $this->Mcrud->get_user_by_level()->num_rows();
			$data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			$data['article'] 			= $this->Mcrud->get_article_by_url($url)->row();
			$data['judul']				= ucwords($data['article']->judul).' | '.$data['web']->nama_web;

				$this->load->view('header', $data);
				$this->load->view('article_detail', $data);
				$this->load->view('footer', $data);

				if ($data['article'] == "") {
					redirect('error_not_found');
				}

				$dibaca = $data['article']->dibaca;
				$data = array(
					'dibaca'				=> $dibaca+1
				);
				$this->Mcrud->update_article(array('url' => $url), $data);
		}
	}
	public function hubungi()
	{
		$ceks = $this->session->userdata('un_member');

			if (isset($_POST['btnkirim'])) {
					$nama  	= htmlentities(strip_tags($this->input->post('nama')));
					$email  = htmlentities(strip_tags($this->input->post('email')));
					$no_hp  = htmlentities(strip_tags($this->input->post('no_hp')));
					$pesan  = addslashes(htmlentities($_POST['pesan']));

					date_default_timezone_set('Asia/Jakarta');
					$waktu	 = date('Y-m-d H:i:s');

					$data = array(
						'nama'				=> $nama,
						'email'				=> $email,
						'no_hp'				=> $no_hp,
						'pesan'				=> $pesan,
						'tgl_hubungi'	=> $waktu
					);
					$kirim=$this->Mcrud->save_hubungi($data);
					if ($kirim) {
						$msg = '<br>
						 <div class="alert alert-success">
							 <span class="closebtn" onclick="tutup_err();">&times;</span>
							 <strong>Sukses!</strong> Pesan berhasil dikirim.
						 </div>';
						 $status = 'sukses';
				 }else {
					 $msg = '<br>
					 <div class="alert alert-warning">
						 <span class="closebtn" onclick="tutup_err();">&times;</span>
						 <strong>Gagal!</strong> Pesan gagal dikirim, silahkan cek koneksi internet Anda.
					 </div>';
					 $status = 'gagal';
				 }
					echo json_encode(array($status => $msg));
			}else {
				$data['web'] 		= $this->Mcrud->get_web_id(1);
				$data['judul']	= 'Hubungi | '.$data['web']->nama_web;
				if (isset($ceks)) {
					$data['ceks'] 	= $ceks;
					$data['user'] 	= $this->Mcrud->get_user_by_un($ceks)->row();
				}else{
					$data['ceks'] 	= '';
					$data['user'] 	= '';
				}
				$this->load->view('header', $data);
				$this->load->view('hubungi', $data);
				$this->load->view('footer', $data);
			}
	}


	public function login()
	{
		$ceks = $this->session->userdata('un_member');
		if(isset($ceks)) {
			redirect('');
		}

		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= 'Login | '.$data['web']->nama_web;
		$data['jml_member'] 	= $this->Mcrud->get_user_by_level()->num_rows();
		$data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			$this->load->view('header', $data);
			$this->load->view('login', $data);
			$this->load->view('footer', $data);

				if (isset($_POST['btnlogin'])){
						 $username = htmlentities(strip_tags($_POST['username']));
						 $pass	   = htmlentities(strip_tags(md5($_POST['password'])));

						 $query  = $this->Mcrud->get_user_by_un($username);
						 $cekun    = $query->row()->username;
						 $jumlah = $query->num_rows();

						$menu = $_POST['menu_log'];
						if ($menu == 'halaman') {
							$sesi_pesan = 'msg';
						}else {
							$sesi_pesan = 'msg_login';
						}

						 if($jumlah == 0) {
						  	 $this->session->set_flashdata("$sesi_pesan",
									 '
									 <div class="alert alert-error">
												<strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );

						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata("$sesi_pesan",
													 '
													 <div class="alert alert-info">
																<strong>Username atau Password Salah!</strong>.
													 </div>'
												);
										 } else {
											 date_default_timezone_set('Asia/Jakarta');
											 $waktu	 = date('Y-m-d H:i:s');

																$this->session->set_userdata('un_member', "$cekun");

																$data = array(
											 					 'waktu_login'		=> $waktu,
											 					 );
											 				 $this->Mcrud->update_user(array('username' => $cekun), $data);

															 $this->session->set_flashdata("$sesi_pesan",
			 													 '
			 													 <div class="alert alert-success">
			 																<strong>Selamat datang, '.ucwords($row->nama).'</strong>.
			 													 </div>'
			 												);

															if ($this->db->get_where('tbl_user', "username='$username'")->row()->aktif == 'no') {
																redirect('panduan');
															}else {
																redirect('');
															}
										 }
						 }

						if ($menu == 'halaman') {
 							redirect('login');
 						}else {
 							redirect('');
 						}
				}

	}

	public function lp()
	{
		$ceks = $this->session->userdata('un_member');
		if(isset($ceks)) {
			redirect('');
		}
			$data['web'] 		= $this->Mcrud->get_web_id(1);
			$data['judul']	= 'Lupa Password | '.$data['web']->nama_web;
			$data['jml_member'] 	= $this->Mcrud->get_user_by_level()->num_rows();
			$data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
				$this->load->view('header', $data);
				$this->load->view('lupa_pass', $data);
				$this->load->view('footer', $data);

				if (isset($_POST['kirim'])) {
						$email  			= htmlentities(strip_tags($this->input->post('email')));

						$cek_email  = $this->Mcrud->get_user_by_email($email);
						if ($cek_email->num_rows() == 0) {
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-block">
											<strong>Gagal Kirim!</strong> Email <b>"'.$email.'"</b> belum terdaftar.
									</div>'
								);
						}else{
											$this->Mcrud->sent_mail($cek_email->row()->username,$email, 'lp');

											if ($this->email->send()){

													$this->session->set_flashdata('msg',
														'
														<div class="alert alert-success">
																<strong>Sukses!</strong> Silahkan cek email Anda untuk Konfirmasi Password.
														</div>'
													);

											}else{
													$this->session->set_flashdata('msg',
														'
														<div class="alert alert-error">
																<strong>Error!</strong> Email <b>"'.$email.'"</b> belum terkirim, silahkan coba lagi.
														</div>'
													);
											}

						}
						redirect('lp');
				}
	}

	public function konfirm_pass($id='',$email='') {
		date_default_timezone_set('Asia/Jakarta');
		$tgl	 = date('Y-m-d');

     if ($id != '' or $email != '') {
			 $cek_id = md5("$email * $tgl");
			 if ($id == $cek_id) {
				 	$data['web'] 		= $this->Mcrud->get_web_id(1);
		 			$data['judul']	= 'Password Baru | '.$data['web']->nama_web;
		 			$data['jml_member'] 	= $this->Mcrud->get_user_by_level()->num_rows();
		 			$data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
		 				$this->load->view('header', $data);
		 				$this->load->view('pass_baru', $data);
		 				$this->load->view('footer', $data);

		 				if (isset($_POST['kirim'])) {
		 						$pass  			= htmlentities(strip_tags($this->input->post('password')));
								$pass2 			= htmlentities(strip_tags($this->input->post('password2')));

								if ($pass == $pass2) {
										$data = array(
											'password'		=> md5($pass),
											);
										$this->Mcrud->update_user(array('email' => $email), $data);
										$this->session->set_flashdata('msg',
											'
											<div class="alert alert-success">
													<strong>Sukses!</strong> Password berhasil diperbarui.
											</div>'
										);
										redirect('');
								}else{
									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-block">
												<strong>Gagal!</strong> Password Baru dan Re-Password Baru tidak cocok, silahkan coba lagi.
										</div>'
									);
								}

								redirect('konfirm_pass/'.$id.'/'.$email.'');
						}

			 }else{

				 $this->session->set_flashdata('msg',
					 '
					 <div class="alert alert-block">
							 <strong>Gagal!</strong> Ubah Password baru kadaluarsa.</a>
					 </div>'
				 );
			 }
     }else{
		 	redirect('');
		 }
  }

	public function logout() {
     if ($this->session->has_userdata('un_member')) {
         $this->session->sess_destroy();
         redirect('');
     }
     redirect('');
  }


	public function profile()
	{
		$ceks = $this->session->userdata('un_member');
		if (!isset($ceks)) {
			redirect('');
		}
		$data['web'] 		= $this->Mcrud->get_web_id(1);
		$data['judul']	= $ceks.' | '.$data['web']->nama_web;
		$data['jml_member'] 	= $this->Mcrud->get_user_by_level()->num_rows();
		$data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
		$data['member'] 	= $this->Mcrud->get_user_by_un($ceks)->row();
			$this->load->view('header', $data);
			$this->load->view('profile', $data);
			$this->load->view('footer', $data);

			if (isset($_POST['btnsimpan'])) {
					$nama  				= htmlentities(strip_tags($this->input->post('nama')));
					$email  			= htmlentities(strip_tags($this->input->post('email')));
					$no_hp  			= htmlentities(strip_tags($this->input->post('no_hp')));
					$password			= htmlentities(strip_tags($this->input->post('password')));
					$password2		= htmlentities(strip_tags($this->input->post('password2')));

					$cek_email  = $this->Mcrud->get_user_by_email($email)->num_rows();
					$cek_member	= $this->Mcrud->get_user_by_un($ceks)->row();

					if ($password == "") {
							$pass = $cek_member->password;
					}else{
						if ($password != $password2) {
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-block">
											<strong>Gagal!</strong> Password tidak cocok.
									</div>'
								);
								redirect('profile');
						}
							$pass = md5($password);
					}

					if ($cek_email != 0) {
							if ($cek_member->email == $email) {
									$simpan = "yes";
							}else{
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-block">
											<strong>Gagal!</strong> Email <b>"'.$email.'"</b> sudah ada.
									</div>'
								);
							}
					}else{
									$simpan = "yes";
					}

					if ($simpan == "yes") {
							$data = array(
							 'nama'			=> $nama,
							 'email'		=> $email,
 							 'no_hp'		=> $no_hp,
 							 'password' => $pass,
							 );
						 $this->Mcrud->update_user(array('username' => $ceks), $data);

						 $this->session->set_flashdata('msg',
							 '
							 <div class="alert alert-success">
									 <strong>Sukses!</strong> Profile berhasil disimpan.
							 </div>'
						 );
					}

					redirect('profile');
			}
	}

	function error_not_found(){
		$data['web'] 	 = $this->Mcrud->get_web_id(1);
		$data['judul'] = '404 PAGE NOT FOUND | Ordodev : Situs Gudang Download Source Code Aplikasi Terlengkap';
		$this->load->view('header', $data);
		$this->load->view('404_content', $data);
		$this->load->view('footer', $data);
	}
}
