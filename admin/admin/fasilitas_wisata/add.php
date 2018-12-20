<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=fasilitas_wisata&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="nama" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$nama = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM fasilitas_wisata WHERE nama = :nama ");
		$sql->bindParam(':nama', $nama);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input type="text" name="nama" value="<?php echo @$hasil['nama'];?>" placeholder="Ketikkan Nama" <?php if(@$hasil['nama']) echo "disabled"; else echo ""; ?> />
		</td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td>
			<input type="keterangan" name="keterangan" value="<?php echo @$hasil['keterangan'];?>" placeholder="Ketikkan Keterangan" />
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
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=fasilitas_wisata'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>