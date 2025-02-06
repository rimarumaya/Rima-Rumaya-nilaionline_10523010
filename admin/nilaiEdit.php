<?php
include ('../koneksi/koneksi.php');

$getNim = isset($_GET["nim"]) ? $_GET["nim"] : "";
$editMhs = "SELECT m.nim, m.nama, n.nl_tugas, n.nl_uts, n.nl_uas, d.nip, d.nama 
            FROM nilai n
            LEFT JOIN mahasiswa m ON n.nim = m.nim
            LEFT JOIN dosen d ON d.nip = n.nip
            WHERE m.nim = '$getNim'";  // Hanya ambil data mahasiswa tertentu jika sedang edit

$resultMhs = mysqli_query($koneksi, $editMhs);
$dataMhs = mysqli_fetch_array($resultMhs);

// Variabel default untuk input form
$nim = $dataMhs['nim'] ?? "";
$namaMhs = $dataMhs['nama'] ?? "";
$nip = $dataMhs['nip'] ?? "";
$namaDosen = $dataMhs['nama'] ?? "";
$nlTugas = $dataMhs['nl_tugas'] ?? "";
$nlUts = $dataMhs['nl_uts'] ?? "";
$nlUas = $dataMhs['nl_uas'] ?? "";

?>

<h3><?php echo $getNim ? "EDIT" : "TAMBAH"; ?> DATA NILAI</h3>
<br/><hr/><br/>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
        <tr>
            <td height="50">NAMA MAHASISWA</td>
            <td>:</td>
            <td>
                <select name="mhs" class='form-control' required>
                    <option value="">-=PILIH=-</option>
                    <?php
                    $querymhs = "SELECT nim, nama FROM mahasiswa";
                    $resultmhs = mysqli_query($koneksi, $querymhs);
                    while ($datamhs = mysqli_fetch_array($resultmhs, MYSQLI_NUM)) {
                        $selected = ($datamhs[0] == $nim) ? "selected" : "";
                        echo "<option value='$datamhs[0]' $selected>$datamhs[1]</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td height="50">NAMA DOSEN</td>
            <td>:</td>
            <td>
                <select name="dosen" class='form-control' required>
                    <option value="">-=PILIH=-</option>
                    <?php
                    $querydosen = "SELECT nip, nama FROM dosen";
                    $resultdosen = mysqli_query($koneksi, $querydosen);
                    while ($datadosen = mysqli_fetch_array($resultdosen, MYSQLI_NUM)) {
                        $selected = ($datadosen[0] == $nip) ? "selected" : "";
                        echo "<option value='$datadosen[0]' $selected>$datadosen[1]</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>NILAI TUGAS</td>
            <td>:</td>
            <td><input type="number" name="tugas" min="0" max="100" value="<?php echo $nlTugas; ?>" required></td>
        </tr>
        <tr>
            <td>NILAI UTS</td>
            <td>:</td>
            <td><input type="number" name="uts" min="0" max="100" value="<?php echo $nlUts; ?>" required></td>
        </tr>
        <tr>
            <td>NILAI UAS</td>
            <td>:</td>
            <td><input type="number" name="uas" min="0" max="100" value="<?php echo $nlUas; ?>" required></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="submit" type="submit" value="<?php echo $getNim ? "UPDATE" : "TAMBAH"; ?>"></td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['submit'])) {
    $mhs = $_POST["mhs"];
    $dosen = $_POST["dosen"];
    $tugas = $_POST["tugas"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];

    if ($getNim) {
        // Jika sedang edit, gunakan UPDATE
        $queryNilai = "UPDATE nilai SET nl_tugas='$tugas', nl_uts='$uts', nl_uas='$uas', nip='$dosen' WHERE nim='$mhs'";
    } else {
        // Jika sedang tambah data, gunakan INSERT
        $queryNilai = "INSERT INTO nilai (nim, nip, nl_tugas, nl_uts, nl_uas) VALUES ('$mhs', '$dosen', '$tugas', '$uts', '$uas')";
    }

    $executeQuery = mysqli_query($koneksi, $queryNilai);

    if ($executeQuery) {
        echo "<script>alert('Data Nilai Berhasil Disimpan!');</script>";
        echo "<script>window.location='nilaiView.php';</script>";
    } else {
        echo "<script>alert('Data Nilai Gagal Disimpan!');</script>";
        echo "<script>window.location='nilaiView.php';</script>";
    }
}
?>
<a href="./?adm=nilaiView">&raquo; KEMBALI</a>
