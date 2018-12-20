<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_tiket = @$_POST['id_tiket'];
	@$harga = @$_POST['harga'];
	@$keterangan = @$_POST['keterangan'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO tb_tiket(harga, keterangan ) VALUES (:harga, :keterangan)");
	$sql->bindParam(':harga', @$harga);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=tiket';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE tb_tiket SET harga = :harga, keterangan = :keterangan WHERE id_tiket = :id_tiket");
	$sql->bindParam(':id_tiket', @$id_tiket);
	$sql->bindParam(':harga', @$harga);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=tiket';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_tiket = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM tb_tiket WHERE id_tiket = :id_tiket");
	$sql->bindParam(':id_tiket', @$id_tiket);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=tiket';
		</script>
	";
	
	break;
	
	}
	
?>