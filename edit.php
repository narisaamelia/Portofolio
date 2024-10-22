<?php
include 'koneksi.php';

if (isset($_GET['id_projek'])) {
    $id_projek = $_GET['id_projek'];
    $result = $koneksi->query("SELECT * FROM data_projek WHERE id_projek = '$id_projek'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_projek = $_POST['id_projek'];
    $nama = $_POST['nama'];
    $nama_projek = $_POST['nama_projek'];
    $tahun = $_POST['tahun'];
    $hasil = $_POST['hasil'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_projek = $_POST['id_projek'];
    $nama = $_POST['nama'];
    $nama_projek = $_POST['nama_projek'];
    $tahun = $_POST['tahun'];
    $hasil = $_POST['hasil'];
}


 $sql = "UPDATE data_projek SET
            id_projek= '$id_projek',
            nama= '$nama',
            nama_projek= '$nama_projek',
            tahun= '$tahun',
            hasil= '$hasil',
        WHERE id_projek='$id_projek'";

if ($connect->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error updating record: " . $connect->error;
}
?>

<form action="" method="post">
    <table>
        <tr>
            <td>ID :</td>
            <td><input type="text" name="id_projek" value="<?= $row['id_projek']; ?>" required></td>
        </tr>
        <tr>
            <td>Nama :</td>
            <td><input type="text" name="nama" value="<?= $row['nama']; ?>" required></td>
        </tr>
        <tr>
            <td>Tahun :</td>
            <td><input type="text" name="tahun" value="<?= $row['tahun']; ?>" required></td>
        </tr>
        <tr>
            <td>Hasil :</td>
            <td><input type="text" name="hasil" value="<?= $row['hasil']; ?>" required></td>
        </tr>
        <tr>
            <td>Tahun:</td>
            <td>
                <select name="tahun" required>
                    <option value="<?= $row['tahun']; ?>" selected><?= $row['tahun']; ?></option>
                    <?php
                    $currentYear = date("Y");
                    for ($year = $currentYear; $year >= 1900; $year--) {
                        echo "<option value='$year'>$year</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>