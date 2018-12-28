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
		$sql=$db->prepare("SELECT * FROM galeri WHERE id_galeri = :id_galeri ");
		$sql->bindParam(':id_galeri', $id_galeri);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>ID Testimoni</td>
		<td>:</td>
		<td>
			<input type="text" name="id_testimoni" value="<?php echo @$hasil['id_testimoni'];?>" placeholder="Ketikkan ID" />
		</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input type="text" name="nama" value="<?php echo @$hasil['nama'];?>" placeholder="Ketikkan Nama" />
		</td>
	</tr>
	<tr>
		<td>E-Mail</td>
		<td>:</td>
		<td>
			<input type="text" name="email" value="<?php echo @$hasil['email'];?>" placeholder="Ketikkan E-mail" />
		</td>
	</tr>
	<tr>
		<td>Pesan</td>
		<td>:</td>
		<td>
			<input type="text" name="pesan" value="<?php echo @$hasil['pesan'];?>" placeholder="Ketikkan Pesan" />
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
