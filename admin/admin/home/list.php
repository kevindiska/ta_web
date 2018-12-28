<?php
	if(@$_SESSION['username'] != ''){
?>
<?php
	
	$sql=$db->prepare("SELECT * FROM admin WHERE username = '$_SESSION[username]'");
	$sql->execute();
	while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
	
?>
<div class="home">
	<div class="hometop">
	<h1>SELAMAT DATANG<br><?php echo $hasil['nama']; ?></h1>
	</div>
		<p><?php echo $hasil['photo'];?></p>
	<div class="homefoto">
		<img src="./data/34650319_1671439606306193_7236283946818863104_n.jpg />
	</div>
	<div class="homebutton">
		<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=home&action=add&id=<?php echo base64_encode($hasil['username']);?>'">Edit Profile</button>
	</div>
</div>
<?php } ?>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>
