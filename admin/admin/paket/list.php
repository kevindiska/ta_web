<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Paket</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=paket&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">ID Paket</td>
					<th width="10%">Nama paket</td>
					<th width="10%">Harga Dewasa</td>
					<th width="10%">Harga Anak</td>
					<th width="10%">Deskripsi</td>
					<th width="10%">Kategori ID</td>
					<th width="10%">Gambar</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM paket ORDER BY id_paket ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_paket'];?></td>
				<td><?php echo $hasil['nama_paket'];?></td>
				<td><?php echo $hasil['harga_dewasa'];?></td>
				<td><?php echo $hasil['harga_anak'];?></td>
				<td><?php echo $hasil['deskripsi'];?></td>
				<td><?php echo $hasil['kategori_id'];?></td>
				<td><img src="../data/<?php echo $hasil['gambar'];?>" /></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=paket&action=add&id=<?php echo $hasil['id_paket'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=paket&action=proses&id=<?php echo $hasil['id_paket'];?>&proc=delete'">DELETE</button>
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
