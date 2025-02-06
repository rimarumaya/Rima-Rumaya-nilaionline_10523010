<?php
include ('../koneksi/koneksi.php');

$nip=$_GET["nip"];
$delMhs         ="DELETE FROM dosen WHERE nip='$nip'";
$resultMhs      =mysqli_query($koneksi, $delMhs);

if($resultMhs)
{
    echo"<script>alert('Data Dosen Berhasil Dihapus') </script>";
    echo"<script type='text/javascript'>window.location='dosenView.php'</script>";
}
else
{
    echo"<script>alert('Data Dosen Gagal Dihapus') </script>";
    echo"<script type='text/javascript'>window.location='dosenView.php'</script>";
}
?>
