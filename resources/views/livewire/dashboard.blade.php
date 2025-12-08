<div class="dashboard-container">
    <!-- Welcome Section -->
    <div class="welcome-section mb-4">
        <h1 class="welcome-title">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
        <p class="welcome-subtitle">Berikut adalah ringkasan data inventory Anda</p>
    </div>

    <!-- KPI Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-barang">
                <div class="kpi-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1 2a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V2zm5 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V2zm5 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V2zM1 7a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V7zm5 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V7zm5 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V7zM1 12a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-3zm5 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-3zm5 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-3"/>
                    </svg>
                </div>
                <div class="kpi-content">
                    <p class="kpi-label">Total Barang</p>
                    <h3 class="kpi-value">{{ number_format($totalBarang) }}</h3>
                    <small class="kpi-subtitle">Unit</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-penjualan">
                <div class="kpi-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v5A1.5 1.5 0 0 1 5.5 9h-3A1.5 1.5 0 0 1 1 7.5v-5zM2.5 2a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v5A1.5 1.5 0 0 1 13.5 9h-3A1.5 1.5 0 0 1 9 7.5v-5zm1.5-.5a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-3zM1 12.5A1.5 1.5 0 0 1 2.5 11h3a1.5 1.5 0 0 1 1.5 1.5v3A1.5 1.5 0 0 1 5.5 17h-3a1.5 1.5 0 0 1-1.5-1.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 11h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a1.5 1.5 0 0 1-1.5-1.5v-3a1.5 1.5 0 0 1 1.5-1.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                    </svg>
                </div>
                <div class="kpi-content">
                    <p class="kpi-label">Penjualan</p>
                    <h3 class="kpi-value">{{ $totalPenjualan }}</h3>
                    <small class="kpi-subtitle">Transaksi</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-pembelian">
                <div class="kpi-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 1a1 1 0 0 1 1-1h4.083c.572 0 1.14.166 1.642.478.884.502 1.385 1.35 1.628 2H6a.5.5 0 0 0 0 1v-.5a.5.5 0 0 0 0-1H4.12c.044.524.23 1.003.478 1.402.504.829 1.006 1.852 1.582 2.953.464.898.737 2.062.82 3.12H14a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm9 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                </div>
                <div class="kpi-content">
                    <p class="kpi-label">Pembelian</p>
                    <h3 class="kpi-value">{{ $totalPembelian }}</h3>
                    <small class="kpi-subtitle">Transaksi</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-keluar">
                <div class="kpi-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                        <path fill-rule="evenodd" d="M8 4.754a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5a.75.75 0 0 1 .75-.75z"/>
                    </svg>
                </div>
                <div class="kpi-content">
                    <p class="kpi-label">Barang Keluar</p>
                    <h3 class="kpi-value">{{ $totalBarangKeluar }}</h3>
                    <small class="kpi-subtitle">Transaksi</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Data -->
    <div class="row mb-4">
        <!-- Chart Penjualan -->
        <div class="col-lg-6 mb-3">
            <div class="card chart-card">
                <div class="card-header chart-header">
                    <h5 class="mb-0">📊 Penjualan 7 Hari Terakhir</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartPenjualan"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart Pembelian -->
        <div class="col-lg-6 mb-3">
            <div class="card chart-card">
                <div class="card-header chart-header">
                    <h5 class="mb-0">📈 Pembelian 7 Hari Terakhir</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartPembelian"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue Section -->
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card revenue-card revenue-income">
                <div class="card-body">
                    <div class="revenue-icon">💰</div>
                    <h5 class="revenue-label">Pendapatan Bulan Ini</h5>
                    <p class="revenue-value">Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card revenue-card revenue-expense">
                <div class="card-body">
                    <div class="revenue-icon">💸</div>
                    <h5 class="revenue-label">Pengeluaran Bulan Ini</h5>
                    <p class="revenue-value">Rp {{ number_format($pengeluaranBulanIni, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Products and Low Stock removed (UI only) -->

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <!-- Dashboard CSS -->
    <style>
    .dashboard-container {
        padding: 0;
        width: 100%;
        box-sizing: border-box;
    }

    .welcome-section {
        margin-bottom: 20px;
        padding: 20px 0 0 0;
    }

    .welcome-title {
        font-size: 28px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 5px;
        margin-top: 0;
    }

    .welcome-subtitle {
        font-size: 14px;
        color: #718096;
        margin-bottom: 0;
    }

    /* KPI Cards */
    .kpi-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-left: 4px solid;
    }

    .kpi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .kpi-barang {
        border-left-color: #005461;
    }

    .kpi-penjualan {
        border-left-color: #018790;
    }

    .kpi-pembelian {
        border-left-color: #6AECE1;
    }

    .kpi-keluar {
        border-left-color: #B3F5FF;
    }

    .kpi-icon {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .kpi-barang .kpi-icon {
        background: rgba(0, 84, 97, 0.1);
        color: #005461;
    }

    .kpi-penjualan .kpi-icon {
        background: rgba(1, 135, 144, 0.1);
        color: #018790;
    }

    .kpi-pembelian .kpi-icon {
        background: rgba(106, 236, 225, 0.1);
        color: #018790;
    }

    .kpi-keluar .kpi-icon {
        background: rgba(179, 245, 255, 0.2);
        color: #005461;
    }

    .kpi-icon svg {
        width: 24px;
        height: 24px;
    }

    .kpi-content {
        flex: 1;
    }

    .kpi-label {
        font-size: 12px;
        color: #718096;
        margin-bottom: 5px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .kpi-value {
        font-size: 24px;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
    }

    .kpi-subtitle {
        font-size: 11px;
        color: #a0aec0;
    }

    /* Chart Cards */
    .chart-card,
    .data-card,
    .revenue-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .chart-header,
    .data-header {
        background: linear-gradient(135deg, #005461 0%, #018790 100%);
        color: white;
        border: none;
        padding: 15px 20px;
    }

    .chart-card .card-body,
    .data-card .card-body {
        padding: 20px;
    }

    /* Revenue Cards */
    .revenue-card {
        border-top: 4px solid;
    }

    .revenue-income {
        border-top-color: #018790;
    }

    .revenue-expense {
        border-top-color: #6AECE1;
    }

    .revenue-card .card-body {
        padding: 25px;
        text-align: center;
    }

    .revenue-icon {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .revenue-label {
        color: #718096;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
    }

    .revenue-value {
        font-size: 28px;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
    }

    /* Table Styling */
    .table-responsive {
        border-radius: 8px;
        overflow-x: auto;
    }

    .table {
        margin-bottom: 0;
        min-width: 100%;
    }

    .table thead th {
        background: #f7fafc;
        color: #2d3748;
        font-weight: 600;
        border-bottom: 2px solid #e2e8f0;
        padding: 12px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table tbody td {
        padding: 12px;
        vertical-align: middle;
        border-bottom: 1px solid #e2e8f0;
    }

    .table tbody tr:hover {
        background: #f7fafc;
    }

    .badge {
        padding: 5px 10px;
        font-size: 11px;
        font-weight: 600;
    }

    .badge-primary {
        background: linear-gradient(135deg, #005461 0%, #018790 100%);
    }

    .badge-warning {
        background: linear-gradient(135deg, #6AECE1 0%, #B3F5FF 100%);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 0;
        }

        .welcome-section {
            padding: 15px 0 0 0;
            margin-bottom: 15px;
        }

        .welcome-title {
            font-size: 22px;
            margin-bottom: 3px;
        }

        .welcome-subtitle {
            font-size: 12px;
        }

        .row {
            margin-left: -5px !important;
            margin-right: -5px !important;
        }

        .col-md-6 {
            padding-left: 5px !important;
            padding-right: 5px !important;
        }

        .kpi-card {
            padding: 12px;
        }

        .kpi-value {
            font-size: 18px;
        }
    }
</style>

<!-- Chart Data Storage -->
<div id="chartData" data-penjualan="{{ $chartDataPenjualan }}" data-pembelian="{{ $chartDataPembelian }}" style="display:none;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chartDataElement = document.getElementById('chartData');
        const chartDataPenjualan = JSON.parse(chartDataElement.dataset.penjualan);
        const chartDataPembelian = JSON.parse(chartDataElement.dataset.pembelian);

        // Chart Penjualan
        const ctxPenjualan = document.getElementById('chartPenjualan').getContext('2d');
        new Chart(ctxPenjualan, {
            type: 'line',
            data: {
                labels: chartDataPenjualan.map(d => d.label),
                datasets: [{
                    label: 'Jumlah Penjualan',
                    data: chartDataPenjualan.map(d => d.value),
                    borderColor: '#018790',
                    backgroundColor: 'rgba(1, 135, 144, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#018790',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#718096',
                            font: {
                                size: 12,
                                weight: '600'
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#718096',
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#718096',
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Chart Pembelian
        const ctxPembelian = document.getElementById('chartPembelian').getContext('2d');
        new Chart(ctxPembelian, {
            type: 'line',
            data: {
                labels: chartDataPembelian.map(d => d.label),
                datasets: [{
                    label: 'Jumlah Pembelian',
                    data: chartDataPembelian.map(d => d.value),
                    borderColor: '#6AECE1',
                    backgroundColor: 'rgba(106, 236, 225, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#6AECE1',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#718096',
                            font: {
                                size: 12,
                                weight: '600'
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#718096',
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#718096',
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
</div>
