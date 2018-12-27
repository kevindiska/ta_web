<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_galeri = @$_POST['id_galeri'];
	@$nama = @$_POST['nama'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	@$keterangan = @$_POST['keterangan'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO galeri(nama,  foto, keterangan) VALUES (:nama,  :foto, :keterangan)");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':foto', @$tujuan);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=galeri';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE galeri SET nama = :nama, foto = :foto, keterangan = :keterangan WHERE id_galeri = :id_galeri");
	$sql->bindParam(':id_galeri', @$id_galeri);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':foto', @$tujuan);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=galeri';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_galeri = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM galeri WHERE id_galeri = :id_galeri");
	$sql->bindParam(':id_galeri', @$id_galeri);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=galeri';
		</script>
	";
	
	break;
	
	}
	
?>