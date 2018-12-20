<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=galeri&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_galeri" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_galeri = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM tb_galeri WHERE id_galeri = :id_galeri ");
		$sql->bindParam(':id_galeri', $id_galeri);
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
		<td>Keterangan</td>
		<td>:</td>
		<td>
			<input type="text" name="keterangan" value="<?php echo @$hasil['keterangan'];?>" placeholder="Ketikkan keterangan" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=galeri'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>