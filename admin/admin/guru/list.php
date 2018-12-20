<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Guru</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=guru&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Nip</td>
					<th width="10%">Nama</td>
					<th width="10%">Alamat</td>
					<th width="10%">Telp</td>
					<th width="10%">Jenis Kelamin</td>
					<th width="10%">Foto</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM guru ORDER BY nip ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['nip'];?></td>
				<td><?php echo $hasil['nama'];?></td>
				<td><?php echo $hasil['alamat'];?></td>
				<td><?php echo $hasil['telp'];?></td>
				<td><?php echo $hasil['jenis_kelamin'];?></td>
				<td><img src="../data/<?php echo $hasil['foto'];?>" /></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=guru&action=add&id=<?php echo $hasil['nip'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=guru&action=proses&id=<?php echo $hasil['nip'];?>&proc=delete'">DELETE</button>
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