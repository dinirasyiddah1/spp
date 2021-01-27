<?php
include("function.php");
?>	
<!DOCTYPE html>
<html>
<head>
<title>Data Siswa</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css" type="text/css">

</head>
<body>
<div class="ssip"><p class="tulisan-ssip">SISPP</p></div>
    <div class="ssip2"></div>
    <div class="sidebar">
        <a href="siswa.php">Data Siswa</a>
        <a href="pembayaran.php">Pembayaran</a>
        <a href="data_pembayaran.php">Data Pembayaran</a>
    </div>

<div class="container">
	<div class="tempat">
		<h1>Halaman Data Siswa</h1>
		<a href="input_siswa.php">Tambah Data Siswa</a>
		<br><br>
		
<table>
	
	<tr>
        <th>No</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Wali Kelas</th>
		<th>Aksi</th>
	</tr>

	<?php
    $no=1;
	$query = "SELECT * FROM siswa
			INNER JOIN kelas ON siswa.kelas = kelas.kelas";
	$sql=mysqli_query($conn, $query) or die (mysqli_error($conn));
	while ($row = mysqli_fetch_assoc($sql)) :
	?>
	<tr>
        <td><?=$no++?></td>
		<td><?= $row["NIS"]?></td>
		<td><?= $row["nama_siswa"]?></td>
		<td><?= $row["kelas"]?></td>
		<td><?= $row["wali_kelas"]?></td>
		<td>
			<a href="edit.php?id=<?=$row["NIS"];?>">Edit</a> &ensp;
			<a href="hapus.php?id=<?=$row["NIS"];?>" onclick="return confirm('yakin ingin menghapus data &nbsp;<?=$row['nama_siswa']?>?');">Hapus</a>
		</td>
	</tr>
<?php endwhile;?>
</table>
	</div>
	</div>

	<script src="script.js" type="text/javascript"></script>
</body>
</html>