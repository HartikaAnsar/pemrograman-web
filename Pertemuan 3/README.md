<!DOCTYPE html>
<html lang="id">
Kode ini digunakan untuk mendefinisikan bahwa file ini adalah dokumen HTML5. <!DOCTYPE html> memberi tahu browser agar membaca file dengan standar HTML5, sehingga semua fitur modern bisa berjalan. Atribut lang="id" pada tag <html> memberi informasi bahwa bahasa utama halaman ini adalah bahasa Indonesia, yang bermanfaat untuk mesin pencari dan pembaca layar.
<head>
  <meta charset="UTF-8">
  <title>Portofolio Tika</title>
  <style>
Kode ini digunakan untuk bagian head dari dokumen HTML. meta charset="UTF-8" berfungsi agar teks mendukung berbagai karakter, termasuk huruf khusus dan emoji. <title> memberi judul halaman "Portofolio Tika", yang akan tampil di tab browser. Lalu <style> dipakai untuk menuliskan CSS langsung di dalam file HTML, sehingga tidak perlu file CSS terpisah.
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}
Kode ini digunakan untuk mengatur gaya dasar semua elemen HTML. margin: 0 dan padding: 0 membuat tampilan lebih bersih karena menghapus jarak bawaan dari browser. box-sizing: border-box membuat perhitungan lebar elemen jadi lebih mudah karena padding dan border ikut dihitung dalam ukuran total. font-family: Arial, sans-serif mengatur font standar agar seragam dan lebih enak dibaca.
body {
  background: #f5c7ce;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}
Kode ini digunakan untuk mengatur tampilan body halaman. Latar belakang diberi warna pink (#f5c7ce). Lalu digunakan flexbox (display: flex) untuk membuat semua isi halaman otomatis berada di tengah layar, baik secara horizontal (justify-content: center) maupun vertikal (align-items: center). min-height: 100vh artinya tinggi halaman minimal setinggi layar penuh (100% tinggi viewport).
<div class="container">
Kode ini digunakan sebagai wadah utama seluruh isi website. Di CSS, .container diatur memiliki lebar maksimum 1000px, background putih, border radius agar sudut melengkung, serta bayangan (box-shadow) sehingga terlihat seperti kartu (card) yang rapi dan modern. Container ini membuat konten terlihat fokus di tengah layar.
<nav>
  <a href="#" onclick="showSection('home')">Home</a>
  <a href="#" onclick="showSection('about')">About Me</a>
  <a href="#" onclick="showSection('funfact')">Fun Fact</a>
  <a href="#" onclick="showSection('contact')">Contact</a>
</nav>
Kode ini digunakan untuk membuat navigasi menu di bagian atas halaman. Ada empat link: Home, About Me, Fun Fact, dan Contact. Atribut onclick="showSection(...)" berfungsi memanggil fungsi JavaScript agar bisa berpindah section. Dengan cara ini, tidak perlu reload atau pindah halaman, cukup ganti isi konten sesuai section yang dipilih.
<div class="content">
  <!-- HOME -->
  <div id="home" class="section active">
    <h2>haiii, kenalan yukss</h2>
    <p>cuman manusia biasa yang mimpinya pengen kaya tapi rebahan terus 🤭🫶🏻</p>
  </div>
Kode ini digunakan untuk menampilkan section Home. Section ini diberi id="home" dan class active, sehingga ketika halaman pertama kali dibuka, bagian Home langsung terlihat. Isi section berupa judul sambutan dan kalimat perkenalan singkat.
<!-- ABOUT ME -->
<div id="about" class="section">
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
</div>
Kode ini digunakan untuk bagian About Me. Di dalamnya ada foto profil (tika.jpg) dengan bentuk bulat lonjong (karena pakai border-radius: 50% / 40%), lalu di sampingnya ada teks biodata singkat. CSS pada .about-container mengatur agar konten rapi, foto di atas, teks di bawah, dan semua elemen berada di tengah.
<!-- FUN FACT -->
<div id="funfact" class="section">
  <h2>fun Fact</h2>
  <ul class="funfact-list">
    <li>➤ suka baca wattpad/novel kalo lagi ga ada tugas</li>
    <li>➤ hobi dengerin lagu galau padahal lagi ga galau</li>
    <li>➤ cita-cita kaya, tapi hobi rebahan</li>
    <li>➤ scroll tiktok seharian</li>
    <li>➤ sukaa samaa warna pink hihihi</li>
  </ul>
</div>
Kode ini digunakan untuk menampilkan section Fun Fact. Isi berupa daftar poin (list) berisi hal-hal unik tentang pemilik website. CSS pada .funfact-list membuat daftar terlihat rapi, rata kiri, dan berada di tengah halaman dengan lebar maksimal 500px.
<!-- CONTACT -->
<div id="contact" class="section">
  <h2>ini sosmed akuhh👇🏻</h2>
  <div class="contact-links">
    <a href="https://wa.me/6282271512957" target="_blank">WhatsApp</a>
    <a href="https://instagram.com/hrtikansar" target="_blank">Instagram</a>
    <a href="https://www.tiktok.com/@bvluesky?_t=ZS-8zXCF5MPjZh&_r=1" target="_blank">Tiktok</a>
    <a href="mailto:hartikansar14@gmail.com" target="_blank">Email</a>
  </div>
</div>
Kode ini digunakan untuk menampilkan section Contact. Ada empat link berbentuk tombol: WhatsApp, Instagram, TikTok, dan Email. Masing-masing link diberi target="_blank" supaya terbuka di tab baru. CSS pada .contact-links a membuat tombol berbentuk bulat memanjang, berwarna pink, dan berubah warna lebih gelap ketika diarahkan kursor (hover).
<script>
  function showSection(id) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(sec => sec.classList.remove('active'));
    document.getElementById(id).classList.add('active');
  }
</script>
Kode ini digunakan untuk logika navigasi antar section. Fungsi showSection(id) pertama-tama mengambil semua elemen dengan class .section, lalu menghapus class active agar semuanya tersembunyi. Setelah itu, hanya section dengan id sesuai pilihan yang diberi class active, sehingga bagian tersebut muncul. Efek animasi muncul karena CSS @keyframes fadeIn.
