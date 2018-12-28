<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Tabel Inbox</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=tbl_inbox&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">inbox_id</th>
					<th width="10%">inbox_nama</th>
					<th width="10%">inbox_email</th>
					<th width="10%">inbox_kontak</th>
					<th width="10%">inbox_pesan</th>
					<th width="10%">inbox_tanggal</th>
					<th width="10%">inbox_status</th>
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
				<td><?php echo $hasil['inbox_id'];?></td>
				<td><?php echo $hasil['inbox_nama'];?></td>
				<td><?php echo $hasil['inbox_email'];?></td>
				<td><?php echo $hasil['inbox_kontak'];?></td>
				<td><?php echo $hasil['inbox_pesan'];?></td>
				<td><?php echo $hasil['inbox_tanggal'];?></td>
				<td><?php echo $hasil['inbox_status'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=tbl_inbox&action=add&id=<?php echo $hasil['id_tbl_inbox'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=tbl_inbox&action=proses&id=<?php echo $hasil['id_tbl_inbox'];?>&proc=delete'">DELETE</button>
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
