<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$username = @$_POST['username'];
	@$password = @$_POST['password'];
	@$nama = @$_POST['nama'];
	@$jk = @$_POST['jk'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "edit" :
	
	$sql=$db->prepare("UPDATE admin SET username = :username, password = :password, nama = :nama, jk = :jk, foto = :foto WHERE username = :username");
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':jk', @$jk);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=home';
		</script>
	";
	
	break;
	
	}
	
?>