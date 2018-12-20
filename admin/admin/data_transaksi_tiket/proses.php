<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_data_transaksi = @$_POST['id_data_transaksi'];
	@$tanggal_berangkat = @$_POST['tanggal_berangkat'];
	@$tanggal_pembayaran = @$_POST['tanggal_pembayaran'];
	@$total_pembayaran = @$_POST['total_pembayaran'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO tb_data_transaksi_tiket(tanggal_berangkat, tanggal_pembayaran, total_pembayaran) VALUES (:tanggal_berangkat, :tanggal_pembayaran, :total_pembayaran)");
	$sql->bindParam(':tanggal_berangkat', @$tanggal_berangkat);
	$sql->bindParam(':tanggal_pembayaran', @$tanggal_pembayaran);
	$sql->bindParam(':total_pembayaran', @$total_pembayaran);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=data_transaksi_tiket';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE tb_data_transaksi_tiket SET tanggal_berangkat = :tanggal_berangkat, tanggal_pembayaran = :tanggal_pembayaran, total_pembayaran = :total_pembayaran WHERE id_data_transaksi = :id_data_transaksi");
	$sql->bindParam(':id_data_transaksi', @$id_data_transaksi);
	$sql->bindParam(':tanggal_berangkat', @$tanggal_berangkat);
	$sql->bindParam(':tanggal_pembayaran', @$tanggal_pembayaran);
	$sql->bindParam(':total_pembayaran', @$total_pembayaran);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=data_transaksi_tiket';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_data_transaksi = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM tb_data_transaksi_tiket WHERE id_data_transaksi = :id_data_transaksi");
	$sql->bindParam(':id_data_transaksi', @$id_data_transaksi);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=data_transaksi_tiket';
		</script>
	";
	
	break;
	
	}
	
?>