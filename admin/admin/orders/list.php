<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Orders</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=galeri&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Id Order</td>
					<th width="10%">nama</td>
					<th width="10%">jk</td>
					<th width="10%">alamat</td>
					<th width="10%">no_telp</td>
					<th width="10%">email</td>
					<th width="10%">berangkat</td>
					<th width="10%">kembali</td>
					<th width="10%">adult</td>
					<th width="10%">kids</td>
					<th width="10%">metode_id</td>
					<th width="10%">paket_id_order</td>
					<th width="10%">keterangan</td>
					<th width="10%">tanggal</td>
					<th width="10%">status</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM orders ORDER BY id_order ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_order'];?></td>
				<td><?php echo $hasil['nama'];?></td>
				<td><?php echo $hasil['jk'];?></td>
				<td><?php echo $hasil['alamat'];?></td>
				<td><?php echo $hasil['no_telp'];?></td>
				<td><?php echo $hasil['email'];?></td>
				<td><?php echo $hasil['berangkat'];?></td>
				<td><?php echo $hasil['kembali'];?></td>
				<td><?php echo $hasil['adult'];?></td>
				<td><?php echo $hasil['kids'];?></td>
				<td><?php echo $hasil['metode_id'];?></td>
				<td><?php echo $hasil['paket_id_order'];?></td>
				<td><?php echo $hasil['keterangan'];?></td>
				<td><?php echo $hasil['tanggal'];?></td>
				<td><?php echo $hasil['status'];?></td>
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
