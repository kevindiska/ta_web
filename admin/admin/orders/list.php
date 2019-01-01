<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Orders</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=orders&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">ID Order</td>
					<th width="10%">Nama</td>
					<th width="10%">JK</td>
					<th width="10%">Alamat</td>
					<th width="10%">No Telp</td>
					<th width="10%">E-Mail</td>
					<th width="10%">Berangkat</td>
					<th width="10%">Kembali</td>
					<th width="10%">Adult</td>
					<th width="10%">Kids</td>
					<th width="10%">Metode Id</td>
					<th width="10%">Paket Id Order</td>
					<th width="10%">Keterangan</td>
					<th width="10%">Tanggal</td>
					<th width="10%">Status</td>
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
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=orders&action=add&id=<?php echo $hasil['id_order'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=orders&action=proses&id=<?php echo $hasil['id_order'];?>&proc=delete'">DELETE</button>
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
