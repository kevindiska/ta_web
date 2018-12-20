<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=komentar&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_komentar" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_komentar = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM tb_komentar WHERE id_komentar = :id_komentar ");
		$sql->bindParam(':id_komentar', $id_komentar);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Komentar</td>
		<td>:</td>
		<td>
			<input type="text" name="komentar" value="<?php echo @$hasil['Komentar'];?>" placeholder="Ketikkan Komentar"  />
		</td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td>
			<input type="text" name="tanggal" value="<?php echo @$hasil['tanggal'];?>" placeholder="Ketikkan tanggal"  />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=komentar'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>