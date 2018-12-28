<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Paket</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=galeri&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">id_paket</td>
					<th width="10%">nama_paket</td>
					<th width="10%">harga_dewasa</td>
					<th width="10%">harga_anak</td>
					<th width="10%">deskripsi</td>
					<th width="10%">kategori_id</td>
					<th width="10%">gambar</td>
					<th width="20%">Option</td>
<!--
id_paket
nama_paket
harga_dewasa
harga_anak
deskripsi
kategori_id
gambar
-->
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
