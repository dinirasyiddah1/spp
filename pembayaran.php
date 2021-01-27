<?php
include("function.php");

$siswa = query("SELECT * FROM siswa
			INNER JOIN kelas ON siswa.kelas = kelas.kelas");


//tombol cari ditekan
if(isset($_POST["cari"])){
	$siswa = cari($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Pembayaran</title>
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
	<form action="pembayaran.php" method="post">
		Cari Siswa: <input type="text" name="keyword" size=30 autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
					<button type ="submit" name="cari">Cari</button>
	</form><br>

	

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
	
	foreach ($siswa as $row) :
	?>

	<tr>
        <td><?=$no++?></td>
		<td><?= $row["NIS"]?></td>
		<td><?= $row["nama_siswa"]?></td>
		<td><?= $row["kelas"]?></td>
		<td><?= $row["wali_kelas"]?></td>
		<td>
			<button type ="submit" name="bayar"><a href ="form_bayar.php?id=<?=$row["NIS"];?>">Bayar</a></button>
			<button type ="submit" name="bayar"><a href ="detail_bayar.php?id=<?=$row["NIS"];?>">Detail Bayar</a></button>
		</td>
	</tr>
	<?php endforeach;?>
</table>
	</div>
	</div>
	<script src="script.js" type="text/javascript"></script>
</body>
</html>