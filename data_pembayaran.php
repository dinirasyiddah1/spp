<?php
include("function.php");


//ambil data data dari URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$bayar = query("SELECT * FROM pembayaran
            INNER JOIN bulan ON pembayaran.id_bulan = bulan.id_bulan
            WHERE NIS 
            ");




//tombol cari ditekan
if(isset($_POST["cari2"])){
	$bayar = cari2($_POST["keyword"]);
}


// $bayar = query("SELECT bulan.id_bulan, 
//         pembayaran.NIS, pembayaran.jatuh_tempo, pembayaran.jumlah_bayar, pembayaran.keterangan,
//         tahun_ajaran.tahun_ajaran 
//         FROM 
//         (bulan LEFT JOIN pembayaran ON bulan.id_bulan = pembayaran.id_bulan)
//         LEFT JOIN tahun_ajaran ON pembayaran.tahun_ajaran = tahun_ajaran.tahun_ajaran
//             WHERE NIS = '19001' 
//             ");




?>

<!DOCTYPE html>
<html>
<head>
<title>Menu</title>
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


<br><br><br>
<div class="container">
<div class="tempat">
    <form action="data_pembayaran.php" method="post">
            Cari Siswa: <input type="text" name="keyword" size=30 autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
                        <button type ="submit" name="cari2">Cari</button>
        </form><br>
<table>
	
	<tr>
        <th>No</th>
        <th>No Bayar</th>
		<th>Jatuh Tempo</th>
		<th>Bulan</th>
		<th>Tanggal Bayar</th>
		<th>Jumlah Bayar</th>
		<th>Keterangan</th>
	</tr>
	
	<?php
    $no=1;
	
	foreach ($bayar as $row) :
	?>

	<tr>
        <td><?=$no++?></td>
        <td><?=$row["NIS"].$row["id_bulan"]?></td>
        <td><?= $row["jatuh_tempo"]?></td>
		<td><?= $row["bulan"]?></td>
		<td><?= $row["tanggal_bayar"]?></td>
		<td><?= rupiah($row["jumlah_bayar"])?></td>
		<td><?= $row["keterangan"]?></td>
	</tr>
	<?php endforeach;?>
</table>
</div>
</div>
	<script src="script.js" type="text/javascript"></script>
</body>
</html>