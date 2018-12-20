<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Artikel</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=artikel&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</th>
					<th width="10%">Judul</th>
					<th width="10%">isi</th>
					<th width="10%">Foto</th>
					<th width="20%">Option</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM tb_artikel ORDER BY judul ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['judul'];?></td>
				<td><?php echo $hasil['isi'];?></td>
				<td><img src="../data/<?php echo $hasil['foto'];?>" /></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=artikel&action=add&id=<?php echo $hasil['id_artikel'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=artikel&action=proses&id=<?php echo $hasil['id_artikel'];?>&proc=delete'">DELETE</button>
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