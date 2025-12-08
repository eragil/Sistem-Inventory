<div>
	<x-loading />
	<div class="content-container mt-4">
		<h5 class="mb-3">Laporan</h5>
		<div class="row">
			<div class="col-4">
				<button class="btn btn-success w-100 mb-2" wire:click='pilihLaporan("stok")'>Laporan Stok Barang</button>
				<button class="btn btn-warning w-100 mb-2" wire:click='pilihLaporan("barangmasuk")'>Laporan Barang Masuk</button>
				<button class="btn btn-primary w-100 mb-2" wire:click='pilihLaporan("barangkeluar")'>Laporan Barang Keluar</button>
				<button class="btn btn-pink w-100 mb-2" wire:click='pilihLaporan("penjualan")'>Laporan Penjualan</button>
				<button class="btn btn-danger w-100 mb-2" wire:click='pilihLaporan("pembelian")'>Laporan Pembelian</button>
			</div>
			<hr />
			<div class="row">
				<div class="col-12">
					@if ($pilihanLaporan == 'stok')
						<h2>Laporan Stok Barang</h2>
						<div class="d-flex justify-content-between mb-3">

							<div class="d-flex">
								<select class="form-control" wire:model.live='bulan'>
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
								</select>

							</div>

							<a class="btn btn-success" href="{{ url('/cetak/stok') }}" target="_blank">PDF</a>

						</div>
						<table class="table-striped table-bordered table">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									<th>Ukuran</th>
									<th>Foto Nota</th>
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
										<td>
											<img class="img-fluid" src="{{ asset('/storage/gambarbarang/' . $barang->foto) }}"
												alt="{{ $barang->nama_barang }}" style="max-width: 100px">
										</td>
										<td>{{ $barang->tanggal_masuk }}</td>

									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
					@if ($pilihanLaporan == 'barangmasuk')
						<h2>Laporan Barang Masuk</h2>
						<div class="d-flex justify-content-between mb-3">
							<div class="d-flex">
								<select class="form-control" wire:model.live='bulan'>
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
								</select>

							</div>

							<a class="btn btn-success" href="{{ url('/cetak/barangmasuk') }}" target="_blank">PDF</a>

						</div>
						<table class="table-striped table-bordered table">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									<th>Ukuran</th>
									<th>Foto Nota</th>
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
										<td>
											<img class="img-fluid" src="{{ asset('/storage/gambarbarang/' . $barang->foto) }}"
												alt="{{ $barang->nama_barang }}" style="max-width: 100px">
										</td>
										<td>{{ $barang->tanggal_masuk }}</td>

									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
					@if ($pilihanLaporan == 'barangkeluar')
						<h2>Laporan Barang Keluar</h2>
						<div class="d-flex justify-content-between mb-3">

							<div class="d-flex">
								<select class="form-control" wire:model.live='bulan'>
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
								</select>

							</div>

							<a class="btn btn-success" href="{{ url('/cetak/barangkeluar') }}" target="_blank">PDF</a>

						</div>
						<table class="table-striped table-bordered table">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									<th>Ukuran</th>
									<th>Foto</th>
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
										<td>
											<img class="img-fluid" src="{{ asset('/storage/gambarbarang/' . $barang->foto) }}"
												alt="{{ $barang->nama_barang }}" style="max-width: 100px">
										</td>
										<td>{{ $barang->tanggal_masuk }}</td>

									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
					@if ($pilihanLaporan == 'penjualan')
						<h2>Laporan Penjualan</h2>
						<div class="d-flex justify-content-between mb-3">

							<div class="d-flex">
								<select class="form-control" wire:model.live='bulan'>
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
								</select>

							</div>
							<div class="d-flex">
								<a class="btn btn-pink" href="{{ url('/excel/penjualan') }}" target="_blank">excel</a>
								<a class="btn btn-success" href="{{ url('/cetak/penjualan') }}" target="_blank">PDF</a>"
							</div>

						</div>
						<table class="table-striped table-bordered table">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									<th>Ukuran</th>
									<th>Foto Nota</th>
									<th>Tanggal Penjualan</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($semuapenjualan as $barang)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $barang->nama }}</td>
										<td>{{ $barang->jumlah }}</td>
										<td>{{ $barang->ukuran }}</td>
										<td>
											<img class="img-fluid" src="{{ asset('/storage/gambarbarang/' . $barang->foto) }}"
												alt="{{ $barang->nama_barang }}" style="max-width: 100px">
										</td>
										<td>{{ $barang->tanggal_masuk }}</td>
										<td>{{ $barang->harga }}</td>

									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
					@if ($pilihanLaporan == 'pembelian')
						<h2>Laporan Pembelian</h2>
						<div class="d-flex justify-content-between mb-3">

							<div class="d-flex">
								<select class="form-control" wire:model.live='bulan'>
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
								</select>

							</div>

							<div class="d-flex">
								<a class="btn btn-pink" href="{{ url('/excel/pembelian') }}" target="_blank">excel</a>
								<a class="btn btn-success" href="{{ url('/cetak/pembelian') }}" target="_blank">PDF</a>"
							</div>

						</div>
						<table class="table-striped table-bordered table">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									<th>Ukuran</th>
									<th>Foto Nota</th>
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
										<td>
											<img class="img-fluid" src="{{ asset('/storage/gambarbarang/' . $barang->foto) }}"
												alt="{{ $barang->nama_barang }}" style="max-width: 100px">
										</td>
										<td>{{ $barang->tanggal_masuk }}</td>
										<td>{{ $barang->harga }}</td>

									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
				</div>
			</div>

		</div>

	</div>
</div>
