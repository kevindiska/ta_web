<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_artikel = @$_POST['id_artikel'];
	@$judul = @$_POST['judul'];
	@$isi = @$_POST['isi'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO artikel(judul, isi , foto) VALUES (:judul, :isi, :foto)");
	$sql->bindParam(':judul', @$judul);
	$sql->bindParam(':isi', @$isi);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=artikel';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE artikel SET judul = :judul, isi = :isi, foto = :foto WHERE id_artikel = :id_artikel");
	$sql->bindParam(':id_artikel', @$id_artikel);
	$sql->bindParam(':judul', @$judul);
	$sql->bindParam(':isi', @$isi);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=artikel';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_artikel = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM artikel WHERE id_artikel = :id_artikel");
	$sql->bindParam(':id_artikel', @$id_artikel);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=artikel';
		</script>
	";
	
	break;
	
	}
	
?>