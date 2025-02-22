<?php
session_start();
require_once "Petshop.php";

// Inisiasi biar ada satu data  
$_SESSION['data'][] = new Petshop("1", "Ahmad Izzuddin Azzam", "Ganteng", 150000);


// Periksa apakah session berisi data
if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [];
} else {
    // Pastikan data dalam session tidak rusak
    $_SESSION['data'] = array_map(function ($obj) {
        return unserialize(serialize($obj));
    }, $_SESSION['data']);
}

// Menangani form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == "add") {
        $id = $_POST['id']; // ambil id 
        $nama = $_POST['nama'];  // ambil nama 
        $kategori = $_POST['kategori'];  // ambil kategori 
        $harga = $_POST['harga'];  // ambil harga 

        $_SESSION['data'][] = new Petshop($id, $nama, $kategori, $harga); // menambah data baru
    } elseif ($action == "delete") {
        $id = $_POST['id'];
        foreach ($_SESSION['data'] as $key => $produk) {
            if ($produk->getID() == $id) {
                unset($_SESSION['data'][$key]);
                $_SESSION['data'] = array_values($_SESSION['data']); 
                break;
            }
        }
    } elseif ($action == "edit") { // edit data
        $id = $_POST['id'];
        foreach ($_SESSION['data'] as $produk) {
            if ($produk->getID() == $id) { // jika ketemu si datanya
                $produk->setNama($_POST['nama']);
                $produk->setKategori($_POST['kategori']);
                $produk->setHarga($_POST['harga']);
                break; // berhenti jika sudah ketemu
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
            <th>Aksi</th>
        </tr>
        <?php foreach ($_SESSION['data'] as $produk): ?>
        <tr>
            <td><?= $produk->getID(); ?></td>
            <td><?= $produk->getNama(); ?></td>
            <td><?= $produk->getKategori(); ?></td>
            <td>Rp <?= number_format($produk->getHarga(), 0, ',', '.'); ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $produk->getID(); ?>">
                    <button type="submit" name="action" value="delete">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Tambah Produk</h3>
    <form method="post">
        <label>ID: </label>
        <input type="text" name="id" required><br>
        <label>Nama: </label>
        <input type="text" name="nama" required><br>
        <label>Kategori: </label>
        <input type="text" name="kategori" required><br>
        <label>Harga: </label>
        <input type="number" name="harga" required><br>
        <button type="submit" name="action" value="add">Tambah</button>
    </form>

    <h3>Edit Produk</h3>
    <form method="post">
        <label>ID (Yang Mau Diedit): </label>
        <input type="text" name="id" required><br>
        <label>Nama Baru: </label>
        <input type="text" name="nama" required><br>
        <label>Kategori Baru: </label>
        <input type="text" name="kategori" required><br>
        <label>Harga Baru: </label>
        <input type="number" name="harga" required><br>
        <button type="submit" name="action" value="edit">Edit</button>
    </form>

</body>
</html>
