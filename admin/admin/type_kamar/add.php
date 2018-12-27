<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=type_kamar&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_type_kamar" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_type_kamar = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM type_kamar WHERE id_type_kamar = :id_type_kamar ");
		$sql->bindParam(':id_type_kamar', $id_type_kamar);
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
		<td>Keterangan</td>
		<td>:</td>
		<td>
			<input type="keterangan" name="keterangan" value="<?php echo @$hasil['keterangan'];?>" placeholder="Ketikkan keterangan" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=type_kamar'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>