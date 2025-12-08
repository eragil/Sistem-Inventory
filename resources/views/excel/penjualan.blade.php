<h1>Laporan Penjualan</h1>
<table style="border-collapse: collapse; width: 100%;">
	<thead>
		<tr>
			<th style="border: 1px solid black; padding: 8px;">No.</th>
			<th style="border: 1px solid black; padding: 8px;">Nama Barang</th>
			<th style="border: 1px solid black; padding: 8px;">Jumlah</th>
			<th style="border: 1px solid black; padding: 8px;">Ukuran</th>
			<th style="border: 1px solid black; padding: 8px;">Tanggal Penjualan</th>
			<th style="border: 1px solid black; padding: 8px;">Harga</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($semuapenjualan as $barang)
			<tr>
				<td style="border: 1px solid black; padding: 8px;">{{ $loop->iteration }}</td>
				<td style="border: 1px solid black; padding: 8px;">{{ $barang->nama }}</td>
				<td style="border: 1px solid black; padding: 8px;">{{ $barang->jumlah }}</td>
				<td style="border: 1px solid black; padding: 8px;">{{ $barang->ukuran }}</td>
				<td style="border: 1px solid black; padding: 8px;">{{ $barang->tanggal_masuk }}</td>
				<td style="border: 1px solid black; padding: 8px;">{{ $barang->harga }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
