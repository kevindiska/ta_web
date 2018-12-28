<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Metode Bayar</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=metode_bayar&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">id_metode</td>
					<th width="10%">metode</td>
					<th width="10%">bank</td>
					<th width="10%">no_rek</td>
					<th width="10%">atas_nama</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM metode_bayar ORDER BY id_metode ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_metode'];?></td>
				<td><?php echo $hasil['metode'];?></td>
				<td><?php echo $hasil['bank'];?></td>
				<td><?php echo $hasil['no_rek'];?></td>
				<td><?php echo $hasil['atas_nama'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=metode_bayar&action=add&id=<?php echo $hasil['id_metode'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=metode_bayar&action=proses&id=<?php echo $hasil['id_metode'];?>&proc=delete'">DELETE</button>
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
