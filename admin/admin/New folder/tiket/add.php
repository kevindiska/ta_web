<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=tiket&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_tiket" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_tiket = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM tb_tiket WHERE id_tiket = :id_tiket ");
		$sql->bindParam(':id_tiket', $id_tiket);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td>
			<input type="text" name="harga" value="<?php echo @$hasil['harga'];?>" placeholder="Ketikkan harga"  />
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
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=tiket'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>