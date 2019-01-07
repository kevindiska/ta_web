<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_wisata = @$_POST['id_wisata'];
	@$nama_wisata = @$_POST['nama_wisata'];
	@$deskripsi = @$_POST['deskripsi'];
	@$gambar = @$_POST['gambar'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO wisata( id_wisata, nama_wisata, deskripsi, gambar) VALUES ( :id_wisata, :nama_wisata, :deskripsi, :gambar)");
	$sql->bindParam(':id_wisata', @$id_wisata);
	$sql->bindParam(':nama_wisata', @$nama_wisata);
	$sql->bindParam(':deskripsi', @$deskripsi);
	$sql->bindParam(':gambar', @$gambar);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=wisata';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE wisata SET id_wisata = :id_wisata, nama_wisata = :nama_wisata, deskripsi = :deskripsi, gambar = :gambar WHERE id_wisata = :id_wisata");
	$sql->bindParam(':id_wisata', @$id_wisata);
	$sql->bindParam(':nama_wisata', @$nama_wisata);
	$sql->bindParam(':deskripsi', @$deskripsi);
	$sql->bindParam(':gambar', @$gambar);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=wisata';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_wisata = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM wisata WHERE id_wisata = :id_wisata");
	$sql->bindParam(':id_wisata', @$id_wisata);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=wisata';
		</script>
	";
	
	break;
	
	}
	
?>
