<?php
	if(@$_SESSION['username'] != ''){
?>
<?php
	
	$sql=$db->prepare("SELECT * FROM tb_admin WHERE username = '$_SESSION[username]'");
	$sql->execute();
	while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
	
?>
<div class="home">
	<div class="hometop">
	<h1>SELAMAT DATANG<br><?php echo $hasil['nama']; ?></h1>
	</div>
	<div class="homefoto">
		<img src="../data/<?php echo $hasil['foto'];?>" />
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