<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$username = @$_POST['username'];
	@$password = @$_POST['password'];
	@$nama = @$_POST['nama'];
	#@$nama = @$_POST['jk'];
	@$nama = @$_POST['level'];
	@$asal = @$_FILES['photo']['tmp_name'];
	@$tujuan = @$_FILES['photo']['name'];
	
	move_uploaded_file(@$asal, "../img/admin/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO admin( username, password, nama, jk, level, photo) VALUES ( :username, :password, :nama, :jk, :level, :photo)");
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':jk', @$jk);
	$sql->bindParam(':level', @$level);
	$sql->bindParam(':photo', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=admin';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE admin SET username = :username, password = :password, nama = :nama, jk = :jk, level = :level, photo = :photo, WHERE username = :username");
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':jk', @$jk);
	$sql->bindParam(':level', @$level);
	$sql->bindParam(':photo', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=admin';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$username = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM admin WHERE username = :username");
	$sql->bindParam(':username', @$username);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=admin';
		</script>
	";
	
	break;
	
	}
	
?>
