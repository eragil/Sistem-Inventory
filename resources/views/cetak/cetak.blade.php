<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table,
		th,
		td {
			border: 1px solid black;
		}

		th,
		td {
			padding: 10px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}
	</style>

</head>

<body>
	<div class="row">
		<div class="col-12">
			@if ($pilihanLaporan == 'stok')
				<h2>Laporan Stok Barang</h2>
				<table class="table-striped table-bordered table">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Ukuran</th>

							<th>Tanggal Penjualan</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($semuabarang as $barang)
							<tr>
								<td>{{ $loop->iteration }}</td>
							<td>{{ $barang->nama }}</td>
							<td>{{ $barang->jumlah }}</td>
							<td>{{ $barang->ukuran }}</td>

							<td>{{ $barang->tanggal_masuk }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
			@if ($pilihanLaporan == 'barangmasuk')
				<h2>Laporan Barang Masuk</h2>
				<div class="d-flex justify-content-between mb-3">
					<div class="d-flex"><select class="form-control" wire:model.live='bulan'>
							<option value="0">Semua Bulan</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select></div><button class="btn btn-success">PDF</button>
				</div>
				<table class="table-striped table-bordered table">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Ukuran</th>

							<th>Tanggal Penjualan</th>
						</tr>
					</thead>
				<tbody>
					@foreach ($semuakeluar as $barang)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $barang->nama }}</td>
							<td>{{ $barang->jumlah }}</td>
							<td>{{ $barang->ukuran }}</td>

							<td>{{ $barang->tanggal_masuk }}</td>
						</tr>
					@endforeach
				</tbody>
				</table>
			@endif
			@if ($pilihanLaporan == 'barangkeluar')
				<h2>Laporan Barang Keluar</h2>
				<table class="table-striped table-bordered table">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Ukuran</th>

							<th>Tanggal Penjualan</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($semuakeluar as $barang)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $barang->nama }}</td>
								<td>{{ $barang->jumlah }}</td>
								<td>{{ $barang->ukuran }}</td>

								<td>{{ $barang->tanggal_masuk }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
			@if ($pilihanLaporan == 'penjualan')
				<h2>Laporan Penjualan</h2>
				<div class="d-flex justify-content-between mb-3">
					<div class="d-flex"><select class="form-control" wire:model.live='bulan'>
							<option value="0">Semua Bulan</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select></div>
					<div class="d-flex"><button class="btn btn-success mx-2">Excel</button><button class="btn btn-success">PDF</button>
					</div>
				</div>
				<table class="table-striped table-bordered table">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Ukuran</th>

							<th>Tanggal Penjualan</th>
							<th>Harga</th>
						</tr>
					</thead>
				<tbody>
					@foreach ($semuapembelian as $barang)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $barang->nama }}</td>
							<td>{{ $barang->jumlah }}</td>
							<td>{{ $barang->ukuran }}</td>

							<td>{{ $barang->tanggal_masuk }}</td>
							<td>{{ $barang->harga }}</td>
						</tr>
					@endforeach
				</tbody>
				</table>
			@endif
			@if ($pilihanLaporan == 'pembelian')
				<h2>Laporan Pembelian</h2>

				<table class="table-striped table-bordered table">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Ukuran</th>

							<th>Tanggal Penjualan</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($semuapembelian as $barang)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $barang->nama }}</td>
								<td>{{ $barang->jumlah }}</td>
								<td>{{ $barang->ukuran }}</td>

								<td>{{ $barang->tanggal_masuk }}</td>
								<td>{{ $barang->harga }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</div>
</body>

</html>
