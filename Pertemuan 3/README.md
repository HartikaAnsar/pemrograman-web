# ANALISIS PORTOFOLIO TIKA
``` <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Portofolio Tika</title>
  <style>
```
Kode ini digunakan untuk mendefinisikan struktur awal dokumen website. <!DOCTYPE html> memberi tahu browser bahwa dokumen ini memakai standar HTML5. Tag <html lang="id"> dipakai untuk menandakan bahwa bahasa utama isi halaman adalah Bahasa Indonesia, sehingga mesin pencari dan pembaca layar bisa menyesuaikan. Di dalam <head>, terdapat <meta charset="UTF-8"> yang mengatur format teks agar mendukung berbagai karakter termasuk huruf Indonesia dan emoji. Tag <title> berfungsi memberi judul di tab browser, yaitu "Portofolio Tika". Sedangkan <style> menandakan bahwa kode CSS untuk mendesain tampilan halaman akan ditulis langsung di dalam file HTML ini.
``` body {
  background: #f5c7ce;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}
```
Kode ini digunakan untuk mengatur tampilan dasar dari seluruh halaman. Latar belakang (background) diberi warna pink muda dengan kode hex #f5c7ce untuk menciptakan kesan lembut dan feminin. display: flex menjadikan halaman memakai Flexbox layout, sebuah sistem tata letak modern di CSS. Properti justify-content: center membuat konten di dalam halaman berada di tengah secara horizontal, sedangkan align-items: center membuatnya berada di tengah secara vertikal. Dengan tambahan min-height: 100vh, tinggi halaman dibuat minimal sama dengan tinggi layar, sehingga konten selalu tampil penuh satu layar meskipun isinya sedikit.
``` <nav>
  <a href="#" onclick="showSection('home')">Home</a>
  <a href="#" onclick="showSection('about')">About Me</a>
  <a href="#" onclick="showSection('funfact')">Fun Fact</a>
  <a href="#" onclick="showSection('contact')">Contact</a>
</nav>
```
Kode ini digunakan untuk membuat menu navigasi di bagian atas halaman. Tag <nav> berfungsi sebagai pembungkus elemen navigasi. Di dalamnya terdapat beberapa link (<a>) yaitu Home, About Me, Fun Fact, Contact. Masing-masing link memiliki atribut onclick="showSection('id')" yang memanggil fungsi JavaScript showSection dengan parameter id section yang ingin ditampilkan. Dengan mekanisme ini, ketika pengguna mengklik salah satu menu, konten di layar akan berganti tanpa perlu memuat ulang halaman.
```<div id="home" class="section active">
  <h2>haiii, kenalan yukss</h2>
  <p>cuman manusia biasa yang mimpinya pengen kaya tapi rebahan terus 🤭🫶🏻</p>
</div>```
Kode ini digunakan untuk menampilkan halaman Home. Tag <div> diberi id="home" agar bisa diakses oleh JavaScript saat navigasi dilakukan. Class section menandakan bahwa bagian ini adalah salah satu section dari halaman, sedangkan tambahan class active membuatnya tampil pertama kali saat halaman dibuka. Isi section berupa heading <h2> berisi sapaan "haiii, kenalan yukss", dan paragraf <p> yang memberi kesan santai dan personal dengan gaya bahasa sehari-hari.
```<div id="about" class="section">
  <div class="about-container">
    <img src="tika.jpg" alt="Foto Tika">
    <div class="about-text">
      <p><b>Nama:</b> Hartika Ansar</p>
      <p><b>Nama Panggilan:</b> Tika</p>
      <p><b>Asal:</b> Kab. Enrekang</p>
      <p><b>Tanggal lahir:</b> 14 Maret 2006</p>
      <p><b>Pendidikan:</b> Universitas Negeri Makassar</p>
      <p><b>Jurusan:</b> Teknik Komputer</p>
    </div>
  </div>
</div>```
Kode ini digunakan untuk menampilkan informasi pribadi pemilik website. Bagian ini memiliki id="about" agar bisa dipanggil ketika menu About Me diklik. Isi section terdiri dari <img> yang menampilkan foto pribadi bernama tika.jpg dengan teks alternatif "Foto Tika". Kemudian ada <div class="about-text"> yang berisi beberapa paragraf <p> dengan label tebal <b> untuk menonjolkan data penting seperti nama, panggilan, asal daerah, tanggal lahir, pendidikan, dan jurusan kuliah. Bagian ini membuat website lebih personal karena memperkenalkan identitas pemilik secara jelas.
```<div id="funfact" class="section">
  <h2>fun Fact</h2>
  <ul class="funfact-list">
    <li>➤ suka baca wattpad/novel kalo lagi ga ada tugas</li>
    <li>➤ hobi dengerin lagu galau padahal lagi ga galau</li>
    <li>➤ cita-cita kaya, tapi hobi rebahan</li>
    <li>➤ scroll tiktok seharian</li>
    <li>➤ sukaa samaa warna pink hihihi</li>
  </ul>
</div>```
Kode ini digunakan untuk menampilkan fakta-fakta unik tentang pemilik website. Judul "Fun Fact" ditulis dengan heading <h2>. Isi fakta disusun dalam list menggunakan <ul> (unordered list) dan <li> (list item), sehingga rapi dan mudah dibaca. Masing-masing fakta menggunakan gaya bahasa santai, misalnya suka baca wattpad, dengerin lagu galau, cita-cita kaya tapi malas, scroll TikTok, dan suka warna pink. Bagian ini menambahkan sisi kepribadian yang lebih ringan dan menyenangkan.
```<div id="contact" class="section">
  <h2>ini sosmed akuhh👇🏻</h2>
  <div class="contact-links">
    <a href="https://wa.me/6282271512957" target="_blank">WhatsApp</a>
    <a href="https://instagram.com/hrtikansar" target="_blank">Instagram</a>
    <a href="https://www.tiktok.com/@bvluesky?_t=ZS-8zXCF5MPjZh&_r=1" target="_blank">Tiktok</a>
    <a href="mailto:hartikansar14@gmail.com" target="_blank">Email</a>
  </div>
</div>```
Kode ini digunakan untuk menampilkan tautan ke sosial media pemilik website. Judul "ini sosmed akuhh👇🏻" memberi kesan santai dan ramah. Bagian <div class="contact-links"> berisi beberapa link <a> ke WhatsApp, Instagram, TikTok, dan Email. Atribut target="_blank" dipakai agar link terbuka di tab baru, sehingga pengguna tidak meninggalkan halaman utama. Bagian ini penting untuk memudahkan orang lain menghubungi atau mengikuti pemilik website di media sosial.
```<script>
  function showSection(id) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(sec => sec.classList.remove('active'));
    document.getElementById(id).classList.add('active');
  }
</script>
```
Kode ini digunakan untuk mengatur logika navigasi antar halaman. Fungsi showSection(id) bekerja dengan cara:

Mengambil semua elemen dengan class .section.

Menghapus class active dari semua section agar tidak terlihat.

Menambahkan class active pada section dengan id yang sesuai dengan menu yang diklik.

Dengan logika ini, hanya satu section yang aktif dan terlihat pada satu waktu. Hasilnya, website terasa seperti aplikasi satu halaman (single-page app) sederhana.
Jadi, Website portofolio ini menggunakan kombinasi HTML, CSS, dan JavaScript sederhana. Struktur halaman dibagi menjadi beberapa section: Home, About Me, Fun Fact, dan Contact. CSS mengatur tata letak dan warna agar website lebih menarik, sementara JavaScript dipakai untuk membuat navigasi antar section tanpa harus memuat ulang halaman. Secara keseluruhan, project ini sudah cukup untuk dijadikan portofolio pribadi sekaligus latihan dasar dalam membangun website.

