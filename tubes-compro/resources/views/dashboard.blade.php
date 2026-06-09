<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ATC Personel Planner</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-bg: #0B192C;
            --sidebar-hover: #1E3A5F;
            --sidebar-active: #0D6EFD;
            --text-main: #FFFFFF;
            --text-muted: #A0B2C6;
            --bg-main: #F8F9FA;
            
            --cell-header-pagi: #FDE6B0;
            --cell-header-siang: #F7C39C;
            --cell-header-malam: #A9B4F9;
            
            --cell-pagi: #FFF4D2;
            --cell-siang: #FDE8D7;
            --cell-malam: #E6E9FE;
            --cell-label: #FFFFFF;
            
            --border-color: #E2E8F0;
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
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .title-section h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #000;
        }

        .title-section p {
            font-size: 16px;
            color: #666;
        }

        .filters {
            display: flex;
            gap: 15px;
        }

        .filter-box {
            display: flex;
            align-items: center;
            background: #FFF;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 13px;
            color: #333;
            cursor: pointer;
            min-width: 150px;
            justify-content: space-between;
        }

        .filter-box i {
            color: #666;
        }

        /* Card */
        .card {
            background: #FFF;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #000;
        }

        /* Table */
        .table-container {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .schedule-table th, .schedule-table td {
            border: 1px solid var(--border-color);
            padding: 15px 10px;
        }

        .schedule-table th {
            font-weight: 600;
            font-size: 14px;
            color: #000;
        }

        .schedule-table th span {
            display: block;
            font-weight: 400;
            font-size: 12px;
            margin-top: 4px;
        }

        .schedule-table td {
            font-size: 14px;
        }

        .schedule-table td strong {
            display: block;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 4px;
            color: #000;
        }
        
        .schedule-table td span {
            color: #444;
        }

        /* Table Colors */
        .col-posisi { background-color: #FFF; width: 15%; font-weight: 600; font-size: 16px !important; }
        .col-pagi-header { background-color: var(--cell-header-pagi); width: 28%; }
        .col-siang-header { background-color: var(--cell-header-siang); width: 28%; }
        .col-malam-header { background-color: var(--cell-header-malam); width: 28%; }

        .cell-pagi { background-color: var(--cell-pagi); }
        .cell-siang { background-color: var(--cell-siang); }
        .cell-malam { background-color: var(--cell-malam); }
        .cell-posisi { background-color: #FFF; font-weight: 600; font-size: 18px !important; color: #000; }

        /* Footer */
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .legend {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            font-weight: 600;
        }

        .legend-item {
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .legend-pagi { background-color: var(--cell-header-pagi); }
        .legend-siang { background-color: var(--cell-header-siang); }
        .legend-malam { background-color: var(--cell-header-malam); }

        .btn-export {
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

        .btn-export:hover {
            background-color: #0b5ed7;
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
            <li><a href="/" class="active"><i class="fa-solid fa-table-cells-large"></i> Dashboard</a></li>
            <li><a href="/jadwal"><i class="fa-regular fa-calendar"></i> Jadwal</a></li>
            <li><a href="/input-jadwal"><i class="fa-regular fa-calendar-plus"></i> Input Jadwal</a></li>
            <li><a href="/pengurangan-hk"><i class="fa-solid fa-user-minus"></i> Pengurangan HK</a></li>

        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="title-section">
                <h1>Dashboard</h1>
                <p>Jadwal ATC</p>
            </div>
            <div class="filters">
                <div class="filter-box">
                    <span>30 Mei 2026</span>
                    <i class="fa-regular fa-calendar"></i>
                </div>
                <div class="filter-box">
                    <span>Semua Shift</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div>
        </div>

        <div class="card">
            <h2 class="card-title">Jadwal Per Tanggal</h2>
            
            <div class="table-container">
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th class="col-posisi">Posisi / Sektor</th>
                            <th class="col-pagi-header">PAGI<span>(06:00 - 12:00)</span></th>
                            <th class="col-siang-header">Siang<span>(12:00 - 18:00)</span></th>
                            <th class="col-malam-header">Malam<span>(18:00 - 23:00)</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="cell-posisi">t1</td>
                            <td class="cell-pagi"><strong>Pt1/B</strong><span>Andi, Budi</span></td>
                            <td class="cell-siang"><strong>St1/A</strong><span>Rina, Deni</span></td>
                            <td class="cell-malam"><strong>Mt1/B</strong><span>Andi, Budi</span></td>
                        </tr>
                        <tr>
                            <td class="cell-posisi">t2</td>
                            <td class="cell-pagi"><strong>Pt2/A</strong><span>Rina, Deni</span></td>
                            <td class="cell-siang"><strong>St2/C</strong><span>Eko, Fajar</span></td>
                            <td class="cell-malam"><strong>Mt2/B</strong><span>Jaka, Alif</span></td>
                        </tr>
                        <tr>
                            <td class="cell-posisi">t3</td>
                            <td class="cell-pagi"><strong>Pt3/C</strong><span>Eko, Fajar</span></td>
                            <td class="cell-siang"><strong>St3/B</strong><span>Jaka, Alif</span></td>
                            <td class="cell-malam"><strong>Mt3/C</strong><span>Rusdi, Faiz</span></td>
                        </tr>
                        <tr>
                            <td class="cell-posisi">t4</td>
                            <td class="cell-pagi"><strong>Pt4/A</strong><span>Rizal, Reza</span></td>
                            <td class="cell-siang"><strong>St4/C</strong><span>Rusdi, Faiz</span></td>
                            <td class="cell-malam"><strong>Mt4/A</strong><span>Rizal, Reza</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <div class="legend">
                    Keterangan:
                    <div class="legend-item legend-pagi">P = Pagi</div>
                    <div class="legend-item legend-siang">S = Siang</div>
                    <div class="legend-item legend-malam">M = Malam</div>
                </div>
                <button class="btn-export">
                    <i class="fa-solid fa-download"></i> Export
                </button>
            </div>
        </div>
    </div>

</body>
</html>
