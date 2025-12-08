<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nota Penjualan</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Arial', sans-serif;
			background: white;
			padding: 20px;
			color: #333;
		}

		.container {
			width: 100%;
			max-width: 850px;
			margin: 0 auto;
			background: white;
			border: 2px solid #000;
		}

		.header {
			padding: 20px;
			text-align: center;
			border-bottom: 3px solid #000;
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 20px;
		}

		.logo-section {
			flex-shrink: 0;
		}

		.logo-section img {
			width: 80px;
			height: 80px;
			object-fit: contain;
		}

		.header-text {
			flex: 1;
		}

		.header-text h1 {
			font-size: 24px;
			font-weight: 700;
			margin-bottom: 3px;
			text-transform: uppercase;
		}

		.header-text p {
			font-size: 11px;
			margin: 2px 0;
			font-weight: 500;
		}

		.nota-title {
			text-align: center;
			font-size: 18px;
			font-weight: 700;
			padding: 15px 0;
			text-transform: uppercase;
			border-bottom: 2px solid #000;
		}

		.content {
			padding: 25px;
		}

		.info-section {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 30px;
			margin-bottom: 25px;
			font-size: 12px;
			line-height: 1.8;
		}

		.info-group {
			display: flex;
			flex-direction: column;
		}

		.info-row {
			display: flex;
			margin-bottom: 8px;
		}

		.info-label {
			font-weight: 700;
			width: 110px;
			flex-shrink: 0;
		}

		.info-value {
			flex: 1;
		}

		.section-title {
			font-size: 11px;
			font-weight: 700;
			text-transform: uppercase;
			margin: 20px 0 12px 0;
			padding-bottom: 8px;
			border-bottom: 2px solid #000;
		}

		.items-table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
			font-size: 11px;
		}

		.items-table thead {
			background: #f5f5f5;
			border-top: 2px solid #000;
			border-bottom: 2px solid #000;
		}

		.items-table th {
			padding: 10px;
			text-align: left;
			font-weight: 700;
			border-right: 1px solid #ddd;
		}

		.items-table th:last-child {
			border-right: none;
		}

		.items-table td {
			padding: 10px;
			border-right: 1px solid #ddd;
			border-bottom: 1px solid #ddd;
		}

		.items-table td:last-child {
			border-right: none;
		}

		.items-table tbody tr:last-child td {
			border-bottom: 2px solid #000;
		}

		.text-right {
			text-align: right;
		}

		.text-center {
			text-align: center;
		}

		.total-section {
			display: flex;
			justify-content: flex-end;
			margin: 20px 0;
		}

		.total-box {
			width: 320px;
			border: 2px solid #000;
			font-size: 11px;
		}

		.total-row {
			display: flex;
			justify-content: space-between;
			padding: 10px 12px;
			border-bottom: 1px solid #ddd;
		}

		.total-row:last-child {
			border-bottom: none;
		}

		.total-row.grand {
			background: #f5f5f5;
			border-top: 2px solid #000;
			font-weight: 700;
			font-size: 12px;
		}

		.total-label {
			font-weight: 600;
		}

		.total-value {
			font-weight: 700;
		}

		.notes-section {
			background: #fafafa;
			padding: 12px;
			margin: 20px 0;
			font-size: 10px;
			line-height: 1.6;
			border-left: 4px solid #000;
		}

		.notes-title {
			font-weight: 700;
			margin-bottom: 5px;
			text-transform: uppercase;
		}

		.notes-text {
			color: #555;
		}

		.signature-section {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 30px;
			margin-top: 40px;
			font-size: 11px;
		}

		.signature-box {
			text-align: center;
		}

		.signature-box p {
			margin-bottom: 60px;
			font-weight: 600;
			text-transform: uppercase;
		}

		.signature-line {
			border-top: 1px solid #000;
			padding-top: 5px;
			font-weight: 600;
		}

		.footer {
			background: #f5f5f5;
			padding: 12px;
			text-align: center;
			font-size: 9px;
			color: #666;
			border-top: 2px solid #000;
		}

		@media print {
			body {
				padding: 0;
				background: white;
			}

			.container {
				border: 1px solid #000;
				max-width: 100%;
			}
		}
	</style>
</head>

<body>
	<div class="container">
		<!-- Header dengan Logo -->
		<div class="header">
			<div class="logo-section">
				<img src="<?php echo e(public_path('gambar/logo.png')); ?>" alt="Logo DD Knalpot Racing">
			</div>
			<div class="header-text">
				<h1>DD Knalpot Racing</h1>
				<p>Sistem Inventory & Penjualan</p>
				<p>Jl. Raya Karya No. 123, Jakarta Selatan 12000</p>
			</div>
		</div>

		<!-- Judul Nota -->
		<div class="nota-title">NOTA PENJUALAN</div>

		<!-- Konten -->
		<div class="content">
			<!-- Informasi Nota -->
			<div class="info-section">
				<div class="info-group">
					<div class="info-row">
						<span class="info-label">No. Nota</span>
						<span class="info-value">: #<?php echo e(str_pad($penjualan->id, 6, '0', STR_PAD_LEFT)); ?></span>
					</div>
					<div class="info-row">
						<span class="info-label">Tanggal</span>
						<span class="info-value">: <?php echo e(now()->format('d-m-Y')); ?></span>
					</div>
					<div class="info-row">
						<span class="info-label">Jam</span>
						<span class="info-value">: <?php echo e(now()->format('H:i:s')); ?></span>
					</div>
				</div>
				<div class="info-group">
					<div class="info-row">
						<span class="info-label">Tgl. Penjualan</span>
						<span class="info-value">: <?php echo e(\Carbon\Carbon::parse($penjualan->tanggal_masuk)->format('d-m-Y')); ?></span>
					</div>
					<div class="info-row">
						<span class="info-label">Status</span>
						<span class="info-value">: <strong>LUNAS</strong></span>
					</div>
				</div>
			</div>

			<!-- Tabel Detail -->
			<div class="section-title">Detail Transaksi Penjualan</div>
			<table class="items-table">
				<thead>
					<tr>
						<th style="width: 5%;">No.</th>
						<th style="width: 38%;">Nama Barang</th>
						<th style="width: 10%;">Ukuran</th>
						<th style="width: 12%; text-align: right;">Jumlah</th>
						<th style="width: 17%; text-align: right;">Harga/Unit</th>
						<th style="width: 18%; text-align: right;">Jumlah Harga</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">1</td>
						<td><?php echo e($penjualan->nama); ?></td>
						<td class="text-center"><?php echo e($penjualan->ukuran); ?></td>
						<td class="text-right"><?php echo e(number_format($penjualan->jumlah, 0, ',', '.')); ?></td>
						<td class="text-right">Rp <?php echo e(number_format($penjualan->harga, 0, ',', '.')); ?></td>
						<td class="text-right"><strong>Rp <?php echo e(number_format($penjualan->harga * $penjualan->jumlah, 0, ',', '.')); ?></strong></td>
					</tr>
				</tbody>
			</table>

			<!-- Total -->
			<div class="total-section">
				<div class="total-box">
					<div class="total-row">
						<span class="total-label">Subtotal</span>
						<span class="total-value">Rp <?php echo e(number_format($penjualan->harga * $penjualan->jumlah, 0, ',', '.')); ?></span>
					</div>
					<div class="total-row">
						<span class="total-label">Diskon</span>
						<span class="total-value">Rp 0</span>
					</div>
					<div class="total-row">
						<span class="total-label">Pajak</span>
						<span class="total-value">Rp 0</span>
					</div>
					<div class="total-row grand">
						<span class="total-label">TOTAL BAYAR</span>
						<span class="total-value">Rp <?php echo e(number_format($penjualan->harga * $penjualan->jumlah, 0, ',', '.')); ?></span>
					</div>
				</div>
			</div>

			<!-- Catatan -->
			<div class="notes-section">
				<div class="notes-title">Keterangan Penting :</div>
				<div class="notes-text">
					Barang yang telah dibeli tidak dapat ditukar atau dikembalikan kecuali ada cacat dari pabrik. Pembayaran harus dilunasi sebelum barang dibawa keluar. Terima kasih atas kepercayaan Anda kepada DD Knalpot Racing.
				</div>
			</div>

			<!-- Tanda Tangan -->
			<div class="signature-section">
				<div class="signature-box">
					<p>Penjual / Kasir</p>
					<div class="signature-line">_______________________</div>
				</div>
				<div class="signature-box">
					<p>Pembeli / Penerima</p>
					<div class="signature-line">_______________________</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<div class="footer">
			<p><strong>DD Knalpot Racing</strong> | Dicetak: <?php echo e(now()->format('d-m-Y H:i:s')); ?> | Halaman Nota Penjualan</p>
		</div>
	</div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Inventory dan Penjualan\resources\views/cetak/nota-penjualan.blade.php ENDPATH**/ ?>