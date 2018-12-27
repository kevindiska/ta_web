<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=wisata&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_wisata" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_wisata = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM wisata WHERE id_wisata = :id_wisata ");
		$sql->bindParam(':id_wisata', $id_wisata);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Nama Wisata</td>
		<td>:</td>
		<td>
			<input type="text" name="nama_wisata" value="<?php echo @$hasil['nama_wisata'];?>" placeholder="Ketikkan nama_wisata" />
		</td>
	</tr>
	<tr>
		<td>Alamat WIsata</td>
		<td>:</td>
		<td>
			<input type="text" name="alamat_wisata" value="<?php echo @$hasil['alamat_wisata'];?>" placeholder="Ketikkan alamat_wisata" />
		</td>
	</tr>
	<tr>
		<td>Jam Oprasional</td>
		<td>:</td>
		<td>
			<input type="text" name="jam_oprasional" value="<?php echo @$hasil['jam_oprasional'];?>" placeholder="Ketikkan jam_oprasional" />
		</td>
	</tr>
	<tr>
		<td>Keterangan Wisata</td>
		<td>:</td>
		<td>
			<input type="text" name="ket_wisata" value="<?php echo @$hasil['ket_wisata'];?>" placeholder="Ketikkan ket_wisata" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=wisata'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>