<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$nama = @$_POST['nama'];
	@$keterangan = @$_POST['keterangan'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO fasilitas_wisata(nama, keterangan, foto) VALUES (:nama, :keterangan, :foto)");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=fasilitas_wisata';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE fasilitas_wisata SET nama = :nama, keterangan = :keterangan, foto = :foto WHERE nama = :nama");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=fasilitas_wisata';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$nama = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM fasilitas_wisata WHERE nama = :nama");
	$sql->bindParam(':nama', @$nama);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=fasilitas_wisata';
		</script>
	";
	
	break;
	
	}
	
?>