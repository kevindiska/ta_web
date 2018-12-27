<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Kamar</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=kamar&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Nama</td>
					<th width="10%">Foto</td>
					<th width="10%">Harga</td>
					<th width="10%">Fasilitas</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM kamar ORDER BY nama ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['nama'];?></td>
				<td><img src="../data/<?php echo $hasil['foto'];?>" /></td>
				<td><?php echo $hasil['harga'];?></td>
				<td><?php echo $hasil['fasilitas'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=kamar&action=add&id=<?php echo $hasil['id_kamar'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=kamar&action=proses&id=<?php echo $hasil['id_kamar'];?>&proc=delete'">DELETE</button>
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