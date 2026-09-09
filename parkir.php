<?php

date_default_timezone_set('Asia/Jakarta');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host     = "sql313.infinityfree.com";
$username = "if0_42872392";     
$password = "thierry300899";         
$database = "if0_42872392_db_parkir"; 

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

$status      = "";
$pesan       = "";
$id_parkir   = "";
$nis         = "";
$plat_motor  = "";
$waktu_masuk = date('d-m-Y H:i:s');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis        = isset($_POST['nis']) ? trim($_POST['nis']) : '';
    $plat_motor = isset($_POST['plat_motor']) ? strtoupper(trim($_POST['plat_motor'])) : '';

    if (!empty($nis) && !empty($plat_motor)) {
        $query = "INSERT INTO sistem_parkir (NIS, Plat_Motor) VALUES ('$nis', '$plat_motor')";

        if (mysqli_query($koneksi, $query)) {
            $status    = "success";
            $pesan     = "Data parkir berhasil disimpan!";
            $id_parkir = mysqli_insert_id($koneksi);
        } else {
            $status = "error";
            $pesan  = "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    } else {
        $status = "error";
        $pesan  = "Mohon isi semua kolom pada form!";
    }
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Parkir - SMK Muhammadiyah 03</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            padding: 50px 15px;
            margin: 0;
        }
        .card-ticket {
            width: 100%;
            max-width: 350px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
            box-sizing: border-box;
        }
        .header-ticket {
            text-align: center;
            border-bottom: 2px dashed #cbd5e1;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .info-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }
        .info-label {
            color: #64748b;
        }
        .info-value {
            font-weight: bold;
            color: #1e293b;
        }
        .qr-section {
            text-align: center;
            margin: 20px 0 15px 0;
            padding: 12px;
            background-color: #f8fafc;
            border-radius: 10px;
            border: 1px dashed #cbd5e1;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 12px 0;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            box-sizing: border-box;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-print { background-color: #4a90e2; color: white; border: none; }
        .btn-back { background-color: #e2e8f0; color: #334155; border: none; }

        @media print {
            body { background-color: white; padding: 0; }
            .card-ticket { box-shadow: none; border: 1px solid #000; width: 100%; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <div class="card-ticket">
        <!-- Made By THIERRYDIMAR WIDODO -->

        <?php if ($status == "success"): ?>
            <!-- Made By THIERRYDIMAR WIDODO -->
            <div class="header-ticket">
                <span style="background: #d1fae5; color: #047857; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold;">
                    ✓ PARKIR MASUK
                </span>
                <h3 style="margin: 12px 0 4px 0; color: #0f172a;">SMK Muhammadiyah 03</h3>
                <p style="margin: 0; color: #64748b; font-size: 12px;">Tangerang Selatan</p>
            </div>

            <div class="info-group">
                <!-- Made By THIERRYDIMAR WIDODO -->
                <span class="info-label">ID Transaksi:</span>
                <span class="info-value" style="color: #2563eb;">#<?php echo sprintf("%05d", $id_parkir); ?></span>
            </div>

            <div class="info-group">
                <!-- Made By THIERRYDIMAR WIDODO -->
                <span class="info-label">NIS:</span>
                <span class="info-value"><?php echo htmlspecialchars($nis); ?></span>
            </div>

            <div class="info-group">
                <!-- Made By THIERRYDIMAR WIDODO -->
                <span class="info-label">Plat Motor:</span>
                <span class="info-value" style="background: #f1f5f9; padding: 2px 8px; border-radius: 4px; border: 1px solid #e2e8f0;">
                    <?php echo htmlspecialchars($plat_motor); ?>
                </span>
            </div>

            <div class="info-group">
                <!-- Made By THIERRYDIMAR WIDODO -->
                <span class="info-label">Waktu Masuk:</span>
                <span class="info-value"><?php echo $waktu_masuk; ?> WIB</span>
            </div>

            <div class="qr-section">
                <!-- Made By THIERRYDIMAR WIDODO -->
                <img src="https://quickchart.io/qr?text=PARKIR-ID-<?php echo $id_parkir; ?>&size=120" alt="QR Tiket" style="width: 110px; height: 110px;">
                <p style="margin: 6px 0 0 0; font-size: 11px; color: #64748b;">Simpan/Cetak bukti masuk parkir ini</p>
            </div>

            <div class="no-print">
                <!-- Made By THIERRYDIMAR WIDODO -->
                <button onclick="window.print()" class="btn btn-print">🖨️ Cetak / Simpan Struk</button>
                <a href="index.html" class="btn btn-back">← Input Parkir Lagi</a>
            </div>

        <?php else: ?>
            <div style="text-align: center; padding: 10px 0;">
                <div style="font-size: 45px; color: #ef4444; margin-bottom: 10px;">✕</div>
                <h3 style="color: #dc2626; margin: 0 0 10px 0;">Gagal Menyimpan</h3>
                <p style="color: #64748b; font-size: 13px; margin-bottom: 20px;"><?php echo $pesan; ?></p>
                <a href="index.html" class="btn btn-print">Kembali ke Form</a>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>