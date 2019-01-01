<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Kategori Paket</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=kategori_paket&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">ID Kategori</td>
					<th width="10%">Kategori</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM kategori_paket ORDER BY id_kategori ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_kategori'];?></td>
				<td><?php echo $hasil['kategori'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=kategori_paket&action=add&id=<?php echo $hasil['id_kategori'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=kategori_paket&action=proses&id=<?php echo $hasil['id_kategori'];?>&proc=delete'">DELETE</button>
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
