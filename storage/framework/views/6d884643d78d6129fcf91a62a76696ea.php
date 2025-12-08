<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistem Informasi Inventory</title>
	<link type="image/png" href="<?php echo e(asset('gambar/logo.png')); ?>" rel="icon">
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<style>
		:root {
			--primary-gradient: linear-gradient(135deg, #005461 0%, #018790 50%, #6AECE1 100%);
			--primary-dark: #005461;
			--primary-light: #6AECE1;
			--accent-color: #018790;
			--text-dark: #2d3748;
			--text-light: #ffffff;
			--bg-light: #f7fafc;
			--transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
			min-height: 100vh;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		/* Gaya untuk loading bar */
		.loading-bar {
			position: fixed;
			top: 0;
			left: 0;
			height: 3px;
			width: 100%;
			background: linear-gradient(90deg, #005461 0%, #018790 50%, #6AECE1 100%);
			animation: loading 2s infinite ease-in-out;
			z-index: 9999;
		}

		@keyframes loading {
			0% {
				transform: translateX(-100%);
			}
			50% {
				transform: translateX(0%);
			}
			100% {
				transform: translateX(100%);
			}
		}

		/* Sidebar Modern Styling */
		.sidebar {
			background: linear-gradient(180deg, #005461 0%, #018790 50%, #6AECE1 100%);
			height: 100vh;
			color: white;
			padding: 30px 0;
			width: 280px;
			position: fixed;
			left: 0;
			top: 0;
			overflow-y: auto;
			box-shadow: 4px 0 15px rgba(0, 84, 97, 0.3);
			transition: width 0.3s ease;
		}

		.sidebar::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
			pointer-events: none;
		}

		.sidebar-header {
			padding: 0 20px;
			text-align: center;
			margin-bottom: 30px;
			position: relative;
			z-index: 1;
		}

		.sidebar-header img {
			width: 70px;
			height: 70px;
			margin-bottom: 15px;
			border-radius: 50%;
			padding: 5px;
			background: rgba(255, 255, 255, 0.1);
			border: 2px solid rgba(255, 255, 255, 0.3);
			transition: var(--transition);
		}

		.sidebar-header img:hover {
			transform: scale(1.05);
			box-shadow: 0 5px 15px rgba(209, 125, 152, 0.3);
		}

		.sidebar-header h5 {
			font-size: 16px;
			font-weight: 700;
			margin-bottom: 8px;
			letter-spacing: 0.5px;
		}

		.sidebar-header p {
			font-size: 12px;
			opacity: 0.85;
			font-weight: 500;
			letter-spacing: 0.3px;
		}

		.sidebar .nav {
			padding: 0 12px;
			position: relative;
			z-index: 1;
		}

		.sidebar .nav-link {
			color: rgba(255, 255, 255, 0.85);
			font-weight: 500;
			border: none;
			border-radius: 10px;
			margin: 8px 0;
			padding: 12px 16px;
			width: 100%;
			text-align: left;
			display: flex;
			align-items: center;
			gap: 12px;
			font-size: 14px;
			position: relative;
			overflow: hidden;
			transition: var(--transition);
		}

		.sidebar .nav-link::before {
			content: '';
			position: absolute;
			top: 0;
			left: -100%;
			width: 100%;
			height: 100%;
			background: rgba(255, 255, 255, 0.1);
			transition: left 0.3s ease;
			z-index: -1;
		}

		.sidebar .nav-link:hover::before {
			left: 0;
		}

		.sidebar .nav-link:hover {
			color: white;
			background: rgba(255, 255, 255, 0.15);
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
			transform: translateX(5px);
		}

		.sidebar .nav-link.active {
			background: rgba(255, 255, 255, 0.25);
			color: white;
			box-shadow: inset 0 0 10px rgba(209, 125, 152, 0.3), 0 5px 15px rgba(0, 0, 0, 0.2);
			font-weight: 600;
			border-left: 4px solid var(--accent-color);
			padding-left: 12px;
		}

		.sidebar .nav-link svg {
			width: 18px;
			height: 18px;
			flex-shrink: 0;
			filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1));
		}

		.content {
			margin-left: 280px;
			padding: 20px;
			flex: 1;
			background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.9) 100%);
			min-height: 100vh;
		}

		.header {
			background: linear-gradient(135deg, #005461 0%, #018790 50%, #6AECE1 100%);
			color: white;
			padding: 20px 25px;
			font-weight: 600;
			border-radius: 12px;
			box-shadow: 0 5px 15px rgba(0, 84, 97, 0.3);
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 20px;
		}

		.header h5 {
			margin: 0;
			font-size: 18px;
		}

		.header .dropdown-toggle {
			background: rgba(255, 255, 255, 0.2) !important;
			color: white !important;
			border: 1px solid rgba(255, 255, 255, 0.3) !important;
			border-radius: 8px;
			padding: 8px 16px !important;
			font-size: 14px;
			transition: var(--transition);
		}

		.header .dropdown-toggle:hover {
			background: rgba(255, 255, 255, 0.3) !important;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
		}

		.content-container {
			background-color: white;
			padding: 20px;
			border-radius: 12px;
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
		}

		.table-container {
			background-color: white;
			padding: 20px;
			border-radius: 12px;
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
		}

		.btn-excel {
			background: linear-gradient(135deg, #34a853 0%, #2d8e47 100%);
			color: white;
			border: none;
			border-radius: 8px;
			font-weight: 600;
			transition: var(--transition);
		}

		.btn-excel:hover {
			box-shadow: 0 5px 15px rgba(52, 168, 83, 0.4);
			transform: translateY(-2px);
		}

		.btn-pdf {
			background: linear-gradient(135deg, #ea4335 0%, #c5221f 100%);
			color: white;
			border: none;
			border-radius: 8px;
			font-weight: 600;
			transition: var(--transition);
		}

		.btn-pdf:hover {
			box-shadow: 0 5px 15px rgba(234, 67, 53, 0.4);
			transform: translateY(-2px);
		}

		.btn-pink {
			background: linear-gradient(135deg, #ff69b4 0%, #ff1493 100%);
			color: white;
			border: none;
			border-radius: 8px;
			font-weight: 600;
			transition: var(--transition);
		}

		.btn-pink:hover {
			box-shadow: 0 5px 15px rgba(255, 105, 180, 0.4);
			transform: translateY(-2px);
		}

		/* Scrollbar styling */
		.sidebar::-webkit-scrollbar {
			width: 6px;
		}

		.sidebar::-webkit-scrollbar-track {
			background: rgba(255, 255, 255, 0.1);
		}

		.sidebar::-webkit-scrollbar-thumb {
			background: rgba(255, 255, 255, 0.3);
			border-radius: 3px;
		}

		.sidebar::-webkit-scrollbar-thumb:hover {
			background: rgba(255, 255, 255, 0.5);
		}

		/* Responsive */
		@media (max-width: 768px) {
			.sidebar {
				position: fixed;
				left: -280px;
				top: 0;
				bottom: 0;
				height: 100vh;
				z-index: 1000;
				transition: left 0.3s ease;
				overflow-y: auto;
				box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
			}

			.sidebar.active {
				left: 0;
			}

			.sidebar-overlay {
				display: none;
				position: fixed;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background: rgba(0, 0, 0, 0.5);
				z-index: 999;
			}

			.sidebar-overlay.active {
				display: block;
			}

			.toggle-sidebar {
				display: none;
				position: fixed;
				bottom: 20px;
				right: 20px;
				width: 50px;
				height: 50px;
				background: linear-gradient(135deg, #005461 0%, #018790 100%);
				border: none;
				border-radius: 50%;
				color: white;
				font-size: 24px;
				cursor: pointer;
				z-index: 998;
				box-shadow: 0 4px 12px rgba(0, 84, 97, 0.4);
				transition: all 0.3s ease;
			}

			.toggle-sidebar:hover {
				transform: scale(1.1);
				box-shadow: 0 6px 16px rgba(0, 84, 97, 0.6);
			}

			.toggle-sidebar:active {
				transform: scale(0.95);
			}

			body.sidebar-open .toggle-sidebar {
				display: flex;
				align-items: center;
				justify-content: center;
			}

			.content {
				margin-left: 0;
				padding: 15px;
			}
		}
	</style>
</head>

<body>

	<div class="d-flex">
		<!-- Sidebar -->
		<div class="sidebar d-flex flex-column">
			<div class="sidebar-header">
				<img src="<?php echo e(asset('gambar/logo.png')); ?>" alt="Logo">
				<h5 class="text-white">Sistem Inventory</h5>
				<p>DD Knalpot Racing</p>
			</div>
			<nav class="nav flex-column flex-grow-1">
				<a class="nav-link <?php echo e(Request::is('/') || Request::is('home') ? 'active' : ''); ?>" href="<?php echo e(url('/')); ?>"
					wire:navigate>
					<svg class="bi bi-speedometer2" fill="currentColor" height="18" viewBox="0 0 16 16" width="18"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M8 4.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zM7 8a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm.354-1.646a.5.5 0 1 0-.708.708.5.5 0 0 0 .708-.708zm2.292 0a.5.5 0 1 1 .708.708.5.5 0 0 1-.708-.708z"/>
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
					</svg>
					<span>Dashboard</span>
				</a>
				<a class="nav-link <?php echo e(Request::is('barang/masuk*') ? 'active' : ''); ?>" href="<?php echo e(url('/barang/masuk')); ?>"
					wire:navigate>
					<svg class="bi bi-box-arrow-in-right" fill="currentColor" height="18" viewBox="0 0 16 16" width="18"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M6 3.5A1.5 1.5 0 0 1 7.5 2h6A1.5 1.5 0 0 1 15 3.5v9A1.5 1.5 0 0 1 13.5 14h-6A1.5 1.5 0 0 1 6 12.5V10H5v2.5A2.5 2.5 0 0 0 7.5 15h6a2.5 2.5 0 0 0 2.5-2.5v-9A2.5 2.5 0 0 0 13.5 1h-6A2.5 2.5 0 0 0 5 3.5V6h1V3.5z"
							fill-rule="evenodd" />
						<path
							d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"
							fill-rule="evenodd" />
					</svg>
					<span>Barang Masuk</span>
				</a>
				<a class="nav-link <?php echo e(Request::is('barang/keluar*') ? 'active' : ''); ?>" href="<?php echo e(url('/barang/keluar')); ?>"
					wire:navigate>
					<svg class="bi bi-box-arrow-in-left" fill="currentColor" height="18" viewBox="0 0 16 16" width="18"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M10 3.5A1.5 1.5 0 0 0 8.5 2h-6A1.5 1.5 0 0 0 1 3.5v9A1.5 1.5 0 0 0 2.5 14h6a1.5 1.5 0 0 0 1.5-1.5V10h1v2.5A2.5 2.5 0 0 1 8.5 15h-6A2.5 2.5 0 0 1 0 12.5v-9A2.5 2.5 0 0 1 2.5 1h6A2.5 2.5 0 0 1 11 3.5V6h-1V3.5z" />
						<path
							d="M15.854 8.354a.5.5 0 0 1 0-.708l-3-3a.5.5 0 0 1 .708-.708L16.707 7.5H7.5a.5.5 0 0 1 0 1h9.207l-2.147 2.146a.5.5 0 0 1-.708-.708l3-3z" />
					</svg>
					<span>Barang Keluar</span>
				</a>
				<a class="nav-link <?php echo e(Request::is('transaksi/penjualan*') ? 'active' : ''); ?>"
					href="<?php echo e(url('/transaksi/penjualan')); ?>" wire:navigate>
					<svg class="bi bi-cart" fill="currentColor" height="18" viewBox="0 0 16 16" width="18"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M0 1a.5.5 0 0 1 .5-.5h1.11l.4 1.607L3.888 5.68l-.857 3.428A1.5 1.5 0 0 0 4.5 10.5h9a.5.5 0 0 1 0 1h-9a2.5 2.5 0 0 1-2.462-2.102L1.3 2H.5a.5.5 0 0 1-.5-.5zM5.3 5.41l-.823 3.294A.5.5 0 0 0 5 9.5h8a.5.5 0 0 0 .493-.41l.823-3.294H5.3z" />
						<path d="M7 4.5A1.5 1.5 0 1 1 7 1a1.5 1.5 0 0 1 0 3.5zm7 0A1.5 1.5 0 1 1 14 1a1.5 1.5 0 0 1 0 3.5z" />
					</svg>
					<span>Penjualan</span>
				</a>
				<a class="nav-link <?php echo e(Request::is('transaksi/pembelian*') ? 'active' : ''); ?>"
					href="<?php echo e(url('/transaksi/pembelian')); ?>" wire:navigate>
					<svg class="bi bi-receipt" fill="currentColor" height="18" viewBox="0 0 16 16" width="18"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M1 1.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5V4h-13V1.5zM0 4v10.5a.5.5 0 0 0 .74.447L3.5 13.07l2.26 1.88a.5.5 0 0 0 .74 0L8.76 13.07l2.26 1.88a.5.5 0 0 0 .74 0L14.76 13.07l2.26 1.88A.5.5 0 0 0 16 14.5V4h-16z" />
						<path d="M1 8h14v1H1V8zm0 2h14v1H1v-1z" />
					</svg>
					<span>Pembelian</span>
				</a>
				<?php if (app('laratrust')->hasRole('admin')) : ?>
					<a class="nav-link <?php echo e(Request::is('laporan*') ? 'active' : ''); ?>" href="<?php echo e(url('/laporan')); ?>" wire:navigate>
						<svg class="bi bi-file-earmark-text" fill="currentColor" height="18" viewBox="0 0 16 16" width="18"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M5 10.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
							<path d="M6.5 7a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z" />
							<path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM10.5 3v2a1 1 0 0 0 1 1h2l-3-3z" />
						</svg>
						<span>Laporan</span>
					</a>
					<a class="nav-link <?php echo e(Request::is('karyawan*') ? 'active' : ''); ?>" href="<?php echo e(url('/karyawan')); ?>" wire:navigate>
						<svg class="bi bi-person-fill" fill="currentColor" height="18" viewBox="0 0 16 16" width="18"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M3 14s-1 0-1-1 1-2 4-2 4 2 4 2 0 1-1 1H3zm1-9a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
							<path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4c0 2.5-2 4-4 4S4 6.5 4 4a4 4 0 0 1 4-4z" />
						</svg>
						<span>Karyawan</span>
					</a>
				<?php endif; // app('laratrust')->hasRole ?>
			</nav>
		</div>

		<!-- Content -->
		<div class="content w-100">
			<div class="header d-flex justify-content-between align-items-center">
				<h5>Sistem Informasi Inventory DD Knalpot Racing</h5>
				<div class="dropdown">
					<button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" type="button" aria-expanded="false">
						<?php echo e(Auth::user()->name); ?>

					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil</a></li>
						<li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
								onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt me-2"></i>Keluar</a></li>
					</ul>
					<form class="d-none" id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
						<?php echo csrf_field(); ?>
					</form>
				</div>
			</div>
			<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($slot)): ?>
				<?php echo e($slot); ?>

			<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

			<!-- Table Container -->
			
		</div>
	</div>

	<!-- Sidebar Overlay untuk Mobile -->
	<div class="sidebar-overlay" id="sidebarOverlay"></div>

	<!-- Toggle Sidebar Button untuk Mobile -->
	<button class="toggle-sidebar" id="toggleSidebar">
		<span>☰</span>
	</button>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<?php if (isset($component)) { $__componentOriginal8344cca362e924d63cb0780eb5ae3ae6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8344cca362e924d63cb0780eb5ae3ae6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-alert::components.scripts','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-alert::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8344cca362e924d63cb0780eb5ae3ae6)): ?>
<?php $attributes = $__attributesOriginal8344cca362e924d63cb0780eb5ae3ae6; ?>
<?php unset($__attributesOriginal8344cca362e924d63cb0780eb5ae3ae6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8344cca362e924d63cb0780eb5ae3ae6)): ?>
<?php $component = $__componentOriginal8344cca362e924d63cb0780eb5ae3ae6; ?>
<?php unset($__componentOriginal8344cca362e924d63cb0780eb5ae3ae6); ?>
<?php endif; ?>

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<!-- Sidebar Toggle Functionality -->
	<script>
		function toggleSidebar() {
			const sidebar = document.querySelector('.sidebar');
			const overlay = document.getElementById('sidebarOverlay');
			
			sidebar.classList.toggle('active');
			overlay.classList.toggle('active');
		}

		// Toggle button click handler
		const toggleBtn = document.getElementById('toggleSidebar');
		if (toggleBtn) {
			toggleBtn.addEventListener('click', toggleSidebar);
		}

		// Overlay click handler - close sidebar
		const overlay = document.getElementById('sidebarOverlay');
		if (overlay) {
			overlay.addEventListener('click', toggleSidebar);
		}

		// Close sidebar when a navigation link is clicked
		const navLinks = document.querySelectorAll('.sidebar .nav-link');
		navLinks.forEach(link => {
			link.addEventListener('click', () => {
				// Only close on mobile (when toggle button is visible)
				if (window.innerWidth <= 768) {
					const sidebar = document.querySelector('.sidebar');
					const overlay = document.getElementById('sidebarOverlay');
					sidebar.classList.remove('active');
					overlay.classList.remove('active');
				}
			});
		});

		// Handle window resize
		window.addEventListener('resize', () => {
			if (window.innerWidth > 768) {
				const sidebar = document.querySelector('.sidebar');
				const overlay = document.getElementById('sidebarOverlay');
				sidebar.classList.remove('active');
				overlay.classList.remove('active');
			}
		});
	</script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\Inventory dan Penjualan\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>