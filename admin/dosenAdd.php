<?php
    include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA DOSEN</h3>
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
                <td width="27%">NIP</td>
                <td width="4%">:</td>
                <td width="69%">
                    <input type="text" name="nip" size="30" placeholder="NIM">
                </td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td>
                    <input name="nama" type="text" id="nama" size="30" placeholder="NAMA">
                </td>
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
                    <input name="password" type="text" id="password" size="30" placeholder="PASSWORD">
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
    $insertDosen = "INSERT INTO dosen VALUE ('$nip', '$nama', '$kode_mtkul', '$password')";
    $queryDosen  = mysqli_query($koneksi, $insertDosen);

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
