# 📌 Analisis Kode Portofolio Tika

## 1. Struktur Dasar HTML
```
html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Portofolio Tika</title>
  <style>
    /* CSS ditulis di sini */
  </style>
</head>
```
Bagian ini adalah kerangka utama dokumen HTML. <!DOCTYPE html> menandakan bahwa file ini menggunakan standar HTML5, yang memastikan browser menafsirkan elemen dengan benar. Tag <html lang="id"> memberitahu bahwa bahasa utama halaman adalah Bahasa Indonesia. Di dalam <head> terdapat <meta charset="UTF-8"> agar halaman bisa menampilkan berbagai karakter (huruf, angka, simbol, emoji). <title> menentukan teks yang muncul pada tab browser. Sedangkan <style> berisi aturan CSS internal, jadi semua styling langsung ditulis di dalam file ini tanpa memanggil file CSS terpisah.

# 2. CSS Global dan Body
```
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}

body {
  background: linear-gradient(135deg, #f5c7ce, #f7e3e7);
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}
```
Selector * adalah global reset: semua elemen diatur ulang agar margin dan padding bawaan dihapus. Properti box-sizing: border-box membuat perhitungan lebar/tinggi elemen jadi lebih konsisten. Font default seluruh halaman diubah ke Arial. Pada body, latar belakang diberi gradien linear dengan warna pink lembut sehingga tampak modern. Layout memakai Flexbox dengan justify-content: center dan align-items: center agar konten berada tepat di tengah layar. min-height: 100vh memastikan tinggi body selalu penuh mengikuti layar.

# 3. Container
```
.container {
  width: 85%;
  max-width: 1100px;
  background: white;
  border-radius: 16px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.25);
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
```
.container berfungsi sebagai pembungkus utama semua isi halaman. Lebarnya fleksibel (85%) tapi dibatasi maksimal 1100px agar tetap nyaman dilihat di layar besar. Latar belakang putih memberi kontras dengan gradien body. Sudut kotak dibuat membulat (border-radius: 16px) dan ditambah bayangan (box-shadow) untuk menambah kesan elegan. overflow: hidden mencegah isi meluber keluar batas. Layout diatur dengan flex-direction: column supaya isi tersusun dari atas ke bawah.

# 4. Navigasi
```
<nav>
  <div class="logo">Portofolio Tika</div>
  <ul>
    <li><a href="#" onclick="showSection('home')">Home</a></li>
    <li><a href="#" onclick="showSection('about')">About Me</a></li>
    <li><a href="#" onclick="showSection('funfact')">Fun Fact</a></li>
    <li><a href="#" onclick="showSection('gallery')">Galeri</a></li>
    <li><a href="#" onclick="showSection('contact')">Contact</a></li>
  </ul>
</nav>
```
```
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #f7e3e7;
  padding: 15px 40px;
  border-bottom: 3px solid #f5c7ce;
}

nav .logo {
  font-size: 20px;
  font-weight: bold;
  color: #d96c91;
}

nav ul {
  list-style: none;
  display: flex;
  gap: 25px;
}
```
Navbar menampilkan logo di kiri dan menu navigasi di kanan. Flexbox (justify-content: space-between) menjaga agar logo dan daftar menu memiliki jarak rapi. Latar belakang pink muda dengan garis bawah pink tua memberi identitas visual. Logo diberi ukuran lebih besar dan warna mencolok. Daftar menu (ul) ditata horizontal menggunakan flex, jarak antar item diatur dengan gap. Setiap link menu punya event onclick yang memanggil fungsi JavaScript untuk menampilkan section tertentu.

# 5. Layout Konten
```
.content {
  padding: 40px;
  flex: 1;
}

.section {
  display: none;
  animation: fadeIn 0.6s ease;
}
.active {
  display: block;
}

@keyframes fadeIn {
  from {opacity: 0; transform: translateY(10px);}
  to {opacity: 1; transform: translateY(0);}
}
```
.content berfungsi sebagai wadah isi halaman dengan padding luas. Semua .section disembunyikan (display: none) kecuali yang sedang aktif (.active). Saat section ditampilkan, ada animasi fadeIn yang mengubah opacity dari 0 ke 1 dan sedikit pergeseran posisi agar transisinya lembut.

# 6. Home Section
```
<div id="home" class="section active">
  <h2>Selamat Datang 👋</h2>
  <p>Selamat datang di portofolio pribadi saya...</p>
</div>
```
Section pertama (#home) tampil secara default karena sudah diberi class .active. Judul besar menyapa pengunjung dengan emoji 👋 untuk kesan ramah. Paragraf di bawahnya berisi deskripsi singkat isi website.

# 7.About Me
```
<div id="about" class="section">
  <div class="about-container">
    <img src="tika.jpg" alt="Foto Tika">
    <div class="about-text">
      <h2>Tentang Saya</h2>
      <p>Perkenalkan, nama saya <b>Hartika Ansar</b> ...</p>
    </div>
  </div>
</div>
```
Section ini memperkenalkan pemilik website. Layout memakai CSS Grid dengan dua kolom: foto di kiri (200px) dan teks di kanan (1fr). gap: 30px memberi jarak antar elemen. Foto bisa diberi efek tambahan (border pink, shadow, zoom hover), sedangkan teks diatur agar rata kanan-kiri untuk tampilan rapi. Heading menggunakan warna pink agar konsisten dengan tema.

# 8.Fun Fact
<div id="funfact" class="section">
  <h2>Fun Fact ✨</h2>
  <p>Di sela-sela kesibukan akademik...</p>
  <p>Saya juga memiliki impian...</p>
</div>
```
Bagian ini menampilkan fakta unik. Semua teks disejajarkan ke tengah (text-align: center). Heading menggunakan emoji ✨ untuk memberi kesan ringan dan fun. Biasanya berisi hal personal seperti hobi, kebiasaan, atau mimpi.

# 9. Galeri
```
<div id="gallery" class="section">
  <h2>Galeri 📸</h2>
  <button class="btn-gallery" onclick="toggleGallery()">Lihat Galeri</button>
  <div id="galleryGrid" class="gallery-grid">
    <img src="foto1.jpg" alt="Foto 1">
    <img src="foto2.jpg" alt="Foto 2">
  </div>
</div>
```
Galeri menampilkan foto-foto dalam grid responsif. Defaultnya tersembunyi (display: none) lalu ditampilkan saat tombol ditekan. Grid menggunakan auto-fit dan minmax(200px, 1fr) sehingga jumlah kolom menyesuaikan ukuran layar. Efek hover pada gambar bisa ditambahkan untuk kesan interaktif.

10. Kontak
```
<div id="contact" class="section">
  <h2>Kontak</h2>
  <div class="contact-links">
    <a href="https://wa.me/62822..." target="_blank">WhatsApp</a>
    <a href="https://instagram.com/..." target="_blank">Instagram</a>
  </div>
</div>
```
LBagian kontak menyediakan link ke berbagai platform (WhatsApp, Instagram, LinkedIn, GitHub, Email). Layout flex membuat semua link sejajar dengan jarak seimbang. Tautan biasanya diberi style tombol bundar dengan background pink, dan saat hover sedikit berubah warna atau naik untuk memberikan feedback visual.

# 11. JavaScript
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
JavaScript menambahkan interaktivitas.

- showSection(id) berfungsi untuk navigasi: semua section disembunyikan (remove('active')), lalu hanya section yang dipilih yang ditampilkan (add('active')).
- toggleGallery() dipakai untuk mengontrol galeri: class .active ditambahkan/dihapus secara bergantian sehingga grid foto bisa muncul atau hilang saat tombol ditekan.
