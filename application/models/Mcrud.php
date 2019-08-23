<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {

	var $tbl_web			= 'tbl_web';
	var $tbl_user			= 'tbl_user';
	var $tbl_aplikasi	= 'tbl_app';
	var $tbl_hubungi	= 'tbl_hubungi';
	var $tbl_transaksi= 'tbl_transaksi';
	var $tbl_article	= 'tbl_article';
	var $tbl_kat			= 'tbl_kat';

//Sent mail
	public function sent_mail($username, $email, $aksi)
	{
		$email_saya = "admin@ordodev.com";
		$pass_saya  = "1202145";

		//konfigurasi email
		$config = array();
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'Ordodev.com';
		$config['protocol']= "smtp";
		$config['mailtype']= "html";
		$config['smtp_host']= "ssl://srv40.niagahoster.com";
		$config['smtp_port']= "465";
		$config['smtp_timeout']= "465";
		$config['smtp_user']= "$email_saya";
		$config['smtp_pass']= "$pass_saya";
		$config['crlf']="\r\n";
		$config['newline']="\r\n";

		$config['wordwrap'] = TRUE;
		//memanggil library email dan set konfigurasi untuk pengiriman email

		$this->email->initialize($config);
		//$ipaddress = get_real_ip(); //untuk mendeteksi alamat IP

		date_default_timezone_set('Asia/Jakarta');
		$waktu 	  = date('Y-m-d H:i:s');
		$tgl 			= date('Y-m-d');

		$id = md5("$email * $tgl");

		if ($aksi == 'reg') {
				$link			= base_url().'verify';
				$pesan    = "Hello $username,
											<br /><br />
											Welcome to Ordodev!<br/>
											Untuk melengkapi registrasi Anda, silahkan klik link berikut<br/>
											<br /><br />
											<b><a href='$link/$id/$email'>Klik Aktivasi disini :)</a></b>
											<br /><br />
											Terimakasih ^_^,
											";
				$subject = 'Aktivasi Akun | Ordodev';

		}elseif ($aksi == 'lp') {
				$link			= base_url().'konfirm_pass';
				$pesan    = "Hello $username,
											<br /><br />
											Welcome to Ordodev!<br/>
											Untuk membuat password baru, silahkan klik link berikut<br/>
											<br /><br />
											<b><a href='$link/$id/$email'>Klik disini :)</a></b>
											<br /><br />
											Terimakasih ^_^,
											";
				 $subject = 'Lupa Password | Ordodev';
		}

		$this->email->from("$email_saya");
		$this->email->to("$email");
		$this->email->subject($subject);
		$this->email->message($pesan);
	}
//End Sent mail

//Web
	public function get_web_id($id)
	{
			$this->db->from($this->tbl_web);
			$this->db->where('id_web', $id);
			$query = $this->db->get();

			return $query->row();
	}

	public function update_web($where, $data)
	{
		$this->db->update($this->tbl_web, $data, $where);
		return $this->db->affected_rows();
	}
//END Web

//User
	public function get_user()
	{
			$this->db->from($this->tbl_user);
			$query = $this->db->get();

			return $query;
	}

	public function get_user_by_email($email)
	{
			$this->db->from($this->tbl_user);
			$this->db->where('email', $email);
			$query = $this->db->get();

			return $query;
	}

	public function get_user_by_un($un)
	{
			$this->db->from($this->tbl_user);
			$this->db->where('username', $un);
			$query = $this->db->get();

			return $query;
	}

	public function get_user_by_level($bln_thn='')
	{
			$this->db->from($this->tbl_user);
			$this->db->like('tgl_daftar', "$bln_thn", 'after');
			$this->db->where('level', 'member');
			$query = $this->db->get();

			return $query;
	}

	public function get_admin_by_un($un)
	{
			$this->db->from($this->tbl_user);
			$this->db->where('level', 'admin');
			$this->db->where('username', $un);
			$query = $this->db->get();

			return $query;
	}

	public function save_user($data)
	{
		$this->db->insert($this->tbl_user, $data);
		return $this->db->insert_id();
	}

	public function update_user($where, $data)
	{
		$this->db->update($this->tbl_user, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_user_by_id($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete($this->tbl_user);
	}
//END User

//Aplikasi
	public function get_app()
	{

			$this->db->from($this->tbl_aplikasi);
			$query = $this->db->get();

			return $query;
	}

	public function get_app_url($url)
	{
			$this->db->join('tbl_kat',"tbl_kat.id_kat=$this->tbl_aplikasi.id_kat");
			$this->db->from($this->tbl_aplikasi);
			$this->db->where('url', $url);
			$query = $this->db->get();

			return $query;
	}

	public function get_app_url_download($url)
	{
			$this->db->from($this->tbl_aplikasi);
			$this->db->where('url_download', $url);
			$query = $this->db->get();

			return $query;
	}

	public function get_app_view()
	{
		$this->db->select_sum('view');
		$query = $this->db->get($this->tbl_aplikasi);

			return $query;
	}

	public function get_app_download()
	{
		$this->db->select_sum('download');
		$query = $this->db->get($this->tbl_aplikasi);

			return $query;
	}

	public function get_app_by_kode($kode)
	{
			$this->db->from($this->tbl_aplikasi);
			$this->db->where('kode_app', $kode);
			$query = $this->db->get();

			return $query;
	}

	public function get_app_by_id($id)
	{
			$this->db->from($this->tbl_aplikasi);
			$this->db->where('id_app', $id);
			$query = $this->db->get();

			return $query;
	}

	public function save_app($data)
	{
		$this->db->insert($this->tbl_aplikasi, $data);
		return $this->db->insert_id();
	}

	public function update_app($where, $data)
	{
		$this->db->update($this->tbl_aplikasi, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_app_by_id($id)
	{
		$this->db->where('id_app', $id);
		$this->db->delete($this->tbl_aplikasi);
	}
//END Aplikasi

//transaksi
	public function get_transaksi($bln_thn='')
	{
			$this->db->from($this->tbl_transaksi);
			$this->db->join($this->tbl_user, 'tbl_user.id_user=tbl_transaksi.id_user');
			$this->db->like('tbl_transaksi.tgl_transaksi', "$bln_thn", 'after');
			$this->db->order_by('id_transaksi', 'DESC');
			$query = $this->db->get();

			return $query;
	}

	public function save_transaksi($data)
	{
		$this->db->insert($this->tbl_transaksi, $data);
		return $this->db->insert_id();
	}

	public function update_transaksi($where, $data)
	{
		$this->db->update($this->tbl_transaksi, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_transaksi_by_id($id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->delete($this->tbl_transaksi);
	}
//End transaksi

//article
	public function get_article()
	{
			$this->db->from($this->tbl_article);
			$this->db->order_by('id_article', 'DESC');
			$query = $this->db->get();

			return $query;
	}

	public function get_article_by_id($id)
	{
			$this->db->from($this->tbl_article);
			$this->db->where('id_article', $id);
			$this->db->order_by('id_article', 'DESC');
			$query = $this->db->get();

			return $query;
	}

	public function get_article_by_url($id)
	{
			$this->db->from($this->tbl_article);
			$this->db->where('url', $id);
			$this->db->limit(1);
			$query = $this->db->get();

			return $query;
	}

	public function save_article($data)
	{
		$this->db->insert($this->tbl_article, $data);
		return $this->db->insert_id();
	}

	public function update_article($where, $data)
	{
		$this->db->update($this->tbl_article, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_article_by_id($id)
	{
		$this->db->where('id_article', $id);
		$this->db->delete($this->tbl_article);
	}

	function view_article($num, $offset)
	{
	  $query = $this->db->get($this->tbl_article,$num, $offset);
	  return $query->result();
	}
//END article

//Kategori
public function save_kat($data)
{
	$this->db->insert($this->tbl_kat, $data);
	return $this->db->insert_id();
}

public function update_kat($where, $data)
{
	$this->db->update($this->tbl_kat, $data, $where);
	return $this->db->affected_rows();
}

public function delete_kat_by_id($id)
{
	$this->db->where('id_kat', $id);
	$this->db->delete($this->tbl_kat);
}

function view_kat($num, $offset)
{
	$query = $this->db->get($this->tbl_kat,$num, $offset);
	return $query->result();
}

public function get_kat()
{
		$this->db->from($this->tbl_kat);
		$this->db->order_by('id_kat', 'DESC');
		$query = $this->db->get();
		return $query;
}

public function get_kat_by_id($id)
{
		$this->db->from($this->tbl_kat);
		$this->db->where('id_kat', $id);
		$this->db->order_by('id_kat', 'DESC');
		$query = $this->db->get();
		return $query;
}
//END Kategori

//hubungi
	public function get_kontak()
	{
			$this->db->from($this->tbl_hubungi);
			$query = $this->db->get();

			return $query;
	}

	public function save_hubungi($data)
	{
		$this->db->insert($this->tbl_hubungi, $data);
		return $this->db->insert_id();
	}

	public function delete_hubungi_by_id($id)
	{
		$this->db->where('id_hubungi', $id);
		$this->db->delete($this->tbl_hubungi);
	}
//END Hubungi


	function imageBase64FromURL($url){
	   $urlParts = pathinfo($url);
	   $extension = $urlParts['extension'];
	   $ch = curl_init();
	   curl_setopt($ch, CURLOPT_URL, $url);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	   curl_setopt($ch, CURLOPT_HEADER, 0);
	   $response = curl_exec($ch);
	   curl_close($ch);
	   $base64 = 'data:image/' . $extension . ';base64,' . base64_encode($response);
	   return $base64;
	}

	function view_app($num, $offset, $stt='')
	{
		$this->db->join('tbl_kat','tbl_kat.id_kat=tbl_app.id_kat');
		if ($stt=='RANDOM') {
			$this->db->order_by('id_app', $stt);
		}else {
			$this->db->order_by('id_app', 'DESC');
		}
		$query = $this->db->get('tbl_app',$num, $offset);
		return $query;
	}

		public function nama_app($stt1='',$stt2='')
		{
			$ket1 = "JUAL";
			$ket2 = "KODING";
			if ($stt1==1) {
				return $ket1;
			}elseif ($stt1==2) {
				return $ket2;
			}else {
				return "$ket1$ket2";
			}
		}

		public function get_web($aksi='')
		{
			$web = $this->db->get('tbl_web')->row()->$aksi;
			if (empty($web)) {
				$web='';
			}
			return $web;
		}

}
