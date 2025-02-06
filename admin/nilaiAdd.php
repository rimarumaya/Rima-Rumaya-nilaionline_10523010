<?php
    include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA NILAI</h3>
<br/><hr/><br/>

<?php
    if(!isset($_POST['submit'])) {
?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">
            <!-- Pilihan Mahasiswa -->
            <tr>
                <td height="50">NAMA MAHASISWA</td>
                <td>:</td>
                <td>
                    <select name="mhs" class='form-control'>
                        <option value="">-=PILIH=-</option>
                        <?php
                        $querymhs   = "SELECT nim, nama FROM mahasiswa";
                        $resultmhs  = mysqli_query($koneksi, $querymhs);
                        while ($datamhs = mysqli_fetch_assoc($resultmhs)) {
                            echo "<option value='{$datamhs['nim']}'>{$datamhs['nama']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <!-- Pilihan Dosen -->
            <tr>
                <td height="50">NAMA DOSEN</td>
                <td>:</td>
                <td>
                    <select name="dosen" class='form-control'>
                        <option value="">-=PILIH=-</option>
                        <?php
                        $querydosen   = "SELECT nip, nama FROM dosen";
                        $resultdosen  = mysqli_query($koneksi, $querydosen);
                        while ($datadosen = mysqli_fetch_assoc($resultdosen)) {
                            echo "<option value='{$datadosen['nip']}'>{$datadosen['nama']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <!-- Input Nilai -->
            <tr>
                <td>NILAI TUGAS</td>
                <td>:</td>
                <td><input type="number" id="tugas" name="tugas" size="30" placeholder="TUGAS"></td>
            </tr>
            <tr>
                <td>NILAI UTS</td>
                <td>:</td>
                <td><input type="number" id="uts" name="uts" size="30" placeholder="UTS"></td>
            </tr>
            <tr>
                <td>NILAI UAS</td>
                <td>:</td>
                <td><input type="number" id="uas" name="uas" size="30" placeholder="UAS"></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input id="submit" name="submit" type="submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>
<?php
    } else {
        // Ambil Data dari Form
        $mhs   = $_POST["mhs"];
        $dosen = $_POST["dosen"];
        $tugas = $_POST["tugas"];
        $uts   = $_POST["uts"];
        $uas   = $_POST["uas"];

        // Query Insert ke Database
        $insertnilai = "INSERT INTO nilai (nim, nip, nl_tugas, nl_uts, nl_uas) VALUES ('$mhs', '$dosen', '$tugas', '$uts', '$uas')";
        $querynilai = mysqli_query($koneksi, $insertnilai);

        if ($querynilai) {
            echo "<script>alert('Data Nilai Berhasil Disimpan!')</script>";
            echo "<script type='text/javascript'>window.location='nilaiView.php'</script>"; 
        } else {
            echo "<script>alert('Data Nilai Gagal Disimpan!')</script>";
            echo "<script type='text/javascript'>window.location='nilaiView.php'</script>";
        }
    }
?>

<a href="./?adm=nilaiView">&raquo; Kembali</a>
