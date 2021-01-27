<?php
include("function.php");

//ambil data data dari URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$bayar = query("SELECT * FROM pembayaran
            INNER JOIN bulan ON pembayaran.id_bulan = bulan.id_bulan
            WHERE NIS = $id 
            ");



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
<title>Detail Pembayaran</title>
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

    <form method="POST" action="detai.php">
        <table>
        <?php
        // $ket = query("SELECT * FROM siswa
        //         INNER JOIN kelas ON siswa.kelas = kelas.kelas
        //         WHERE NIS = '19002' 
        //         ");

        
        // foreach ($ket as $row) :

            

            $query1 = "SELECT * FROM siswa
                    INNER JOIN kelas ON siswa.kelas = kelas.kelas
                    WHERE NIS = $id
                    ";
                $sql1=mysqli_query($conn, $query1) or die (mysqli_error($conn));
                $data1 = mysqli_fetch_assoc($sql1) ;

                
            
	    ?>
            <tr>
                <th style="background-color: white; color: black;">NIS</th>
                <th style="background-color: white; color: black;">:</th>
                <th style="background-color: white; color: black;"><?=$data1["NIS"]?></th>
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;" >Tahun Ajaran</th>
                <th style="background-color: white; color: black;">:</th>
                <?php
                $query = "SELECT * FROM pembayaran
                        INNER JOIN tahun_ajaran ON pembayaran.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran
                        WHERE NIS = $id
                        ";
                $sql=mysqli_query($conn, $query) or die (mysqli_error($conn));
                $data = mysqli_fetch_assoc($sql) ;


                // $tahun_ajaran = query("SELECT tahun_ajaran FROM tahun_ajaran LEFT JOIN pembayaran
                //                     ON tahun_ajaran.id_tahun_ajaran = pembayaran.id_tahun_ajaran
                //                     WHERE id_tahun_ajaran = '1' 
                //                     ");
                // foreach ($tahun_ajaran as $data):
                ?>
                <th style="background-color: white; color: black;"  width="600px"><?=$data["tahun_ajaran"]?></th>
                <?php ?>
            </tr>
            <tr style="background-color:white;">
                <th style="background-color: white; color: black;">Nama</th>
                <th style="background-color: white; color: black;">:</th>
                <th style="background-color: white; color: black;"><?=$data1["nama_siswa"]?></th>
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">Biaya Per Bulan</th>
                <th style="background-color: white; color: black;">:</th>
                <th style="background-color: white; color: black;"width="500px">Rp. 150.000</th>
            </tr>
            <tr>
                <th style="background-color: white; color: black;">Kelas</th>
                <th style="background-color: white; color: black;">:</th>
                <th style="background-color: white; color: black;"><?=$data1["kelas"]?></th>
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;">
                <th style="background-color: white; color: black;" width="200px">Wali_Kelas</th>
                <th style="background-color: white; color: black;">:</th>
                <th style="background-color: white; color: black;"><?=$data1["wali_kelas"]?></th>
            </tr>
        <?php 
       // endforeach; ?>
        </table>

    </form>


</div>
<br><br><br>
<div class="tempat-input">
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
    <tr style="background-color: white; color: black;"><td>
    <button><a href="cetak.php?id=<?=$row["NIS"];?>" target="_blank">Cetak</</button>
    </td><tr>
</table>
</div>


</div>
	<script src="script.js" type="text/javascript"></script>
</body>
</html>