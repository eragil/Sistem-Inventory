<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login — DD Knalpot Racing</title>
	<style>
		*{margin:0;padding:0;box-sizing:border-box}
		html,body{height:100%;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}
		body{display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#005461 0%,#018790 50%,#6AECE1 100%);min-height:100vh;padding:20px}

		.login-container{display:flex;width:100%;max-width:1000px;background:#ffffff;border-radius:20px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,0.3)}

		.login-left{background:linear-gradient(180deg,#005461 0%,#018790 50%,#6AECE1 100%);color:white;padding:60px 40px;display:flex;flex-direction:column;justify-content:center;align-items:center;min-width:40%;position:relative;overflow:hidden}

		.login-left::before{content:'';position:absolute;top:-50%;right:-50%;width:500px;height:500px;background:radial-gradient(circle,rgba(255,255,255,0.1) 0%,transparent 70%);border-radius:50%;pointer-events:none}

		.login-left::after{content:'';position:absolute;bottom:-30%;left:-30%;width:400px;height:400px;background:radial-gradient(circle,rgba(255,255,255,0.05) 0%,transparent 70%);border-radius:50%;pointer-events:none}

		.logo-wrap{position:relative;z-index:1;margin-bottom:40px;text-align:center}
		.logo-wrap img{width:100px;height:100px;border-radius:50%;background:#ffffff;padding:10px;box-shadow:0 10px 30px rgba(0,0,0,0.2)}

		.brand-text{position:relative;z-index:1}
		.brand-text h2{font-size:28px;font-weight:700;margin-bottom:10px;text-shadow:0 2px 4px rgba(0,0,0,0.1)}
		.brand-text p{font-size:14px;opacity:0.9;font-weight:500}

		.login-right{padding:60px 40px;flex:1;display:flex;flex-direction:column;justify-content:center}

		.login-title{margin-bottom:30px}
		.login-title h3{font-size:24px;color:#2d3748;font-weight:700;margin-bottom:8px}
		.login-title p{color:#718096;font-size:14px}

		.form-group{margin-bottom:20px}
		.form-group label{display:block;font-size:13px;color:#4a5568;font-weight:600;margin-bottom:8px;text-transform:uppercase;letter-spacing:0.5px}

		.form-group input{width:100%;padding:14px 16px;border:2px solid #e2e8f0;border-radius:12px;font-size:14px;transition:all 0.3s;background:#f7fafc;font-family:inherit}
		.form-group input:focus{outline:none;border-color:#018790;background:#ffffff;box-shadow:0 0 0 3px rgba(1,135,144,0.1)}

		.password-container{position:relative}
		.toggle-pass{position:absolute;right:14px;top:44px;background:transparent;border:none;color:#a0aec0;cursor:pointer;font-size:18px;padding:4px 8px}
		.toggle-pass:hover{color:#018790}

		.form-actions{display:flex;align-items:center;justify-content:space-between;margin-top:24px;gap:12px}
		.remember-me{display:flex;align-items:center;gap:8px;font-size:13px}
		.remember-me input{width:18px;height:18px;cursor:pointer;accent-color:#018790}
		.forgot-link{color:#018790;text-decoration:none;font-size:13px;font-weight:600;transition:color 0.3s}
		.forgot-link:hover{color:#005461}

		.btn-login{width:100%;padding:14px;background:linear-gradient(135deg,#005461 0%,#018790 50%,#6AECE1 100%);color:white;border:none;border-radius:12px;font-size:15px;font-weight:600;cursor:pointer;transition:all 0.3s;margin-top:28px;text-transform:uppercase;letter-spacing:0.5px;box-shadow:0 4px 15px rgba(0,84,97,0.4)}
		.btn-login:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(0,84,97,0.6)}
		.btn-login:active{transform:translateY(0)}

		.footer-text{text-align:center;margin-top:30px;font-size:13px;color:#718096}

		.error{color:#e53e3e;font-size:12px;margin-top:6px;font-weight:500}
		.is-invalid{border-color:#e53e3e !important}

		@media(max-width:768px){
			.login-container{flex-direction:column;max-width:100%;border-radius:16px}
			.login-left{min-width:100%;padding:40px 30px;min-height:200px}
			.login-right{padding:40px 30px}
			.login-left h2{font-size:24px}
			.brand-text p{font-size:12px}
			.logo-wrap img{width:80px;height:80px}
		}
	</style>
</head>

<body>
	<div class="login-container">
		<div class="login-left">
			<div class="logo-wrap">
				<img src="{{ asset('gambar/logo.png') }}" alt="Logo">
			</div>
			<div class="brand-text">
				<h2>DD Knalpot Racing</h2>
				<p>Sistem Manajemen Inventory & Penjualan</p>
			</div>
		</div>

		<div class="login-right">
			<div class="login-title">
				<h3>Selamat Datang</h3>
				<p>Masuk ke akun Anda untuk melanjutkan</p>
			</div>

			<form method="POST" action="{{ route('login') }}">
				@csrf

				<div class="form-group">
					<label for="email">Email</label>
					<input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="nama@example.com" class="@error('email') is-invalid @enderror">
					@error('email')<div class="error">{{ $message }}</div>@enderror
				</div>

				<div class="form-group password-container">
					<label for="password">Password</label>
					<input id="password" name="password" type="password" required autocomplete="current-password" placeholder="••••••••" class="@error('password') is-invalid @enderror">
					<button type="button" class="toggle-pass" aria-label="Show password" onclick="(function(){const p=document.getElementById('password');p.type = p.type === 'password' ? 'text' : 'password'; this.textContent = p.type === 'password' ? '👁️' : '🙈' }).call(this)">👁️</button>
					@error('password')<div class="error">{{ $message }}</div>@enderror
				</div>

				<div class="form-actions">
					<label class="remember-me">
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
						<span>Ingat saya</span>
					</label>
					<a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
				</div>

				<button type="submit" class="btn-login">Masuk</button>
			</form>

			<div class="footer-text">Belum punya akun? Hubungi admin untuk mendaftar.</div>
		</div>
	</div>

</body>

</html>
