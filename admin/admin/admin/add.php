<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=admin&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="username" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$username = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM admin WHERE username = :username ");
		$sql->bindParam(':username', $username);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td>
			<input type="text" name="username" value="<?php echo @$hasil['username'];?>" placeholder="Ketikkan Username" />
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
		<td>JK</td>
		<td>:</td>
		<td>
<<<<<<< HEAD
			<input type="radio" name="jk" <?php if (isset($jk) && $gender=="L") echo "checked";?> value="L">Laki-laki
			<input type="radio" name="jk" <?php if (isset($jk) && $gender=="P") echo "checked";?> value="P">Perempuan
=======
			<input type="radio" name="jk" value="L" /> Laki-laki
			<input type="radio" name="jk" value="P" /> Perempuan
>>>>>>> master
		</td>
	</tr>
	<tr>
		<td>Level</td>
		<td>:</td>
		<td>
			<select name="level">
				<option value=""></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Foto</td>
		<td>:</td>
		<td>
			<input type="file" name="photo" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=admin'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>
