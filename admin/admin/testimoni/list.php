<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Testimoni</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=testimoni&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Id Testimoni</th>
					<th width="10%">Nama</th>
					<th width="10%">Email</th>
					<th width="10%">Pesan</th>
					<th width="10%">Status</th>
					<th width="10%">Tangal Post</th>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM testimoni ORDER BY id_testimoni ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_testimoni'];?></td>
				<td><?php echo $hasil['nama'];?></td>
				<td><?php echo $hasil['email'];?></td>
				<td><?php echo $hasil['pesan'];?></td>
				<td><?php echo $hasil['status'];?></td>
				<td><?php echo $hasil['tgl_post'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=testimoni&action=add&id=<?php echo $hasil['id_testimoni'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=testimoni&action=proses&id=<?php echo $hasil['id_testimoni'];?>&proc=delete'">DELETE</button>
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
