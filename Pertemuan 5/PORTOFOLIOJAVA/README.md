# Analisis Java Script :
```
<script>
  function showSection(id) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(sec => sec.classList.remove('active'));
    document.getElementById(id).classList.add('active');
  }

  function toggleGallery() {
    document.getElementById('galleryGrid').classList.toggle('active');
  }
</script>
```
Kode JavaScript di dalam file tersebut dipakai untuk mengatur interaksi halaman. Fungsi showSection(id) bertugas mengatur tampilan konten sesuai menu yang dipilih. Caranya dengan mencari semua elemen yang memiliki class section, lalu menghapus class active dari masing-masing elemen tersebut. Setelah itu, elemen dengan id sesuai menu yang dipilih akan diberi class active, sehingga hanya bagian itu yang terlihat di layar. Dengan begitu, navigasi antar halaman seperti Home, About Me, Fun Fact, Galeri, dan Contact bisa berjalan mulus tanpa perlu memuat ulang halaman.

Sementara itu, fungsi toggleGallery() digunakan untuk mengatur apakah grid galeri ditampilkan atau disembunyikan. Fungsi ini akan menambahkan atau menghapus class active pada elemen dengan id="galleryGrid". Kalau class active ada, galeri muncul dalam bentuk grid, dan kalau class itu dihapus, galeri otomatis tersembunyi lagi. Interaksi ini dihubungkan melalui tombol "Lihat Galeri" yang punya atribut onclick, sehingga pengguna bisa dengan mudah mengontrol tampilan galeri hanya dengan sekali klik.