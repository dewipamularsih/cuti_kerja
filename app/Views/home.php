<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; SIS CUTI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
  /* ====== GLOBAL ====== */
  body {
    background: #f8f9fc;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  /* Hilangkan style header biru bawaan */
  .main-content .section-header {
    background: none;
    box-shadow: none;
    margin: 0;
    padding: 0;
  }

  /* Judul dashboard */
  .dashboard-title {
    font-size: 2rem;
    font-weight: 700;
    color: #4e4e4e;
    margin-top: 60px;
    margin-bottom: 20px;
  }

  /* Statistik box */
  .stat-box {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.08);
    text-align: center;
    transition: transform 0.2s;
  }
  .stat-box:hover {
    transform: translateY(-4px);
  }
  .stat-box h3 {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 5px;
    color: #28a745;  /* ✅ hijau */
  }
  .stat-box p {
    margin: 0;
    color: #666;
    font-size: 0.95rem;
  }

  /* Keterangan */
  .keterangan {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    margin-top: 25px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.08);
  }
  .keterangan h5 {
    font-weight: 600;
    margin-bottom: 10px;
  }
  .legend-item {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    font-size: 0.95rem;
  }
  .legend-dot {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    margin-right: 10px;
  }
  .legend-merah { background: #dc3545; }
  .legend-kuning { background: #ffc107; }
  .legend-hijau { background: #28a745; } /* ✅ ganti dari biru ke hijau */

  /* Kalender */
  #calendar {
    background: #fff;
    margin-top: 25px;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.08);
  }

  /* Navbar hijau */
  .navbar-bg, .main-navbar {
    background: #28a745 !important;
  }
</style>

<div class="section-body">
  <!-- Judul dashboard -->
  <h1 class="dashboard-title">Dashboard</h1>

  <!-- Statistik -->
  <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
      <div class="stat-box">
        <h3><?= countData('pegawai') ?></h3>
        <p>Total Pegawai</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
      <div class="stat-box">
        <h3><?= countData('pengumuman') ?></h3>
        <p>Total Pengumuman</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
      <div class="stat-box">
        <h3><?= countData('cuti') ?></h3>
        <p>Total Pengajuan Cuti</p>
      </div>
    </div>
  </div>

  <!-- Keterangan -->
  <div class="keterangan">
    <h5>Keterangan</h5>
    <p>Berikut keterangan warna yang ada di kalender:</p>
    <div class="legend-item">
      <div class="legend-dot legend-merah"></div>
      <span>Merah - Tanggal sudah diambil karyawan lain.</span>
    </div>
    <div class="legend-item">
      <div class="legend-dot legend-kuning"></div>
      <span>Kuning - Tanggal karyawan belum dikonfirmasi.</span>
    </div>
    <div class="legend-item">
      <div class="legend-dot legend-hijau"></div>
      <span>Hijau - Tanggal karyawan dikonfirmasi staff.</span>
    </div>
  </div>

  <!-- Kalender -->
  <div id="calendar"></div>
</div>

<!-- FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      height: 600,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: ''
      },
      events: [
        { title: 'Cuti Diambil', start: '2025-10-02', color: '#dc3545' },
        { title: 'Menunggu Konfirmasi', start: '2025-10-08', color: '#ffc107' },
        { title: 'Sudah Dikonfirmasi', start: '2025-10-15', color: '#28a745' } // ✅ hijau
      ]
    });
    calendar.render();
  });
</script>

<?= $this->endSection() ?>
