<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Galeri</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=galeri&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Id Galeri</td>
					<th width="10%">Judul Galeri</td>
					<th width="10%">Gambar Galeri</td>
					<th width="10%">Album Id</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM galeri ORDER BY id_galeri ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_galeri'];?></td>
				<td><?php echo $hasil['judul_galeri'];?></td>
				<td><img src="../img/galeri/<?php echo $hasil['gambar_galeri'];?>" /></td>
				<td><?php echo $hasil['album_id'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=galeri&action=add&id=<?php echo $hasil['id_galeri'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=galeri&action=proses&id=<?php echo $hasil['id_galeri'];?>&proc=delete'">DELETE</button>
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
