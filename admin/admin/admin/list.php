<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Admin</h1>
		<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=admin&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			</tr>
				<tr>
					<th width="1%">No</th>
					<th width="10%">ID Admin</th>
					<th width="10%">Nama</th>
					<th width="10%">Username</th>
					<th width="10%">Level</th>
					<th width="10%">Foto</th>
					<th width="20%">Option</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM admin");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_admin'];?></td>
				<td><?php echo $hasil['nama'];?></td>
				<td><?php echo $hasil['username'];?></td>
				<td><?php echo $hasil['level'];?></td>
				<td><img src="../../data/<?php echo $hasil['foto'];?>" /></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=admin&action=add&id=<?php echo $hasil['id_admin'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=admin&action=proses&id=<?php echo $hasil['id_admin'];?>&proc=delete'">DELETE</button>
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
