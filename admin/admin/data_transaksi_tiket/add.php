<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=data_transaksi_tiket&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_data_transaksi" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_data_transaksi = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM data_transaksi_tiket WHERE id_data_transaksi = :id_data_transaksi ");
		$sql->bindParam(':id_data_transaksi', $id_data_transaksi);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Tanggal_Berangkat</td>
		<td>:</td>
		<td>
			<input type="text" name="tanggal_berangkat" value="<?php echo @$hasil['tanggal_berangkat'];?>" placeholder="Ketikkan tanggal_berangkat" />
		</td>
	</tr>
	<tr>
		<td>Tanggal_Pembayaran</td>
		<td>:</td>
		<td>
			<input type="text" name="tanggal_pembayaran" value="<?php echo @$hasil['tanggal_pembayaran'];?>" placeholder="Ketikkan tanggal_pembayaran" />
		</td>
	</tr>
	<tr>
		<td>Total_Pembayaran</td>
		<td>:</td>
		<td>
			<input type="text" name="total_pembayaran" value="<?php echo @$hasil['total_pembayaran'];?>" placeholder="Ketikkan total_pembayaran" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=data_transaksi_tiket'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>