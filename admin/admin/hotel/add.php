<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=hotel&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_hotel" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_hotel = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM hotel WHERE id_hotel = :id_hotel ");
		$sql->bindParam(':id_hotel', $id_hotel);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input type="text" name="nama" value="<?php echo @$hasil['nama'];?>" placeholder="Ketikkan nama"/>
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>
			<input type="alamat" name="alamat" value="<?php echo @$hasil['alamat'];?>" placeholder="Ketikkan alamat" />
		</td>
	</tr>
	<tr>
		<td>No Telp</td>
		<td>:</td>
		<td>
			<input type="text" name="no_telp" value="<?php echo @$hasil['no_telp'];?>" placeholder="Ketikkan No_Telp" />
		</td>
	</tr>
	<tr>
		<td>Jarak</td>
		<td>:</td>
		<td>
			<input type="text" name="jarak" value="<?php echo @$hasil['jarak'];?>" placeholder="Ketikkan Jarak" />
		</td>
	</tr>
	<tr>
		<td>Foto</td>
		<td>:</td>
		<td>
			<input type="file" name="foto" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=hotel'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>