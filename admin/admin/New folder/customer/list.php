<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Customer</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=customer&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Nama</td>
					<th width="10%">Password</td>
					<th width="10%">Username</td>
					<th width="10%">Email</td>
					<th width="10%">No_hp</td>
					<th width="10%">Jk</td>
					<th width="10%">Alamat</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM tb_customer ORDER BY nama ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['nama'];?></td>
				<td><?php echo $hasil['password'];?></td>
				<td><?php echo $hasil['username'];?></td>
				<td><?php echo $hasil['email'];?></td>
				<td><?php echo $hasil['no_hp'];?></td>
				<td><?php echo $hasil['jk'];?></td>
				<td><?php echo $hasil['alamat'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=customer&action=add&id=<?php echo $hasil['id_customer'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=customer&action=proses&id=<?php echo $hasil['id_customer'];?>&proc=delete'">DELETE</button>
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