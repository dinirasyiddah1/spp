<?php
include("function.php");

//ambil data data dari URL
$id = $_GET["id"];

$siswa = query ("SELECT * FROM siswa WHERE NIS = '$id'")[0];

if(isset($_POST["input"])){
    if(edit($_POST)>0){
        
        ?>
        
        <script>
            alert('data berhasil diubah');
            document.location.href='siswa.php';
        </script>
        
        <?php
    }else{
        ?>
        
        <script>
            alert('data gagal diubah');
        </script>
        
    <?php
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Ubah Data Siswa</title>
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
    <h1 align="center"> Ubah Data Siswa</h1>
        <div class="tempat">
        
        <form action="" method="post">
            <br><br>
            <table> 
            
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><input type="text" name="NIS" value="<?=$siswa["NIS"];?>" autocomplete="off" required ></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><input type="text" name="nama_siswa" value="<?=$siswa["nama_siswa"];?>" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>
                        <select name="kelas" onchange="changeValue(this.value)">
                            <option selected="selected">--------</option>
                                <?php
                                    

                                    $queryy = "SELECT * FROM kelas";
                                    $sqly=mysqli_query($conn, $queryy) or die (mysqli_error($conn));
                                    $jsArray = "var WaliKelas = new Array();\n";	
                                    while ($rowy = mysqli_fetch_assoc($sqly)) {
                                ?>
                            <option  value="<?=$rowy['kelas']?>" required><?=$rowy['kelas']?></option>
                            <?php 
                            $jsArray .= "WaliKelas['".$rowy['kelas']."'] = {satu:'".addslashes($rowy['wali_kelas'])."'};\n";
                            }; 
                            
                            ?>
                        </select>
                    
                </tr>
                <tr>
                    <td>Wali Kelas</td>
                    <td>:</td>
                    
                    <td><input type="text" name="wali_kelas" id="wali_kelas" autocomplete="off" required></td>
                   
                </tr>
                <tr>
                    <td>
                        <br><button type="submit" name="input">Ubah</button><td>
                </tr>   
                </table>
        </div>
    </div>

    <script src="script.js" type="text/javascript"></script>
    <script type="text/javascript"><?php echo $jsArray; ?>
    function changeValue(id){
    document.getElementById('wali_kelas').value = WaliKelas[id].satu;
    };
    </script>
</body>
</html>