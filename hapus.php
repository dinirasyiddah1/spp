<?php
require('function.php');

$id = $_GET["id"];

if(hapus($id)>0){
    ?>
        
    <script>
        alert('data berhasil dihapus');
        document.location.href='siswa.php';
    </script>
    
    <?php
}else{
    ?>
    
    <script>
        alert('data gagal dihapus');
        document.location.href='siswa.php';
    </script>
    
<?php
}
?>