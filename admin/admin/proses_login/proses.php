<?php
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql=$db->prepare("SELECT * FROM admin WHERE username='$username' AND password='$password'");
	$sql->execute();
	$hasil=$sql->rowCount();
	
	if($hasil>0){
		$_SESSION['username'] = $username;
		echo"
			<script>
				alert('Login berhasil');
				window.location.href='index.php';
			</script>
		";
	}else{
		echo"
			<script>
				alert('Login gagal');
			</script>
		";
	}
	echo"
		<script>
			window.location.href='index.php';
		</script>
	";
?>
