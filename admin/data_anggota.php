<h4>👥 Data Anggota</h4>

<a href="?halaman=input_anggota" class="btn btn-secondary mb-3">
    ➕ Tambah Data Anggota
</a>

<!-- FITUR SEARCH -->
<form method="GET" class="mb-3">
    <input type="hidden" name="halaman" value="data_anggota">

    <div style="display:flex; gap:10px;">
        <input type="text" 
               name="keyword" 
               class="form-control"
               placeholder="Cari NIS / Nama / Username / Kelas..."
               value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">

        <button type="submit" class="btn btn-primary">
            🔍 Cari
        </button>

        <a href="?halaman=data_anggota" class="btn btn-danger">
            Reset
        </a>
    </div>
</form>

<table class="table table-bordered mt-3">
    <tr class="fw-bold">
        <td>No</td>
        <td>NIS</td>
        <td>Nama Anggota</td>
        <td>Username</td>
        <td>Password</td>
        <td>Kelas</td>
        <td>Kelola</td>
    </tr>

<?php
$no = 1;
include '../koneksi.php';

if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM anggota 
              WHERE nis LIKE '%$keyword%'
              OR nama_anggota LIKE '%$keyword%'
              OR username LIKE '%$keyword%'
              OR kelas LIKE '%$keyword%'
              ORDER BY id_anggota DESC";
}else{
    $query = "SELECT * FROM anggota ORDER BY id_anggota DESC";
}

$data = mysqli_query($koneksi, $query);

foreach($data as $anggota){ 
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $anggota['nis'] ?></td>
    <td><?= $anggota['nama_anggota'] ?></td>
    <td><?= $anggota['username'] ?></td>
    <td><?= $anggota['password'] ?></td>
    <td><?= $anggota['kelas'] ?></td>
    <td>
        <a class="btn btn-warning btn-sm"
           href="?halaman=edit_anggota&id=<?= $anggota['id_anggota'] ?>">
           📝 Edit
        </a>

        <a class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin data dihapus?')"
           href="?halaman=hapus_anggota&id=<?= $anggota['id_anggota'] ?>">
           🗑️ Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>