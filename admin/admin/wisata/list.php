<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Wisata</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=wisata&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">id_wisata</th>
					<th width="10%">nama_wisata</th>
					<th width="10%">deskripsi</th>
					<th width="10%">gambar</th>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM wisata ORDER BY id_wisata ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_wisata'];?></td>
				<td><?php echo $hasil['nama_wisata'];?></td>
				<td><?php echo $hasil['deskripsi'];?></td>
				<td><img src="../data/<?php echo $hasil['gambar'];?>" /></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=wisata&action=add&id=<?php echo $hasil['id_wisata'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=wisata&action=proses&id=<?php echo $hasil['id_wisata'];?>&proc=delete'">DELETE</button>
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
