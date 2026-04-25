<?php
include "../koneksi.php";

/* ===============================
   SIMPAN DATA BUKU + FOTO + STOK
=================================*/
if(isset($_POST['simpan'])){

    $judul      = mysqli_real_escape_string($koneksi,$_POST['judul_buku']);
    $pengarang  = mysqli_real_escape_string($koneksi,$_POST['pengarang']);
    $penerbit   = mysqli_real_escape_string($koneksi,$_POST['penerbit']);
    $tahun      = date('Y', strtotime($_POST['tahun_terbit']));
    $stok       = $_POST['stok'];

    /* Upload Gambar */
    $namaFile   = $_FILES['gambar']['name'];
    $tmpFile    = $_FILES['gambar']['tmp_name'];
    $sizeFile   = $_FILES['gambar']['size'];
    $error      = $_FILES['gambar']['error'];

    $extValid   = ['jpg','jpeg','png','webp'];
    $ext        = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if($error === 0){

        if(in_array($ext, $extValid)){

            if($sizeFile < 3000000){

                $namaBaru = time().rand(100,999).".".$ext;

                move_uploaded_file($tmpFile,"../cover/".$namaBaru);

                mysqli_query($koneksi,"INSERT INTO buku
                (judul_buku,pengarang,penerbit,tahun_terbit,gambar,stok,status)
                VALUES
                ('$judul','$pengarang','$penerbit','$tahun','$namaBaru','$stok','tersedia')
                ");

                echo "
                <script>
                    alert('Data Buku Berhasil Ditambahkan!');
                    window.location='dashboard.php?halaman=data_buku';
                </script>
                ";

            }else{
                echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
            }

        }else{
            echo "<script>alert('Format gambar harus JPG / PNG / WEBP');</script>";
        }

    }else{
        echo "<script>alert('Silahkan pilih gambar buku');</script>";
    }
}
?>

<div class="container mt-4">
<div class="card shadow-lg border-0 rounded-4 p-4">

<h2 class="fw-bold mb-4">📚 Tambah Data Buku</h2>

<form method="POST" enctype="multipart/form-data">

    <!-- Judul -->
    <div class="mb-3">
        <input type="text" name="judul_buku"
        class="form-control form-control-lg"
        placeholder="Masukan Judul Buku" required>
    </div>

    <!-- Pengarang -->
    <div class="mb-3">
        <input type="text" name="pengarang"
        class="form-control form-control-lg"
        placeholder="Masukan Pengarang" required>
    </div>

    <!-- Penerbit -->
    <div class="mb-3">
        <input type="text" name="penerbit"
        class="form-control form-control-lg"
        placeholder="Masukan Penerbit" required>
    </div>

    <!-- Tahun -->
    <div class="mb-3">
        <input type="date" name="tahun_terbit"
        class="form-control form-control-lg" required>
    </div>

    <!-- STOK -->
    <div class="mb-3">
        <input type="number" name="stok"
        class="form-control form-control-lg"
        placeholder="Masukan Stok Buku" required>
    </div>

    <!-- Upload Gambar -->
    <div class="mb-3">
        <label class="fw-bold mb-2">📷 Upload Cover Buku</label>
        <input type="file" name="gambar"
        class="form-control form-control-lg"
        accept="image/*"
        onchange="previewImage(event)" required>
    </div>

    <!-- Preview -->
    <div class="mb-3 text-center">
        <img id="preview"
        src="https://via.placeholder.com/150x220?text=Preview"
        style="width:150px;height:220px;object-fit:cover;
        border-radius:10px;border:2px solid #ddd;">
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