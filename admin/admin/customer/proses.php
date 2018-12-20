<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_customer = @$_POST['id_customer'];
	@$nama = @$_POST['nama'];
	@$password = @$_POST['password'];
	@$username = @$_POST['username'];
	@$email = @$_POST['email'];
	@$no_hp = @$_POST['no_hp'];
	@$jk = @$_POST['jk'];
	@$alamat = @$_POST['alamat'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO tb_customer(nama, password, username, email, no_hp, jk, alamat) VALUES (:nama, :password, :username, :email, :no_hp, :jk, :alamat)");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':email', @$email);
	$sql->bindParam(':no_hp', @$no_hp);
	$sql->bindParam(':jk', @$jk);
	$sql->bindParam(':alamat', @$alamat);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=customer';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE tb_customer SET nama =:nama, password =:password, username =:username, email =:email, no_hp =:no_hp, jk =:jk, alamat =:alamat  WHERE id_customer = :id_customer");
	$sql->bindParam(':id_customer', @$id_customer);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':email', @$email);
	$sql->bindParam(':no_hp', @$no_hp);
	$sql->bindParam(':jk', @$jk);
	$sql->bindParam(':alamat', @$alamat);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=customer';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_customer = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM tb_customer WHERE id_customer = :id_customer");
	$sql->bindParam(':id_customer', @$id_customer);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=customer';
		</script>
	";
	
	break;
	
	}
	
?>