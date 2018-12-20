<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Admin</h1>
	
	
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</th>
					<th width="10%">Username</th>
					<th width="10%">Password</th>
					<th width="10%">Nama</th>
					<th width="10%">Foto</th>
					<th width="10%">JK</th>
					<th width="20%">Option</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM tb_admin");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['username'];?></td>
				<td><?php echo $hasil['nama'];?></td>
				<td><img src="../data/<?php echo $hasil['foto'];?>" /></td>
				<td><?php echo $hasil['jk'];?></td>
				<td>
				</td>
			</tr>
			<?php
				$no++;
				}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>