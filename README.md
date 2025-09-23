# 🌐 Pertemuan 1 – Dasar HTML  

> **HTML (HyperText Markup Language)** adalah bahasa dasar untuk membangun halaman web.  
> Pada praktikum ini, dipelajari struktur dokumen HTML serta elemen dasar untuk menampilkan teks, link, dan gambar.  

---

## 📖 Materi yang Dipelajari  

| Elemen | Fungsi |
|--------|--------|
| `<!DOCTYPE html>` | Menentukan tipe dokumen HTML |
| `<html>` | Elemen utama yang membungkus semua konten |
| `<head>` | Bagian kepala dokumen (judul, metadata, link CSS/JS) |
| `<body>` | Bagian isi dokumen yang ditampilkan di browser |
| `<h1>–<h6>` | Judul dari besar ke kecil |
| `<p>` | Membuat paragraf |
| `<a>` | Membuat hyperlink |
| `<img>` | Menampilkan gambar |

---

## 💻 Contoh Kode  

```html
<!DOCTYPE html>
<html>
<head>
  <title>Pertemuan 1 – Dasar HTML</title>
</head>
<body>
  <h1>Hello World</h1>
  <p>Ini adalah paragraf pertama saya.</p>
  <a href="https://www.example.com">Kunjungi Website</a><br>
  <img src="gambar1.jpg" alt="Contoh Gambar" width="200">
</body>
</html>
```
# 🌟 Pertemuan 2 – HTML Lanjutan

> Di pertemuan ini kita memperdalam penggunaan elemen-elemen HTML agar tampilan web jadi lebih terstruktur dan interaktif.  
> Fokusnya termasuk formulir, tabel, dan semantic HTML untuk memperjelas struktur dokumen.

---

## 📖 Materi yang Dipelajari

| Materi | Penjelasan Singkat |
|--------|----------------------|
| Formulir (`<form>`) | Untuk menerima input dari pengguna (teks, email, tombol, dsb). |
| Tabel (`<table>`, `<tr>`, `<td>`, `<th>`) | Menampilkan data dalam baris & kolom agar lebih mudah dibaca. |
| Semantic HTML (`<header>`, `<section>`, `<footer>`, `<article>`) | Membantu memberi makna struktur dokumen agar lebih ramah SEO dan aksesibilitas. |
| Elemen tambahan | Misalnya input type berbeda, label, dan properti form lainnya. |

---

## 💻 Contoh Kode – Formulir

```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pertemuan 2 – Formulir</title>
</head>
<body>
  <h2>Formulir Pendaftaran</h2>
  <form>
    <label>Nama: <input type="text" name="nama"></label><br>
    <label>Email: <input type="email" name="email"></label><br>
    <button type="submit">Kirim</button>
  </form>
</body>
</html>
```
# 🎨 Pertemuan 3 – Dasar CSS  

> Di pertemuan ini kita belajar dasar-dasar **CSS (Cascading Style Sheets)** yang digunakan untuk mempercantik tampilan halaman web.  
> Dengan CSS, kita bisa mengatur warna, font, ukuran teks, tata letak, dan membuat halaman web lebih menarik serta mudah dibaca.  

---

## 📖 Materi yang Dipelajari  

| Materi | Penjelasan Singkat |
|--------|----------------------|
| Cara menambahkan CSS | Bisa dengan **inline**, **internal**, atau **eksternal stylesheet**. |
| Selektor | Digunakan untuk memilih elemen HTML. Bentuknya bisa selektor elemen (`p`, `h1`), class (`.namaClass`), atau id (`#namaId`). |
| Properti dasar | Contoh: `color`, `background-color`, `font-family`, `font-size`. |
| Layout sederhana | Mengatur jarak dengan `margin`, `padding`, dan membuat bingkai dengan `border`. |

---

## 💻 Contoh Kode  

```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pertemuan 3 – CSS Dasar</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      text-align: center;
      padding: 20px;
    }
    h1 {
      color: darkblue;
    }
    p {
      font-size: 16px;
      color: #333;
    }
    .box {
      margin: 10px auto;
      padding: 15px;
      border: 2px solid #555;
      width: 200px;
      background: white;
      border-radius: 8px;
    }
    #highlight {
      background: yellow;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <h1>Halo CSS!</h1>
  <p id="highlight">Ini paragraf dengan ID highlight.</p>
  <div class="box">Ini kotak dengan class CSS.</div>

</body>
</html>
```
# 💼 Pertemuan 4 – Portofolio & CSS + LinkedIn

> Di pertemuan ini kita membuat **website portofolio pribadi** yang menampilkan profil diri, proyek, dan link ke akun profesional seperti LinkedIn.  
> Kita juga mengatur tampilannya pakai CSS agar desainnya menarik dan mudah dinavigasi.

---

## 📖 Materi yang Dipelajari

| Materi | Penjelasan Singkat |
|--------|----------------------|
| Struktur portofolio | Bagian yang umum: header / hero, profil, proyek, kontak, footer. |
| Styling & layout | Penggunaan CSS untuk mempercantik tampilan: layout grid/flex, warna, font, margin/padding. |
| Responsivitas sederhana | Memastikan portofolio bisa tampil baik di berbagai ukuran layar (desktop & mobile). |
| Link ke media profesional | Menambahkan tautan ke LinkedIn agar pengunjung bisa melihat profil profesionalmu secara langsung. |

---

## 💻 Contoh Kode – Struktur Portofolio

```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Portofolio Saya</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Tika Ansar</h1>
    <p>Mahasiswa Teknik Komputer • Web Developer Pemula</p>
    <nav>
      <a href="#about">Tentang Saya</a> |
      <a href="#proyek">Proyek</a> |
      <a href="#kontak">Kontak</a>
    </nav>
  </header>

  <section id="about">
    <h2>Tentang Saya</h2>
    <p>Hallo, saya Tika. Saya belajar membuat website sederhana untuk portofolio pribadi.</p>
  </section>

  <section id="proyek">
    <h2>Proyek Saya</h2>
    <div class="proyek-grid">
      <div class="proyek-item">Proyek 1</div>
      <div class="proyek-item">Proyek 2</div>
      <div class="proyek-item">Proyek 3</div>
    </div>
  </section>

  <section id="kontak">
    <h2>Kontak</h2>
    <a href="https://www.linkedin.com/in/hartikansar" target="_blank">LinkedIn</a>
  </section>

  <footer>
    <p>© 2025 Portofolio Tika Ansar</p>
  </footer>
</body>
</html>
```
# 🖥️ Pertemuan 5 – Dasar JavaScript  

> Di pertemuan ini kita mulai belajar **JavaScript** untuk menambahkan interaktivitas pada halaman web.  
> JavaScript digunakan agar website tidak hanya statis, tapi bisa merespon aksi pengguna (event), melakukan perhitungan, dan memanipulasi elemen HTML.  

---

## 📖 Materi yang Dipelajari  

| Materi | Penjelasan Singkat |
|--------|----------------------|
| Variabel | Cara mendeklarasikan variabel dengan `var`, `let`, dan `const`. |
| Scope variabel | Perbedaan **global** dan **lokal**. |
| Operator | Meliputi operator aritmatika (`+`, `-`, `*`, `/`) dan logika (`&&`, `||`, `!`). |
| Konversi tipe data | Mengubah tipe data, misalnya dari string ke number. |
| Event handling | Menangani aksi pengguna (klik tombol, input data, dll). |
| Alert & confirm | Memberikan peringatan dan konfirmasi ke pengguna. |
| Mini Project | Membuat website portofolio sederhana dengan HTML, CSS, dan JavaScript (folder `PORTOFOLIOJAVA`). |

---

## 💻 Contoh Kode – Variabel & Operator  

```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Variabel & Operator</title>
  <script>
    function hitung() {
      let a = 10;
      let b = 5;
      let hasil = a + b;
      alert("Hasil penjumlahan: " + hasil);
    }
  </script>
</head>
<body>
  <h2>Belajar Variabel & Operator</h2>
  <button onclick="hitung()">Klik untuk Hitung</button>
</body>
</html>
```
