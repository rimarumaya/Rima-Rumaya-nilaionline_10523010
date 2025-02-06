<?php
include ('../koneksi/koneksi.php');

$kode_mtkul=$_GET["kode_mtkul"];
$delMhs         ="DELETE FROM matakuliah WHERE kode_mtkul='$kode_mtkul'";
$resultMhs      =mysqli_query($koneksi, $delMhs);

if($resultMhs)
{
    echo"<script>alert('Data Matakuliah Berhasil Dihapus') </script>";
    echo"<script type='text/javascript'>window.location='./?adm=matakuliahView'</script>";
}
else
{
    echo"<script>alert('Data Matakuliah Gagal Dihapus') </script>";
    echo"<script type='text/javascript'>window.location='./?adm=matakuliahView'</script>";
}
?>
