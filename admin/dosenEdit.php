<?php
    include ('../koneksi/koneksi.php');

    $getNip         = $_GET["nip"];
    $editMhs        = "SELECT * FROM dosen WHERE nip = '$getNip'";
    $resultMhs      = mysqli_query ($koneksi, $editMhs);
    $dataMhs        = mysqli_fetch_array($resultMhs);
?>

<h3>TAMBAH DATA DOSEN</h3>
<br/>
<hr/>
<br/>
<p>
<?php
if (!isset($_POST['submit'])) {
?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">
            <tr>
                <td width="27%">NIP</td>
                <td width="4%">:</td>
                <td width="69%">
                    <input type="text" name="nip" size="30"  value="<?php echo $dataMhs[0] ?>"
                    readonly="readonly">
                </td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td>
                    <input name="nama" type="text" id="nama" size="30" value="<?php echo $dataMhs[1] ?>">
            </tr>
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
                <td>PASSWORD</td>
                <td>:</td>
                <td>
                    <input name="password" type="text" id="password" size="30" value="<?php echo $dataMhs[3] ?>">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <input id="submit" name="submit" type="submit" value="TAMBAH">
                </td>
            </tr>
        </table>
    </form>
<?php
} else {
    $nip        = $_POST["nip"];
    $nama       = $_POST["nama"];
    $kode_mtkul = $_POST["kode_mtkul"];
    $password   = md5($_POST["password"]);

    // Input Data Dosen
    $updateDosen="UPDATE dosen SET nama='$nama',kode_mtkul='$kode_mtkul',password='$password' WHERE nip='$nip'";
    $queryDosen  = mysqli_query($koneksi, $updateDosen);

    if ($queryDosen) {
        echo "<script>alert('Daftar Berhasil Disimpan !')</script>";
        echo "<script type='text/javascript'>window.location ='dosenView.php'</script>";
    } else {
        echo "<script>alert('Daftar Gagal Disimpan !')</script>";
        echo "<script type='text/javascript'>window.location ='dosenView.php'</script>";
    }
}
?>
<a href="./?adm=dosenView">&raquo; KEMBALI</a>
