<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=kamar&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_kamar" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_kamar = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM kamar WHERE id_kamar = :id_kamar ");
		$sql->bindParam(':id_kamar', $id_kamar);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input type="text" name="nama" value="<?php echo @$hasil['nama'];?>" placeholder="Ketikkan nama" />
		</td>
	</tr>
	<tr>
		<td>Foto</td>
		<td>:</td>
		<td>
			<input type="file" name="foto" />
		</td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td>
			<input type="text" name="harga" value="<?php echo @$hasil['harga'];?>" placeholder="Ketikkan harga" />
		</td>
	</tr>
	<tr>
		<td>Fasilitas</td>
		<td>:</td>
		<td>
			<input type="text" name="fasilitas" value="<?php echo @$hasil['fasilitas'];?>" placeholder="Ketikkan fasilitas" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=kamar'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>