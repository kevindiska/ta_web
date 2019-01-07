<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_album = @$_POST['id_album'];
	@$nama = @$_POST['judul_album'];
	@$asal = @$_FILES['cover']['tmp_name'];
	@$tujuan = @$_FILES['cover']['name'];
	@$keterangan = @$_POST['jumlah'];
	
	move_uploaded_file(@$asal, "../img/album".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO album( id_album, judul_album, cover, jumlah) VALUES ( :id_album, :judul_album, :cover, :jumlah)");
	$sql->bindParam(':id_album', @$id_album);
	$sql->bindParam(':judul_album', @$judul_album);
	$sql->bindParam(':cover', @$cover);
	$sql->bindParam(':jumlah', @$jumlah);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=album';
		</script>
	";

	break;
	
	case "edit" :
	
		$sql=$db->prepare("UPDATE album SET id_album = :id_album, judul_album = :judul_album, cover = :cover, jumlah = :jumlah WHERE id_album = :id_album");
	$sql->bindParam(':id_album', @$id_album);
	$sql->bindParam(':judul_album', @$judul_album);
	$sql->bindParam(':cover', @$cover);
	$sql->bindParam(':jumlah', @$jumlah);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=album';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_album = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM album WHERE id_album = :id_album");
	$sql->bindParam(':id_album', @$id_album);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=album';
		</script>
	";
	
	break;
	
	}
	
?>
