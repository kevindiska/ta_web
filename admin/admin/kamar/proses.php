<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_kamar = @$_POST['id_kamar'];
	@$nama = @$_POST['nama'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	@$harga = @$_POST['harga'];
	@$fasilitas = @$_POST['fasilitas'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO tb_kamar(nama, foto, harga, fasilitas ) VALUES (:nama, :foto, :harga, :fasilitas)");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':foto', @$tujuan);
	$sql->bindParam(':harga', @$harga);
	$sql->bindParam(':fasilitas', @$fasilitas);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=kamar';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE tb_kamar SET nama = :nama, foto = :foto, harga = :harga, fasilitas = :fasilitas WHERE id_kamar = :id_kamar");
	$sql->bindParam(':id_kamar', @$id_kamar);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':foto', @$tujuan);
	$sql->bindParam(':harga', @$harga);
	$sql->bindParam(':fasilitas', @$fasilitas);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=kamar';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_kamar = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM tb_kamar WHERE id_kamar = :id_kamar");
	$sql->bindParam(':id_kamar', @$id_kamar);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=kamar';
		</script>
	";
	
	break;
	
	}
	
?>