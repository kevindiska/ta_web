<html>
	<head>
		<title>PANDAWA RESORT</title>
		<link rel="shorcut icon" href="../data/smkn12.png" />
		<link rel="stylesheet" href="../style/backend/css/style.css" />
		<link rel="stylesheet" href="../style/backend/css/bootstrap.css" />
		<meta name="viewport" content="width=device-width, initial-scale=mobile" />
	</head>
	<body>
		<div class="login">
			<div class="login-header">
				<h2>LOGIN<h2>
			</div>
			<form action="index.php?module=proses_login&action=proses" method="POST">
				<div class="login-main">
					<div class="place">
						<table>
							<tr>
								<td>Username</td>
								<td>:</td>
								<td><input type="text" name="username" placeholder="Ketikkan Username" /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td><input type="password" name="password" placeholder="Ketikkan Password" /></td>
							</tr>
						</table>
						<button class="btn btn-primary" onclick="javascript:window.location.href='index.php'">Login</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
