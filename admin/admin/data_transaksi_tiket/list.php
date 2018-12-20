<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Data Transaksi Tiket</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=data_transaksi_tiket&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Tanggal_Berangkat</td>
					<th width="10%">Tanggal_Pembayaran</td>
					<th width="10%">Total_Pembayaran</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM tb_data_transaksi_tiket ORDER BY tanggal_berangkat ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['tanggal_berangkat'];?></td>
				<td><?php echo $hasil['tanggal_pembayaran'];?></td>
				<td><?php echo $hasil['total_pembayaran'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=data_transaksi_tiket&action=add&id=<?php echo $hasil['id_data_transaksi'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=data_transaksi_tiket&action=proses&id=<?php echo $hasil['id_data_transaksi'];?>&proc=delete'">DELETE</button>
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