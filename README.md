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
