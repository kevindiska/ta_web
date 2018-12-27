<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Berita</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=berita&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Nama</td>
					<th width="10%">id_berita
					<th width="10%">judul
					<th width="10%">isi
					<th width="10%">tgl_post
					<th width="10%">gambar
					<th width="10%">tgl_last_update
					<th width="10%">user
					<th width="10%">views


					<th width="20%">Option</td>

				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM berita ORDER BY id_berita ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['id_berita'];?></td>
				<td><?php echo $hasil['judul'];?></td>
				<td><?php echo $hasil['isi'];?></td>
				<td><?php echo $hasil['tgl_post'];?></td>
				<td><img src="../data/<?php echo $hasil['gambar'];?>" /></td>
				<td><?php echo $hasil['tgl_last_update'];?></td>
				<td><?php echo $hasil['user'];?></td>
				<td><?php echo $hasil['views'];?></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=berita&action=add&id=<?php echo $hasil['id_berita'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=berita&action=proses&id=<?php echo $hasil['id_berita'];?>&proc=delete'">DELETE</button>
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
