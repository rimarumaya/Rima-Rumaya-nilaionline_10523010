<?php
    include "../koneksi/koneksi.php";

    $queryMhs   = "SELECT * FROM matakuliah";
    $resultMhs  = mysqli_query($koneksi, $queryMhs);
    $countMhs   = mysqli_num_rows($resultMhs);
?>
<h3 align="center">DATA MAHASISWA</h3>
<hr/><br/>
<a href="./?adm=matakuliahAdd">
    <input type="submit" name="add" value="TAMBAH DATA MATAKULIAH" class="buttonadm"/>
</a>
<br><br>
<table border="1">
    <!--TABEL MASTER MATAKULIAH-->
    <tr>
        <th>KODE MATKUL</th>
        <th>NAMA MATKUL</th>
        <th>AKSI</th>
    </tr>
    <?php
        if ($countMhs > 0) {
            while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
    ?>
    <tr class="add">
        <td class="value"><?php echo "$dataMhs[0]"; ?></td>
        <td class="value"><?php echo "$dataMhs[1]"; ?></td>
        <td class="value">
            <a href="./?adm=matakuliahEdit&kode_mtkul=<?php echo "$dataMhs[0]"; ?>">Edit</a> | 
            <a href="./?adm=matakuliahDelete&kode_mtkul=<?php echo "$dataMhs[0]"; ?>">Hapus</a>
        </td>
    </tr>
    <?php
            }
        } else {
            echo "<tr>
                    <td colspan='6' align='center' height='20'>
                        <div>Belum ada Data matakuliah</div>
                    </td>
                  </tr>";
        }
    ?>
</table>
