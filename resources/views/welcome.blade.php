<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Login</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
			background-color: #f4f4f4;
			/* Warna latar belakang */
		}

		.login-container {
			background-color: #33cc33;
			/* Warna latar belakang kotak */
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			width: 300px;
			/* Lebar kotak */
			text-align: center;
			/* Rata tengah teks */
		}

		.logo {
			width: 100px;
			/* Lebar logo */
			margin-bottom: 20px;
			/* Jarak antara logo dan form */
		}

		h2 {
			margin-bottom: 20px;
			color: white;
			/* Warna teks judul */
		}

		.input-group {
			margin-bottom: 15px;
		}

		label {
			display: block;
			margin-bottom: 5px;
			color: #fff;
			/* Warna label */
		}

		input {
			width: 90%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 100px;
		}

		button {
			width: 100%;
			padding: 10px;
			background-color: #28a745;
			/* Warna tombol */
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #218838;
			/* Warna tombol saat hover */
		}
	</style>
</head>

<body>
	<div class="login-container">
		<img class="logo" src="{{ asset('gambar/logo.png') }}" alt="Logo">
		<!-- Ganti URL_LOGO_ANDA dengan URL gambar logo -->
		<h2>Login</h2>
		<form>
			<div class="input-group">
				<label for="email">Email:</label>
				<input id="email" type="email" placeholder="Masukkan email Anda" required>
			</div>
			<div class="input-group">
				<label for="password">Password:</label>
				<input id="password" type="password" placeholder="Masukkan password Anda" required>
			</div>
			<button type="submit">Masuk</button>
		</form>
	</div>
</body>

</html>
