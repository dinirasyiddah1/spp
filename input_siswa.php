<?php
include("function.php");

if(isset($_POST["input"])){
    if(input($_POST)>0){
        
        ?>
        
        <script>
            alert('data berhasil ditambah');
            document.location.href='siswa.php';
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
<title>Tambah Data Siswa</title>
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
    <h1 align="center"> Tambah Data Siswa</h1>
        <div class="tempat">
        
        <form action="" method="post">
            <br><br>
            <table> 
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><input type="text" name="NIS" autocomplete="off" required maxlength="5"></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><input type="text" name="nama_siswa" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>
                        <select name="kelas" onchange="changeValue(this.value)">
                            <option selected="selected">-----</option>
                                <?php
                                    $query = "SELECT * FROM kelas
                                        ";
                                    $sql=mysqli_query($conn, $query) or die (mysqli_error($conn));
                                    $jsArray = "var WaliKelas = new Array();\n";	
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                ?>
                            <option  value="<?=$row['kelas']?>" required><?=$row['kelas']?></option>
                            <?php 
                            $jsArray .= "WaliKelas['".$row['kelas']."'] = {satu:'".addslashes($row['wali_kelas'])."'};\n";
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
                        <br><button type="submit" name="input">Input</button><td>
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