<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_hotel = @$_POST['id_hotel'];
	@$nama = @$_POST['nama'];
	@$alamat = @$_POST['alamat'];
	@$no_telp = @$_POST['no_telp'];
	@$jarak = @$_POST['jarak'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO tb_hotel(nama, alamat, no_telp, jarak, foto) VALUES (:nama, :alamat, :no_telp, :jarak, :foto)");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':alamat', @$alamat);
	$sql->bindParam(':no_telp', @$no_telp);
	$sql->bindParam(':jarak', @$jarak);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=hotel';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE tb_hotel SET nama = :nama, alamat = :alamat, no_telp = :no_telp, jarak = :jarak, foto = :foto WHERE id_hotel = :id_hotel");
	$sql->bindParam(':id_hotel', @$id_hotel);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':alamat', @$alamat);
	$sql->bindParam(':no_telp', @$no_telp);
	$sql->bindParam(':jarak', @$jarak);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=hotel';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_hotel = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM tb_hotel WHERE id_hotel = :id_hotel");
	$sql->bindParam(':id_hotel', @$id_hotel);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=hotel';
		</script>
	";
	
	break;
	
	}
	
?>