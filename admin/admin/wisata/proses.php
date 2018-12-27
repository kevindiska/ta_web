<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_wisata = @$_POST['id_wisata'];
	@$nama_wisata = @$_POST['nama_wisata'];
	@$alamat_wisata = @$_POST['alamat_wisata'];
	@$jam_oprasional = @$_POST['jam_oprasional'];
	@$ket_wisata = @$_POST['ket_wisata'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO wisata(nama_wisata, alamat_wisata, jam_oprasional, ket_wisata) VALUES (:nama_wisata, :alamat_wisata, :jam_oprasional, :ket_wisata)");
	$sql->bindParam(':nama_wisata', @$nama_wisata);
	$sql->bindParam(':alamat_wisata', @$alamat_wisata);
	$sql->bindParam(':jam_oprasional', @$jam_oprasional);
	$sql->bindParam(':ket_wisata', @$ket_wisata);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=wisata';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE wisata SET nama_wisata = :nama_wisata, alamat_wisata = :alamat_wisata, jam_oprasional = :jam_oprasional, ket_wisata = :ket_wisata WHERE id_wisata = :id_wisata");
	$sql->bindParam(':id_wisata', @$id_wisata);
	$sql->bindParam(':nama_wisata', @$nama_wisata);
	$sql->bindParam(':alamat_wisata', @$alamat_wisata);
	$sql->bindParam(':jam_oprasional', @$jam_oprasional);
	$sql->bindParam(':ket_wisata', @$ket_wisata);
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