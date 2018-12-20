<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_fasilitas = @$_POST['id_fasilitas'];
	@$nama = @$_POST['nama'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	@$keterangan = @$_POST['keterangan'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO tb_fasilitas(nama, foto, keterangan) VALUES (:nama, :foto, :keterangan)");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':foto', @$tujuan);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=fasilitas';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE tb_fasilitas SET nama = :nama, foto = :foto, keterangan = :keterangan WHERE id_fasilitas = :id_fasilitas");
	$sql->bindParam(':id_fasilitas', @$id_fasilitas);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':foto', @$tujuan);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=fasilitas';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_fasilitas = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM tb_fasilitas WHERE id_fasilitas = :id_fasilitas");
	$sql->bindParam(':id_fasilitas', @$id_fasilitas);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=fasilitas';
		</script>
	";
	
	break;
	
	}
	
?>