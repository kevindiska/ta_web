<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$nip = @$_POST['nip'];
	@$password = @$_POST['password'];
	@$nama = @$_POST['nama'];
	@$alamat = @$_POST['alamat'];
	@$telp = @$_POST['telp'];
	@$jenis_kelamin = @$_POST['jenis_kelamin'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO guru(nip, password, nama, alamat, telp, jenis_kelamin, foto) VALUES (:nip, :password, :nama, :alamat, :telp, :jenis_kelamin, :foto)");
	$sql->bindParam(':nip', @$nip);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':alamat', @$alamat);
	$sql->bindParam(':telp', @$telp);
	$sql->bindParam(':jenis_kelamin', @$jenis_kelamin);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=guru';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE guru SET nip = :nip, password = :password, nama = :nama, alamat = :alamat, telp = :telp, jenis_kelamin = :jenis_kelamin, foto = :foto WHERE nip = :nip");
	$sql->bindParam(':nip', @$nip);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':alamat', @$alamat);
	$sql->bindParam(':telp', @$telp);
	$sql->bindParam(':jenis_kelamin', @$jenis_kelamin);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=guru';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$nip = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM guru WHERE nip = :nip");
	$sql->bindParam(':nip', @$nip);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=guru';
		</script>
	";
	
	break;
	
	}
	
?>