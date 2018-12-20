<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_type_kamar = @$_POST['id_type_kamar'];
	@$nama = @$_POST['nama'];
	@$keterangan = @$_POST['keterangan'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO tb_type_kamar(nama, keterangan) VALUES (:nama, :keterangan)");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=type_kamar';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE tb_type_kamar SET nama = :nama, keterangan = :keterangan WHERE id_type_kamar = :id_type_kamar");
	$sql->bindParam(':id_type_kamar', @$id_type_kamar);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=type_kamar';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_type_kamar = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM tb_type_kamar WHERE id_type_kamar = :id_type_kamar");
	$sql->bindParam(':id_type_kamar', @$id_type_kamar);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=type_kamar';
		</script>
	";
	
	break;
	
	}
	
?>