<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=guru&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="nip" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$nip = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM guru WHERE nip = :nip ");
		$sql->bindParam(':nip', $nip);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Nip</td>
		<td>:</td>
		<td>
			<input type="text" name="nip" value="<?php echo @$hasil['nip'];?>" placeholder="Ketikkan Nip" <?php if(@$hasil['nip']) echo "disabled"; else echo ""; ?> />
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td>
			<input type="password" name="password" value="<?php echo @$hasil['password'];?>" placeholder="Ketikkan Password" />
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
		<td>Alamat</td>
		<td>:</td>
		<td>
			<input type="text" name="alamat" value="<?php echo @$hasil['alamat'];?>" placeholder="Ketikkan Alamat" />
		</td>
	</tr>
	<tr>
		<td>Telp</td>
		<td>:</td>
		<td>
			<input type="text" name="telp" value="<?php echo @$hasil['telp'];?>" placeholder="Ketikkan Telp" />
		</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
			<input type="radio" name="jenis_kelamin" value="laki" />Laki
			<input type="radio" name="jenis_kelamin" value="perempuan" />Perempuan
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
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=guru'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>