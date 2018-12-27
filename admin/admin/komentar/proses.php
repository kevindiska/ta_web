<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_komentar = @$_POST['id_komentar'];
	@$komentar = @$_POST['komentar'];
	@$tanggal = @$_POST['tanggal'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO komentar(komentar, tanggal) VALUES (:komentar, :tanggal)");
	$sql->bindParam(':komentar', @$komentar);
	$sql->bindParam(':tanggal', @$tanggal);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=komentar';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE komentar SET komentar = :komentar, tanggal = :tanggal WHERE id_komentar = :id_komentar");
	$sql->bindParam(':id_komentar', @$id_komentar);
	$sql->bindParam(':komentar', @$komentar);
	$sql->bindParam(':tanggal', @$tanggal);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=komentar';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_komentar = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM komentar WHERE id_komentar = :id_komentar");
	$sql->bindParam(':id_komentar', @$id_komentar);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=komentar';
		</script>
	";
	
	break;
	
	}
	
?>