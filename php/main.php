<?php
session_start();
require_once "Petshop.php";

// Pastikan folder img/ ada
if (!is_dir('img')) {
    mkdir('img', 0777, true);
}

// Inisialisasi session jika belum ada
if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [];
}

// Pastikan data dalam session tetap bisa digunakan
$_SESSION['data'] = array_map(function ($obj) {
    return unserialize(serialize($obj));
}, $_SESSION['data']);

// Menangani form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == "add") {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $gambarPath = "img/default.jpg";

        // Cek apakah ada file gambar yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            $targetDir = "img/";
            $fileName = uniqid() . "_" . basename($_FILES['gambar']['name']);
            $targetFilePath = $targetDir . $fileName;
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFilePath)) {
                $gambarPath = $targetFilePath;
            }
        }

        $_SESSION['data'][] = new Petshop($id, $nama, $kategori, $harga, $gambarPath);
    } elseif ($action == "delete") {
        $id = $_POST['id'];
        foreach ($_SESSION['data'] as $key => $produk) {
            if ($produk->getID() == $id) {
                $gambar = $produk->getGambar();
                if ($gambar !== "img/default.jpg" && file_exists($gambar)) {
                    unlink($gambar);
                }
                unset($_SESSION['data'][$key]);
                $_SESSION['data'] = array_values($_SESSION['data']);
                break;
            }
        }
    } elseif ($action == "edit") {
        $id = $_POST['id'];
        foreach ($_SESSION['data'] as $produk) {
            if ($produk->getID() == $id) {
                $produk->setNama($_POST['nama']);
                $produk->setKategori($_POST['kategori']);
                $produk->setHarga($_POST['harga']);

                // Update gambar jika ada unggahan baru
                if (!empty($_FILES['gambar']['name'])) {
                    $targetDir = "img/";
                    $fileName = uniqid() . "_" . basename($_FILES['gambar']['name']);
                    $targetFilePath = $targetDir . $fileName;
                    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFilePath)) {
                        if ($produk->getGambar() !== "img/default.jpg" && file_exists($produk->getGambar())) {
                            unlink($produk->getGambar());
                        }
                        $produk->setGambar($targetFilePath);
                    }
                }
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop Management</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #f4f4f4; }
        form { margin-top: 20px; }
        img { width: 100px; height: auto; }
    </style>
</head>
<body>

    <h2>Daftar Produk Petshop</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($_SESSION['data'] as $produk): ?>
        <tr>
            <td><?= htmlspecialchars($produk->getID()); ?></td>
            <td><?= htmlspecialchars($produk->getNama()); ?></td>
            <td><?= htmlspecialchars($produk->getKategori()); ?></td>
            <td>Rp <?= number_format($produk->getHarga(), 0, ',', '.'); ?></td>
            <td><img src="<?= htmlspecialchars($produk->getGambar()); ?>" alt="Gambar Produk"></td>
            <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($produk->getID()); ?>">
                    <button type="submit" name="action" value="delete">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Tambah Produk</h3>
    <form method="post" enctype="multipart/form-data">
        <label>ID: </label>
        <input type="text" name="id" required><br>
        <label>Nama: </label>
        <input type="text" name="nama" required><br>
        <label>Kategori: </label>
        <input type="text" name="kategori" required><br>
        <label>Harga: </label>
        <input type="number" name="harga" required><br>
        <label>Gambar: </label>
        <input type="file" name="gambar"><br>
        <button type="submit" name="action" value="add">Tambah</button>
    </form>

</body>
</html>
