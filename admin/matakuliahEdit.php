<?php
    include ('../koneksi/koneksi.php');

    $getkode_mtkul         = $_GET["kode_mtkul"];
    $editMhs               = "SELECT * FROM matakuliah WHERE kode_mtkul = '$getkode_mtkul'";
    $resultMhs             = mysqli_query ($koneksi, $editMhs);
    $dataMhs               = mysqli_fetch_array($resultMhs);
?>

<h3>TAMBAH DATA MATAKULIAH</h3>
<br />
<hr/>
<br/>
<p>
<?php
if (!isset($_POST['submit'])) {
?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">
        <tr>
                <td>KODE MATA KULIAH</td>
                <td>:</td>
                <td>
                    <label>
                        <input type="radio" name="kode_mtkul" value="MK001" id="RadioGroup1_0"> MK001
                    </label>
                    <label>
                        <input type="radio" name="kode_mtkul" value="MK002" id="RadioGroup1_1"> MK002
                    </label>
                </td>
            </tr>
            <tr>
                <td>NAMA MATA KULIAH</td>
                <td>:</td>
                <td>
                    <input name="nama_mtkul" type="text" id="nama_mtkul" size="30" value="<?php echo $dataMhs[1] ?>">
                </td>
            </tr>
            <td>
                    <input id="submit" name="submit" type="submit" value="TAMBAH">
                </td>
        </table>
    </form>
<?php
} else {
    $kode_mtkul        = $_POST["kode_mtkul"];
    $nama_mtkul       = $_POST["nama_mtkul"];
   

    // Input Data matakuliah
    $insertmtkul = "UPDATE matakuliah SET nama_mtkul='$nama_mtkul' WHERE kode_mtkul='$kode_mtkul'";
    $querymatkul  = mysqli_query($koneksi, $insertmtkul);

    if ($querymatkul) {
        echo "<script>alert('Daftar Berhasil Disimpan !')</script>";
        echo "<script type='text/javascript'>window.location ='./?adm=matakuliah'</script>";
    } else {
        echo "<script>alert('Daftar Gagal Disimpan !')</script>";
        echo "<script type='text/javascript'>window.location ='./?adm=matakuliah'</script>";
    }
}
?>
<a href="./?adm=matakuliahView">&raquo; KEMBALI</a>
