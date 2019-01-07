<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Album</h1>
		<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=album&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Id Album</td>
					<th width="10%">Judul Album</td>
					<th width="10%">Cover</td>
					<th width="10%">Jumlah</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM album ORDER BY id_album ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_album'];?></td>
				<td><?php echo $hasil['judul_album'];?></td>
				<td><img src="../img/album/<?php echo $hasil['cover'];?>" /></td>
				<td><?php echo $hasil['jumlah'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=album&action=add&id=<?php echo $hasil['id_album'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=album&action=proses&id=<?php echo $hasil['id_album'];?>&proc=delete'">DELETE</button>
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
