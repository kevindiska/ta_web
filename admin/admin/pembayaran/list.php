<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Pembayaran</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=pembayaran&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Id Bayar</th>
					<th width="10%">Tanggal Bayar</th>
					<th width="10%">Metode Id Bayar</th>
					<th width="10%">Order Id</th>
					<th width="10%">Jumlah</th>
					<th width="10%">Pengirim</th>
					<th width="10%">Bukti Transfer</th>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM pembayaran ORDER BY id_bayar ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_bayar'];?></td>
				<td><?php echo $hasil['tgl_bayar'];?></td>
				<td><?php echo $hasil['metode_id_bayar'];?></td>
				<td><?php echo $hasil['order_id'];?></td>
				<td><?php echo $hasil['jumlah'];?></td>
				<td><?php echo $hasil['pengirim'];?></td>
				<td><?php echo $hasil['bukti_transfer'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=pembayaran&action=add&id=<?php echo $hasil['id_pembayaran'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=pembayaran&action=proses&id=<?php echo $hasil['id_pembayaran'];?>&proc=delete'">DELETE</button>
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
