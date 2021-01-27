<?php
include("function.php");

//ambil data data dari URL
$id = $_GET["id"];


$query1 = "SELECT * FROM siswa
INNER JOIN kelas ON siswa.kelas = kelas.kelas
WHERE NIS = $id
";
$sql1=mysqli_query($conn, $query1) or die (mysqli_error($conn));
$data1 = mysqli_fetch_assoc($sql1) ;


//query insert data
if(isset($_POST["simpan"])){
   
    // cek apakah data berhasil ditambah atau tidak

    if(tambah($_POST)>0){
        
        ?>
        
        <script>
            alert('data berhasil ditambah');
            document.location.href='detail_bayar.php?id=<?=$id;?>';
        </script>
        
        <?php
    }else{
        ?>
        
        <script>
            alert('data gagal ditambah');
        </script>
        
    <?php
    }
    
    
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Form Pembayaran</title>
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
 <h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Halaman Form Pembayaran</h1>   


<div class="tempat">
<br><br>
     <form action="" method="post">
        <table>
                <tr>
                    <td><label for="NIS">NIS</label></td>
                    <td>:</td>
                    <td><input type="text" name="NIS" value="<?=$data1["NIS"];?>"></td>
                </tr>
               
                <tr>
                    <td>Bulan</td>
                    <td>:</td>
                    <td>
                    <select name="id_bulan" onchange="changeValue(this.value)">
                        <option selected="selected">-----</option>
                            <?php
                                

                                $query = "SELECT * FROM bulan";
                                $sql=mysqli_query($conn, $query) or die (mysqli_error($conn));
                                $jsArray = "var JatuhTempo = new Array();\n";	
                                while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                        <option  value="<?=$row['id_bulan']?>" required><?=$row['bulan']?></option>
                        <?php 
                           $jsArray .= "JatuhTempo['".$row['id_bulan']."'] = {satu:'".addslashes($row['jatuh_tempo'])."'};\n";
                        }; 
                        
                        ?>
                    </select>
                    </td>
                </tr>
                
                    <td>Jatuh Tempo</td>
                    <td>:</td>
                    <td><input type="text" name="jatemp" id="jatemp" value="" autocomplete="off" required/></td>
                    <!-- <td name="jatuh_tempo">10/<?php//$_GET["bulan"]=$data2['bulan'];?>/2019</td> -->
                <tr>
                    <td>Tanggal Bayar</td>
                    <td>:</td>
                    <?php
                        $tgl=date('d-m-y');
                    ?>
                    <td><input type="text" name="tagbayar" value="<?=$tgl?>"/></td>
                </tr>
                <tr>
                    <td>Jumlah Bayar</td>
                    <td>:</td>
                    <td>
                        <label><?= rupiah(150000); ?></label>
                        <input hidden name="jumbayar" value="150000">
                        <!-- <select name="jumbayar">
                            <option selected="selected"  value="150000"></option>
                        </select> -->
                        
                </tr>
                <tr>
                    <td>keterangan</td>
                    <td>:</td>
                    <td><input type="text" name="keterangan" autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td>
                        <select name="id_tahun_ajaran">
                            <option selected="selected">----</option>
                            <?php


                            $query = "SELECT * FROM tahun_ajaran";
                            $sql=mysqli_query($conn, $query) or die (mysqli_error($conn));
                            while ($data = mysqli_fetch_assoc($sql)) {
                                ?>
                            <option  value="<?=$data["id_tahun_ajaran"]?>"><?=$data["tahun_ajaran"]?></option>
                            <?php }  ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    
                    <td style="background-color: white; color: black;"><br>
                    <button type="subimt" name="simpan">Simpan</button>
                </td>
                </tr>
        </table>    
     </form>     
             
</div></div>
	<script src="script.js" type="text/javascript"></script>
    <script type="text/javascript"><?php echo $jsArray; ?>
    function changeValue(id){
    document.getElementById('jatemp').value = JatuhTempo[id].satu;
    };
    </script>
</body>
</html>