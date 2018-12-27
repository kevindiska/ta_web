<?php session_start(); ?>
<?php
	include("../database.php");
	if(@$_SESSION['username'] == ''){
		if(@$_GET['module'] != ""){
			if(@$_GET['action'] != ""){
				include("admin/".@$_GET['module']."/".@$_GET['action'].".php");
			}else{
				include("admin/".@$_GET['module']."/list.php");
			}
		}else{
			include("login.php");
		}
	}else{
?>
<html>
	<head>
		<title>PANDAWA RESORT</title>
		<link rel="shorcut icon" href="../data/smkn12.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- data css -->
		
		<link rel="stylesheet" href="../style/backend/css/style.css" />
		<link rel="stylesheet" href="../style/backend/css/bootstrap.css" />
		<link rel="stylesheet" href="../style/backend/css/dataTables.bootstrap.min.css" />
		<link rel="stylesheet" href="../style/backend/css/AdminLTE.min.css" />
		
		<!-- data js -->
				
		<script src="../style/backend/js/jquery.min.js"></script>
		<script src="../style/backend/js/jquery.dataTables.min.js"></script>
		<script src="../style/backend/js/dataTables.bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="container">
			<div class="header">
				<div class="header-button">
					<button class="btn btn-default" onclick="javasript:window.location.href='index.php?module=proses_logout&action=proses'">LOGOUT</button>
				</div>
			</div>
			<div class="main">
				<div class="main-left">
					<ul>
						<a href="index.php"><li><font>Home</font></li></a>
						<a href="index.php?module=admin"><li><font>Admin</font></li></a>
						<a href="index.php?module=album"><li><font>Album</font></li></a>
						<a href="index.php?module=berita"><li><font>Berita</font></li></a>
						<a href="index.php?module=galeri"><li><font>Galeri</font></li></a>
						<a href="index.php?module=kategori_paket"><li><font>Kategori Paket</font></li></a>
						<a href="index.php?module=metode_bayar"><li><font>Metode Bayar</font></li></a>
						<a href="index.php?module=orders"><li><font>Orders</font></li></a>
						<a href="index.php?module=paket"><li><font>Paket</font></li></a>
						<a href="index.php?module=pembayaran"><li><font>Pembayaran</font></li></a>
						<a href="index.php?module=tbl_inbox"><li><font>Tabel Inbox</font></li></a>
						<a href="index.php?module=tbl_pengunjung"><li><font>Tabel Pengunjung</font></li></a>
						<a href="index.php?module=testimoni"><li><font>Testimoni</font></li></a>
						<a href="index.php?module=wisata"><li><font>Wisata</font></li></a>
					</ul>
				</div>
				<div class="main-right">
					<?php
						if(@$_GET['module'] !=''){
							if(@$_GET['action'] !=''){
								include("admin/".@$_GET['module']."/".@$_GET['action'].".php");
							}else{
								include("admin/".@$_GET['module']."/list.php");
							}
						}else{
							include("admin/home/list.php");
						}
					?>
				</div>
			</div>
			<div class="footer">
				<font>&copy; COPYRIGHT PANDAWA RESORT</font>
			</div>
		</div>
		<script>
		  $(function () {
			$('#example1').DataTable()
			$('#example2').DataTable({
			  'paging'      : true,
			  'lengthChange': false,
			  'searching'   : false,
			  'ordering'    : true,
			  'info'        : true,
			  'autoWidth'   : false
			})
		  })
		</script>
	</body>
</html>
<?php } ?>
