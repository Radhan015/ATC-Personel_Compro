<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengurangan Hari Kerja - ATC Personel Planner</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-bg: #0B192C;
            --sidebar-hover: #1E3A5F;
            --sidebar-active: #0D6EFD;
            --text-main: #FFFFFF;
            --text-muted: #A0B2C6;
            --bg-main: #F8F9FA;
            --border-color: #E2E8F0;
            --th-dark: #374151;
            --td-border: #D1D5DB;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: var(--bg-main);
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            flex-shrink: 0;
        }

        .logo-container {
            padding: 0 20px;
            margin-bottom: 30px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
        }

        .menu {
            list-style: none;
            flex-grow: 1;
            padding: 0 15px;
        }

        .menu li {
            margin-bottom: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 14px;
            font-weight: 500;
        }

        .menu a:hover {
            background-color: var(--sidebar-hover);
            color: var(--text-main);
        }

        .menu a.active {
            background-color: var(--sidebar-active);
            color: var(--text-main);
        }

        .menu i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            padding: 30px 40px;
            overflow-y: auto;
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .title-section h1 {
            font-size: 28px;
            font-weight: 800;
            color: #000;
        }

        .btn-primary {
            background-color: #0047AB;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }

        .btn-primary:hover {
            background-color: #003380;
        }

        /* Card */
        .card {
            background: #FFF;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            min-height: 400px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #000;
        }

        /* Table */
        .table-container {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            border-radius: 6px;
            overflow: hidden;
            border: 1px solid var(--td-border);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .data-table th, .data-table td {
            border: 1px solid var(--td-border);
            padding: 12px 15px;
        }

        .data-table th {
            background-color: var(--th-dark);
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .data-table td {
            font-size: 14px;
            color: #333;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #F9FAFB;
        }

        .col-no { width: 5%; font-weight: 600; }
        .col-nama { width: 30%; text-align: left; }
        .col-jenis { width: 15%; }
        .col-mulai { width: 15%; }
        .col-selesai { width: 15%; }
        .col-durasi { width: 10%; }
        .col-aksi { width: 10%; }

        .action-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
            color: #4B5563;
        }
        .action-icons i {
            cursor: pointer;
        }
        .action-icons i:hover {
            color: #000;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            margin-top: 20px;
        }

        .page-item {
            border: 1px solid #D1D5DB;
            padding: 5px 10px;
            background-color: #FFF;
            cursor: pointer;
            font-size: 14px;
            color: #333;
        }

        .page-item.active {
            font-weight: 700;
        }

        /* Modal Overlay */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.4);
            display: none; /* Hidden by default */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-overlay.active {
            display: flex;
        }

        /* Modal Content */
        .modal {
            background-color: var(--sidebar-bg); /* Dark blue */
            color: white;
            width: 600px;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            position: relative;
        }

        .modal h2 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 500;
        }

        .form-control {
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid #FFF;
            background-color: #FFF;
            color: #333;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            width: 100%;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--sidebar-active);
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
        }

        .btn-submit {
            background-color: #0D6EFD;
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }

        .btn-submit:hover {
            background-color: #0b5ed7;
        }
        
        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
            color: white;
            font-size: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <div class="logo">
                <i class="fa-solid fa-plane-departure"></i>
                <span>ATC Personel Planner</span>
            </div>
        </div>

        <ul class="menu">
            <li><a href="/"><i class="fa-solid fa-table-cells-large"></i> Dashboard</a></li>
            <li><a href="/jadwal"><i class="fa-regular fa-calendar"></i> Jadwal</a></li>
            <li><a href="/input-jadwal"><i class="fa-regular fa-calendar-plus"></i> Input Jadwal</a></li>
            <li><a href="/pengurangan-hk" class="active"><i class="fa-solid fa-user-minus"></i> Pengurangan HK</a></li>

        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="title-section">
                <h1>Pengurangan Hari Kerja</h1>
            </div>
            <button class="btn-primary" onclick="openModal()">
                <i class="fa-solid fa-plus"></i> Tambah Pengajuan
            </button>
        </div>

        <div class="card">
            <div class="card-title">Daftar Pengajuan</div>
            
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th class="col-no">No</th>
                            <th class="col-nama">Nama Lengkap</th>
                            <th class="col-jenis">Jenis</th>
                            <th class="col-mulai">Mulai</th>
                            <th class="col-selesai">Selesai</th>
                            <th class="col-durasi">Durasi</th>
                            <th class="col-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-no">1</td>
                            <td class="col-nama">Hasanul Fikri Irawan</td>
                            <td>Sakit</td>
                            <td>20 Juni 2026</td>
                            <td>20 Jun 2026</td>
                            <td>1 Hari</td>
                            <td>
                                <div class="action-icons">
                                    <i class="fa-solid fa-trash"></i>
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-no">2</td>
                            <td class="col-nama">Putu Bagus Oktavianta</td>
                            <td>Diklat</td>
                            <td>01 Juni 2026</td>
                            <td>08 Juni 2026</td>
                            <td>8 Hari</td>
                            <td>
                                <div class="action-icons">
                                    <i class="fa-solid fa-trash"></i>
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-no">3</td>
                            <td class="col-nama">Agung Adi Wicaksono</td>
                            <td>Cuti Tahunan</td>
                            <td>22 Juni 2026</td>
                            <td>26 Juni 2026</td>
                            <td>AQS</td>
                            <td>
                                <div class="action-icons">
                                    <i class="fa-solid fa-trash"></i>
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                <div class="page-item"><i class="fa-solid fa-angles-left"></i></div>
                <div class="page-item"><i class="fa-solid fa-angle-left"></i></div>
                <div class="page-item active">1</div>
                <div class="page-item"><i class="fa-solid fa-angle-right"></i></div>
                <div class="page-item"><i class="fa-solid fa-angles-right"></i></div>
            </div>
        </div>
    </div>

    <!-- Modal Popup -->
    <div class="modal-overlay" id="tambahModal">
        <div class="modal">
            <i class="fa-solid fa-xmark close-modal" onclick="closeModal()"></i>
            <h2>Tambah Pengajuan</h2>
            
            <div class="form-grid">
                <div class="form-group">
                    <label>Personel</label>
                    <select class="form-control">
                        <option>- Pilih Personel -</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis</label>
                    <select class="form-control">
                        <option>- Pilih Jenis Pengajuan -</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal mulai</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal selesai</label>
                    <input type="date" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn-submit" onclick="closeModal()">
                    <i class="fa-solid fa-check"></i> Submit
                </button>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('tambahModal');

        function openModal() {
            modal.classList.add('active');
        }

        function closeModal() {
            modal.classList.remove('active');
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
