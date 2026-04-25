<?php
include "../koneksi.php";

/* ===============================
   AMBIL DATA BERDASARKAN ID
=================================*/
$id = $_GET['id'];

$ambil = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id'");
$data = mysqli_fetch_array($ambil);


/* ===============================
   UPDATE DATA BUKU
=================================*/
if(isset($_POST['simpan'])){

    $judul      = mysqli_real_escape_string($koneksi,$_POST['judul_buku']);
    $pengarang  = mysqli_real_escape_string($koneksi,$_POST['pengarang']);
    $penerbit   = mysqli_real_escape_string($koneksi,$_POST['penerbit']);
    $tahun      = date('Y', strtotime($_POST['tahun_terbit']));
    $stok       = $_POST['stok'];

    /* cek upload gambar baru */
    if($_FILES['gambar']['name'] != ''){

        $namaFile = $_FILES['gambar']['name'];
        $tmpFile  = $_FILES['gambar']['tmp_name'];
        $ext      = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        $valid = ['jpg','jpeg','png','webp'];

        if(in_array($ext,$valid)){

            $namaBaru = time().rand(100,999).".".$ext;

            move_uploaded_file($tmpFile,"../cover/".$namaBaru);

            // hapus gambar lama
            if(file_exists("../cover/".$data['gambar'])){
                unlink("../cover/".$data['gambar']);
            }

            mysqli_query($koneksi,"UPDATE buku SET
            judul_buku   ='$judul',
            pengarang    ='$pengarang',
            penerbit     ='$penerbit',
            tahun_terbit ='$tahun',
            stok         ='$stok',
            gambar       ='$namaBaru'
            WHERE id_buku='$id'");

        }

    }else{

        mysqli_query($koneksi,"UPDATE buku SET
        judul_buku   ='$judul',
        pengarang    ='$pengarang',
        penerbit     ='$penerbit',
        tahun_terbit ='$tahun',
        stok         ='$stok'
        WHERE id_buku='$id'");

    }

    echo "
    <script>
        alert('Data Buku Berhasil Diupdate!');
        window.location='dashboard.php?halaman=data_buku';
    </script>
    ";
}
?>

<div class="container mt-4">
<div class="card shadow-lg border-0 rounded-4 p-4">

<h2 class="fw-bold mb-4">📚 Edit Data Buku</h2>

<form method="POST" enctype="multipart/form-data">

    <!-- Judul -->
    <div class="mb-3">
        <input type="text" name="judul_buku"
        class="form-control form-control-lg"
        value="<?= $data['judul_buku']; ?>" required>
    </div>

    <!-- Pengarang -->
    <div class="mb-3">
        <input type="text" name="pengarang"
        class="form-control form-control-lg"
        value="<?= $data['pengarang']; ?>" required>
    </div>

    <!-- Penerbit -->
    <div class="mb-3">
        <input type="text" name="penerbit"
        class="form-control form-control-lg"
        value="<?= $data['penerbit']; ?>" required>
    </div>

    <!-- Tahun -->
    <div class="mb-3">
        <input type="date" name="tahun_terbit"
        class="form-control form-control-lg"
        value="<?= $data['tahun_terbit']; ?>" required>
    </div>

    <!-- STOK -->
    <div class="mb-3">
        <input type="number" name="stok"
        class="form-control form-control-lg"
        value="<?= $data['stok']; ?>" required>
    </div>

    <!-- Gambar Lama -->
    <div class="mb-3 text-center">
        <img src="../cover/<?= $data['gambar']; ?>"
        id="preview"
        width="150"
        height="220"
        style="object-fit:cover;border-radius:10px;border:2px solid #ddd;">
    </div>

    <!-- Upload Gambar Baru -->
    <div class="mb-3">
        <label class="fw-bold mb-2">📷 Ganti Cover Buku</label>
        <input type="file" name="gambar"
        class="form-control form-control-lg"
        accept="image/*"
        onchange="previewImage(event)">
    </div>

    <!-- Tombol -->
    <button type="submit" name="simpan"
    class="btn btn-primary px-4 fw-bold">
        💾 SIMPAN
    </button>

</form>
</div>
</div>

<script>
function previewImage(event){
    let reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>