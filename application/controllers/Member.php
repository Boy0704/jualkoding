<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function index() {
		$ceks = $this->session->userdata('un_member');
		if (!isset($ceks)) { redirect('login'); }

		 	 $data['web'] 	= $this->Mcrud->get_web_id(1);
		 	 $data['judul']	= 'Aplikasi | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
       $data['jml_kat']       = $this->Mcrud->get_kat()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
       $data['app'] 	= $this->Mcrud->get_kat();
       $data['member']= $this->Mcrud->get_user_by_un($ceks)->row();

       $data['v_page'] = "beranda";
			 $this->load->view('header', $data);
			 $this->load->view('member/index', $data);
			 $this->load->view('footer', $data);
  }


  public function app() {
		$ceks = $this->session->userdata('un_member');
		if (!isset($ceks)) { redirect('login'); }

		 	 $data['web'] 	= $this->Mcrud->get_web_id(1);
		 	 $data['judul']	= 'Aplikasi | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
       $data['jml_kat']       = $this->Mcrud->get_kat()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
       $data['app'] 	= $this->Mcrud->get_kat();
       $data['member']= $this->Mcrud->get_user_by_un($ceks)->row();

       $data['v_page'] = "app";
			 $this->load->view('header', $data);
			 $this->load->view('member/index', $data);
			 $this->load->view('footer', $data);
  }


  public function ajax_list()
  {
    $ceks = $this->session->userdata('un_member');
        $list = $this->M_App->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $value) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img src="images/app/'.$value->img.'" alt="" width="50">';
            $row[] = $value->nama_app;
            $row[] = $this->Mcrud->get_kat($value->id_kat)->row()->kat;
            $row[] = number_format($value->download);
            $row[] = number_format($value->view);
            if ($this->Mcrud->get_user_by_un($ceks)->row()->aktif=='no') {
              $url='web/i';
            }else {
              $url='d/'.$value->url;
            }
            $row[] = '<a href="'.$url.'" class="btn btn-success btn-sm">DOWNLOAD</a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_App->count_all(),
                        "recordsFiltered" => $this->M_App->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
  }


  public function konfirmasi()
  {
      redirect('panduan');
  }

  public function profile() {
		$ceks = $this->session->userdata('un_member');
		if (!isset($ceks)) { redirect('login'); }

		 	 $data['web'] 	= $this->Mcrud->get_web_id(1);
		 	 $data['judul']	= 'Aplikasi | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
       $data['jml_kat']       = $this->Mcrud->get_kat()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
       $data['app'] 	= $this->Mcrud->get_kat();
       $data['member']= $this->Mcrud->get_user_by_un($ceks)->row();

       $data['v_page'] = "profile";
			 $this->load->view('header', $data);
			 $this->load->view('member/index', $data);
			 $this->load->view('footer', $data);
  }

  public function pengaturan() {
		$ceks = $this->session->userdata('un_member');
		if (!isset($ceks)) { redirect('login'); }

		 	 $data['web'] 	= $this->Mcrud->get_web_id(1);
		 	 $data['judul']	= 'Aplikasi | '.$data['web']->nama_web;
			 $data['jml_member'] 		= $this->Mcrud->get_user_by_level()->num_rows();
       $data['jml_kat']       = $this->Mcrud->get_kat()->num_rows();
			 $data['jml_app'] 			= $this->Mcrud->get_app()->num_rows();
			 $data['jml_app_view']	= $this->Mcrud->get_app_view()->row();
			 $data['jml_app_download'] = $this->Mcrud->get_app_download()->row();
       $data['app'] 	= $this->Mcrud->get_kat();
       $data['member']= $this->Mcrud->get_user_by_un($ceks)->row();

       $data['v_page'] = "pengaturan";
			 $this->load->view('header', $data);
			 $this->load->view('member/index', $data);
			 $this->load->view('footer', $data);

       if (isset($_POST['btnsimpan'])) {
         $simpan=1; $pesan='';
         $post=array();
         foreach ($this->input->post() as $key => $value) {
           if ($key!=='btnsimpan' && $key!=='username' && $key!=='password') {
            $post[$key] = htmlentities(strip_tags($this->input->post($key)));
           }
           if ($key=='username') {
             $un = htmlentities(strip_tags($this->input->post('username')));
             if ($ceks==$un) {
               $post['username'] = $un;
             }else {
               if ($this->Mcrud->get_user_by_un($un)->num_rows()==0) {
                 $post['username'] = $un;
               }else {
                 $simpan=0; $pesan='Username sudah ada';
               }
             }
           }

           if ($key=='password') {
             $pass = htmlentities(strip_tags($this->input->post('password')));
             if ($pass=='') {
               $post['password'] = $data['member']->password;
             }else {
               $post['password'] = md5($pass);
             }
           }
         }

         if ($simpan==1) {
           $this->session->unset_userdata('un_member');
           $this->session->set_userdata('un_member',$un);
           $this->db->update("tbl_user",$post, array('username'=>$ceks));
           $this->session->set_flashdata('msg',
               '
               <div class="alert alert-success">
                   <button class="close" data-dismiss="alert">×</button>
                   <strong>Berhasil disimpan</strong>.
               </div>'
            );
          }else {
            $this->session->set_flashdata('msg',
              '
              <div class="alert alert-warning">
                  <button class="close" data-dismiss="alert">×</button>
                  <strong>Gagal!</strong> '.$pesan.'.
              </div>'
           );
          }

          redirect('member/pengaturan');
       }
  }

}
