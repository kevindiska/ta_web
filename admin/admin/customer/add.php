<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=customer&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_customer" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_customer = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM tb_customer WHERE id_customer = :id_customer ");
		$sql->bindParam(':id_customer', $id_customer);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input type="text" name="nama" value="<?php echo @$hasil['nama'];?>" placeholder="Ketikkan nama"  />
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
		<td>Username</td>
		<td>:</td>
		<td>
			<input type="text" name="username" value="<?php echo @$hasil['username'];?>" placeholder="Ketikkan username" />
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td>
			<input type="text" name="email" value="<?php echo @$hasil['email'];?>" placeholder="Ketikkan email" />
		</td>
	</tr>
	<tr>
		<td>No_hp</td>
		<td>:</td>
		<td>
			<input type="text" name="no_hp" value="<?php echo @$hasil['no_hp'];?>" placeholder="Ketikkan no_hp" />
		</td>
	</tr>
	<tr>
		<td>Jk</td>
		<td>:</td>
		<td>
			<input type="text" name="jk" value="<?php echo @$hasil['jk'];?>" placeholder="Ketikkan jk" />
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>
			<input type="text" name="alamat" value="<?php echo @$hasil['alamat'];?>" placeholder="Ketikkan alamat" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=customer'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>