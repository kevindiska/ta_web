<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Tabel Inbox</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=inbox&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">pengunjung_id</th>
					<th width="10%">pengunjung_tanggal</th>
					<th width="10%">pengunjung_ip</th>
					<th width="10%">pengunjung_perangkat</th>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM tbl_inbox ORDER BY inbox_id ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['pengunjung_id'];?></td>
				<td><?php echo $hasil['pengunjung_tanggal'];?></td>
				<td><?php echo $hasil['pengunjung_ip'];?></td>
				<td><?php echo $hasil['pengunjung_perangkat'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=inbox&action=add&id=<?php echo $hasil['id_inbox'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=inbox&action=proses&id=<?php echo $hasil['id_inbox'];?>&proc=delete'">DELETE</button>
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
