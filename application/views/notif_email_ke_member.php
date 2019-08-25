<!DOCTYPE html>
<html>
<head>
	<title>MalasNgoding's Blog</title>
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300);

body {
	background: #eee;
	margin:0;
	font-family: 'Open Sans', sans-serif;
}

hr {
	border:0;
	background:#dedede;
	height:1px;
}		

header{
	text-align: center;
	color: #232323;
}

header .judul{
	font-size: 17pt;
}

header .deskripsi{
	font-size: 11pt;
}

.wrap {
	width: 950px;
	margin:25px auto;
}

nav.menu ul {
	overflow:hidden;
	color:#fff;
	list-style: none;
	float:left;
	padding:0;
	width: 650px;
	margin:0 0 0;
	background: #1abc9c;
	-webkit-box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.55);
	-moz-box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.55);
	box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.55);
}

nav.menu ul li {
	margin:0;
	float:left;
}

nav.menu ul a {
	padding:25px;
	display:block;
	font-weight:600;
	font-size: 16px;
	color:#fff;
	text-transform: uppercase;
	transition: all 0.5s ease;
	text-decoration: none;
}

nav.menu ul a:hover {
	text-decoration: underline;
	background:#16a085;
}

.sidebar {
	float:right;
	width:275px;
}

.sidebar .widget {
	padding:25px;
	margin:0 0 25px;
	background:#fff;
	border-bottom: 2px solid #fff;
	transition: all 0.5s ease;
}

.sidebar .widget:hover {
	border-bottom: 2px solid #3498db;
}

.sidebar .widget h2 {
	padding:0;
	margin:0 0 15px;
	color:#3498db;
	font-size: 18px;
	font-weight:800;
	text-transform: uppercase;
}

.sidebar .widget p {
	font-size: 14px;
}

.sidebar .widget p:last-child {
	margin:0;
}

.blog {
	float:left;
}

.conteudo {
	width:800px;
	padding:25px;
	margin:25px auto;
	background: #fff;
	border:1px solid #dedede;
	-webkit-box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.35);
	-moz-box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.35);
	box-shadow: 1px 1px 1px 0px rgba(204,204,204,0.35);
}

.conteudo img {
	min-width: 650px;
	margin:0 0 25px -25px;
	max-width: 650px;
}

.conteudo h1 {
	padding:0;
	margin:0 0 15px;
	font-weight: normal;
	color: #666;
	font-family: Georgia;
}

.conteudo p:last-child {
	margin: 0;
}

.conteudo .continue-lendo {
	color:#000;
	transition: all 0.5s ease;
	text-decoration: none;
	font-weight: 700; 
}

.conteudo .continue-lendo:hover {
	margin-left:10px;
}

.post-info {
	float: right;
	font-size: 12px;
	margin: -10px 0 15px;
	text-transform: uppercase;
}

@media screen and (max-width: 960px) {

	.header {
		position:inherit;
	}

	.wrap {
		width: 90%;
		margin:25px auto;
	}
	.sidebar {
		width:100%;
		margin:25px 0 0;
		float:right;
	}

	.sidebar .widget {
		padding:5%;
	}

	nav.menu ul {
		width: 100%;
	}

	nav.menu ul {
		float:inherit;
	}

	nav.menu ul li {
		float:inherit;
		margin:0;
	}

	nav.menu ul a {
		padding:15px;
		font-size: 16px;
		border-top:1px solid #1abf9f;
		border-bottom:1px solid #16a085;
	}

	.blog {
		width:90%;
	}

	.conteudo {
		float:inherit;
		margin:0 auto 25px;
		width:101%;
		border:1px solid #dedede;
		padding:5%;  
		background: #fff;
	}

	.conteudo img {
		max-width: 110%;
		margin:0 0 25px -5%;
		min-width: 110%;
	}

	.conteudo .continue-lendo:hover {
		margin-left:0;
	}


}

@media screen and (max-width: 460px) {

	nav.menu ul a {
		padding:15px;
		font-size: 14px;
	}

	.sidebar {
		display:none
	}
	.post-info {
		display:none;
	}

	.conteudo {
		margin:25px auto;
	}

	.conteudo img {
		margin:-5% 0 25px -5%;
	}			
}
	</style>
</head>
<body>
	
	<!-- bagian header template -->
	<header>
		<h1 class="judul">JualKoding.Com</h1>
		<p class="deskripsi">Download aplikasi kami secara gratis dan belajar bersama kami pemrograman web, mobile dan desktop lengkap berbahasa indonesia. dari dasar hingga mahir.</p>
	</header>
	<!-- akhir bagian header template -->
	
	<div class="wrap">
		<!-- bagian menu		 -->
		<!-- <nav class="menu">
			<ul>
				<li>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Tutorial</a>
				</li>
				<li>
					<a href="#">Kontak</a>
				</li>
			</ul>
		</nav> -->
		<!-- akhir bagian menu -->
 
		<!-- bagian sidebar website -->
		<!-- <aside class="sidebar">
			<div class="widget">
				<h2>Tutorial</h2>
				<p>Selamat datang di www.malasngoding.com, situs ini menyediakan tutorial pemrograman web, mobile & desktop.</p>
			</div>
			<div class="widget">
				<h2>Ebook Gratis</h2>
				<p>Teman-teman bisa mendapatkan ebook tutorial gratis di sini <a target="_blank" href="https://www.malasngoding.com">www.malasngoding.com</a>.</p>
			</div>
		</aside> -->
		<!-- akhir bagian sidebar website -->
 
		<!-- bagian konten Blog -->
		<div class="blog">
			<?php 
			$this->db->limit(10);
			$this->db->order_by('id_app', 'desc');
			$sql = $this->db->get('tbl_app');
			foreach ($sql->result() as $row) {
			 ?>

			<div class="conteudo">
				<div class="post-info">
					Developer aplikasi : <b><?php echo $row->developer ?></b>
				</div>
				<a href="<?php echo base_url() ?>d/<?php echo $row->url; ?>" style="color: black">
					<h3> <?php echo $row->nama_app ?> </h3>
				</a>
				<hr>
				<p>
					<?php echo substr($row->meta_description, 0,300) ?>...
				</p>				
				<a href="<?php echo base_url() ?>d/<?php echo $row->url; ?>" class="continue-lendo">Selengkapnya →</a>
			</div>
			<?php } ?>
		</div>
		<!-- akhir bagian konten Blog -->
	</div>
 
</body>
</html>