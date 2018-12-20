<?php include('database.php'); ?>
<?php session_start(); ?>
<html>
	<head>
		<title>MULTIMEDIA SMKN 12 SURABAYA</title>
		<link rel="shorcut icon" href="data/smkn12.png" />
		<!-- data meta -->
		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- data css -->
		
		<link rel="stylesheet" href="style/frontend/css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="style/frontend/css/bootstrap.css" />
		<link rel="stylesheet" href="style/frontend/css/dataTables.bootstrap.min.css" />
		
		<!-- data js -->
				
		<script type="text/javascript" src="style/frontend/js/jquery.min.js"></script>
		<script type="text/javascript" src="style/frontend/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="style/frontend/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="style/frontend/js/rhinoslider-1.02.min.js"></script>
		<script type="text/javascript" src="style/frontend/js/mousewheel.js"></script>
		<script type="text/javascript" src="style/frontend/js/easing.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#slider').rhinoslider({
					autoPlay: true
				});
			});

		</script>
	</head>
	<body>
		<div class="header">
			<div class="wrap">
				<div class="logo"><a href="index.php">Multimedia SMKN 12 Surabaya</a></div>
				<div class="phone">
					<ul>
						<li><span class="icon mob"></span>Contact : +62 123-456789</li>
						<li><span class="icon mail"></span>Email : <a href="mailto:@example.com">mm@smkn12sby.com</a></li>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?module=pelajaran">Lesson</a></li>
						<li><a href="index.php?module=rapot">Rapot</a></li>
						<li><a href="index.php?module=about_us">About</a></li>
						<li><a href="index.php?module=contact">Contact</a></li>
						<li><a href="index.php?module=portofolio">Portofolio</a></li>
					</ul>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="wrap">
			<div class="content">
			<?php if(@$_GET['module'] ==""){ ?>
				<div class="slide-box">
					<ul id="slider">
						<li><img src="data/images/s1.jpg"></li>
						<li><img src="data/images/s2.jpg"></li>
						<li><img src="data/images/s3.jpg"></li>
					</ul>
				</div>
			<?php } ?>
				<div class="b-box">
					<?php
						if(@$_GET['module'] !=''){
							if(@$_GET['action'] !=''){
								include("frontend/".@$_GET['module']."/".@$_GET['action'].".php");
							}else{
								include("frontend/".@$_GET['module']."/list.php");
							}
						}else{
							include("frontend/home/list.php");
						}
					?>	
				</div>	
			</div>
		</div>
		<div class="footer">
			<div class="wrap">
				<div class="f-menu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?module=pelajaran">Lesson</a></li>
						<li><a href="index.php?module=rapot">Rapot</a></li>
						<li><a href="index.php?module=about_us">About</a></li>
						<li><a href="index.php?module=contact">Contact</a></li>
					</ul>
					 <div class="copy">&copy; 2018 Multimedia SMKN 12 Surabaya. All rights reserved. Designed by <a href="index.php" style="color:#000000;"></a> <a href="index.php" style="color:#000000;">Abas</a></div>
				</div>
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