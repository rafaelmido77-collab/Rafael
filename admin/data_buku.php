<?php
include "../koneksi.php";
?>

<div class="container mt-4">
<div class="card shadow-lg border-0 rounded-4 p-4">

<h2 class="fw-bold mb-4">📚 Data Buku</h2>

<a href="?halaman=input_buku" class="btn btn-secondary mb-3">
    ➕ Tambah Data Buku
</a>

<!-- FORM SEARCH -->
<form method="GET" class="mb-3">
    <input type="hidden" name="halaman" value="data_buku">

    <div class="row">
        <div class="col-md-10 mb-2">
            <input type="text" name="cari" class="form-control"
            placeholder="Cari judul buku / pengarang..."
            value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
        </div>

        <div class="col-md-2 mb-2">
            <button type="submit" class="btn btn-primary w-100">
                🔍 Cari
            </button>
        </div>
    </div>
</form>

<div class="table-responsive">
<table class="table table-bordered table-hover align-middle">

<thead class="table-light text-center">
<tr>
    <th>No</th>
    <th>Cover</th>
    <th>Judul Buku</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Tahun</th>
    <th>Stok</th>
    <th>Status</th>
    <th>Kelola</th>
</tr>
</thead>

<tbody>

<?php
$no = 1;

if(isset($_GET['cari']) && $_GET['cari'] != ''){
    $cari = $_GET['cari'];

    $ambil = mysqli_query($koneksi,"
        SELECT * FROM buku 
        WHERE judul_buku LIKE '%$cari%'
        OR pengarang LIKE '%$cari%'
        ORDER BY id_buku DESC
    ");
}else{
    $ambil = mysqli_query($koneksi,"
        SELECT * FROM buku 
        ORDER BY id_buku DESC
    ");
}

while($data = mysqli_fetch_array($ambil)){
?>

<tr>

<td class="text-center"><?= $no++; ?></td>

<td class="text-center">
<?php if($data['gambar'] != ''){ ?>
<img src="../cover/<?= $data['gambar']; ?>" width="70" height="90"
style="object-fit:cover; border-radius:8px;">
<?php } else { ?>
<img src="../cover/default.png" width="70" height="90"
style="object-fit:cover; border-radius:8px;">
<?php } ?>
</td>

<td><?= $data['judul_buku']; ?></td>
<td><?= $data['pengarang']; ?></td>
<td><?= $data['penerbit']; ?></td>
<td class="text-center"><?= $data['tahun_terbit']; ?></td>

<td class="text-center">
<span class="badge bg-primary">
<?= $data['stok']; ?>
</span>
</td>

<td class="text-center">
<?php if($data['stok'] > 0){ ?>
<span class="badge bg-success">Tersedia</span>
<?php } else { ?>
<span class="badge bg-danger">Habis</span>
<?php } ?>
</td>

<td class="text-center">

<a href="?halaman=edit_buku&id=<?= $data['id_buku']; ?>"
class="btn btn-warning btn-sm mb-1">
✏ Edit
</a>

<a href="?halaman=hapus_buku&id=<?= $data['id_buku']; ?>"
onclick="return confirm('Yakin hapus data ini?')"
class="btn btn-danger btn-sm">
🗑 Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>
</table>
</div>

</div>
</div>