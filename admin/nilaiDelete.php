<?php
include ('../koneksi/koneksi.php');

$nim=$_GET["nim"];
$nip=$_GET["nip"];
$delMhs         ="DELETE FROM nilai WHERE nim='$nim' AND nip='$nip'";
$resultMhs      =mysqli_query($koneksi, $delMhs);

if($resultMhs)
{
    echo"<script>alert('Data Nilai Berhasil Dihapus') </script>";
    echo"<script type='text/javascript'>window.location='nilaiView.php'</script>";
}
else
{
    echo"<script>alert('Data Nilai Gagal Dihapus') </script>";
    echo"<script type='text/javascript'>window.location='nilaiView.php'</script>";
}
?>
