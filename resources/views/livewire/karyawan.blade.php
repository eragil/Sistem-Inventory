<div>
	<x-loading />
	<div class="table-container mt-4">
		<h5 class="mb-3">Data Karyawan</h5>
		<div class="d-flex justify-content-between mb-3">
			@if ($selectedMode == 'tambah')
				<button class="btn btn-success" wire:click='batal'>Batal</button>
			@else
				<button class="btn btn-pink" wire:click='tambah'>+ Tambah Karyawan</button>
			@endif

			<div class="d-flex">
				<input class="form-control me-2" type="text" placeholder="Cari Karyawan">
				<button class="btn btn-success">Cari</button>
			</div>
		</div>
		@if ($selectedMode == 'tambah' || $selectedMode == 'edit')
			<form wire:submit="simpan">
				<div class="row align-items-center mb-3">
					<label class="col-sm-2 form-label" for="nama">Nama Karyawan</label>
					<div class="col-sm-10">
						<input class="form-control @error('nama') is-invalid @enderror" id="nama" type="text" wire:model="nama"
							placeholder="Masukkan nama karyawan">
						@error('nama')
							<div class="invalid-feedback">
								Nama karyawan harus diisi
							</div>
						@enderror
					</div>
				</div>
				<div class="row align-items-center mb-3">
					<label class="col-sm-2 form-label" for="email">Email</label>
					<div class="col-sm-10">
						<input class="form-control @error('email') is-invalid @enderror" id="email" type="email" wire:model="email"
							placeholder="Masukkan email">
						@error('email')
							<div class="invalid-feedback">
								Email harus diisi dengan format yang benar
							</div>
						@enderror
					</div>
				</div>
				<div class="row align-items-center mb-3">
					<label class="col-sm-2 form-label" for="password">Password</label>
					<div class="col-sm-10">
						<input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
							wire:model="password" placeholder="Masukkan password">
						@error('password')
							<div class="invalid-feedback">
								Password minimal 6 karakter
							</div>
						@enderror
					</div>
				</div>
				<div class="row align-items-center mb-3">
					<label class="col-sm-2 form-label" for="peran">Peran</label>
					<div class="col-sm-10">
						<select class="form-select @error('peran') is-invalid @enderror" id="peran" wire:model="peran">
							<option value="">Pilih peran</option>
							@foreach ($roles as $role)
								<option value="{{ $role->id }}">{{ $role->name }}</option>
							@endforeach
						</select>
						@error('peran')
							<div class="invalid-feedback">
								Peran harus dipilih
							</div>
						@enderror
					</div>

					<div class="row">
						<div class="col-sm-10 offset-sm-2">
							<button class="btn btn-primary" type="submit" wire:loading.attr='disabled'>Simpan</button>
						</div>
					</div>
			</form>
		@endif
		<hr />
		<table class="table-striped table-bordered table">
			<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Tanggal Masuk</th>
					<th>Peran</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->created_at }}</td>
						<td>
							@foreach ($user->roles as $peran)
								{{ $peran->name }}
							@endforeach
						</td>
						<td>
							<div class="d-flex">
								<button class="btn btn-warning me-2" wire:click='edit({{ $user->id }})'>Edit</button>

								<button class="btn btn-danger" wire:click='hapus({{ $user->id }})'
									wire:confirm='Anda akan menghapus Karyawan :: {{ $user->name }} ::'>Hapus</button>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
