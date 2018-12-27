<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$username = @$_POST['username'];
	@$password = @$_POST['password'];
	@$nama = @$_POST['nama'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO admin(id_admin, nama, username, level, foto) VALUES (:id_admin, :nama, :username, :level, :foto)");
	$sql->bindParam(':id_admin', @$id_admin);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':level', @$level);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=admin';
		</script>
	";

	break;
	
	case "edit" :
	
		$sql=$db->prepare("UPDATE admin SET id_admin = :id_admin, nama = :nama, username = :username, level = :level, foto = :foto, WHERE username = :username");
	$sql->bindParam(':id_admin', @$id_admin);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':level', @$level);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=admin';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_admin = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM admin WHERE id_admin = :id_admin");
	$sql->bindParam(':id_admin', @$id_admin);
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
