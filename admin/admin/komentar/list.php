<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Komentar</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=komentar&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Keterangan</td>
					<th width="10%">Tanggal</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM tb_komentar ORDER BY komentar ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['komentar'];?></td>
				<td><?php echo $hasil['tanggal'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=komentar&action=add&id=<?php echo $hasil['id_komentar'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=komentar&action=proses&id=<?php echo $hasil['id_komentar'];?>&proc=delete'">DELETE</button>
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