# Sistem-parkir-sederhana
Sistem parkir sederhana buatan saya, yang dirancang untuk mengatasi kemacetan saat masuk dan keluar kendaraan bermotor di lingkungan parkir SMK Muhammadiyah 03 Kota Tangerang Selatan, Banten.

# 🅿️ Sistem Parkir Sekolah - SMK Muhammadiyah 3 Tangerang Selatan

Aplikasi sistem input dan pencetakan struk parkir kendaraan berbasis web yang simpel, responsif, dan terintegrasi dengan database MySQL. Proyek ini dibuat untuk mempermudah pencatatan kendaraan masuk di lingkungan sekolah.

---

## ✨ Fitur Utama

- **Input Data Cepat**: Form input sederhana untuk NIS dan Plat Nomor Kendaraan.
- **Auto Format & Validasi**: Konversi otomatis plat nomor menjadi huruf kapital dan sanitasi input data.
- **Struk Digital & QR Code**: Otomatis membuat tiket parkir lengkap dengan QR Code unik.
- **Siap Cetak (Print Ready)**: Tampilan struk yang otomatis menyesuaikan saat di-print/disimpan ke PDF.
- **Watermark & Responsif**: Tampilan tetap rapi baik di layar HP maupun Desktop dengan watermark resmi sekolah.

---

## 🛠️ Teknologi yang Digunakan

- **Frontend**: HTML5, CSS3 (Flexbox & Responsive Design)
- **Backend**: PHP 8.x
- **Database**: MySQL / MariaDB
- **API Eksternal**: QuickChart API (penghasil QR Code)

---

## 📁 Struktur Folder

```text
├── index.html        # Halaman utama (Form Input Data Parkir)
├── parkir.php        # Processing script & Halaman Struk Parkir
└── README.md         # Dokumentasi proyek
