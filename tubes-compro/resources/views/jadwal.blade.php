<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal - ATC Personel Planner</title>
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
            
            /* Table specific */
            --th-dark: #2A3F54;
            --th-light: #3E5367;
            --th-weekend: #D1D5DB;
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

        /* Card */
        .card {
            background: #FFF;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            overflow-x: auto;
        }

        /* Table */
        .jadwal-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
            min-width: 1000px;
        }

        .jadwal-table th, .jadwal-table td {
            border: 1px solid var(--td-border);
            padding: 6px 4px;
            white-space: nowrap;
        }

        .th-title-row {
            background-color: var(--th-dark);
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 8px !important;
        }

        .th-subtitle-row {
            background-color: var(--th-light);
            color: white;
            font-size: 11px;
            font-weight: 400;
            padding: 4px !important;
        }

        .th-header {
            background-color: var(--th-dark);
            color: white;
            font-weight: 600;
        }

        .th-weekend {
            background-color: var(--th-weekend);
            color: #000;
            font-weight: 600;
        }

        .col-no { width: 30px; font-weight: 600; background-color: #F8F9FA;}
        .col-nama { width: 60px; font-weight: 700; text-align: left; padding-left: 10px !important;}
        .col-hk { width: 40px; font-weight: 700; background-color: #F8F9FA;}

        /* Cell Types */
        .cell-pa { color: #1565C0; background-color: #E3F2FD; font-weight: 500; }
        .cell-sa { color: #2E7D32; background-color: #E8F5E9; font-weight: 500; }
        .cell-l { color: #C62828; background-color: #FFEBEE; font-weight: 600; }
        .cell-dk { color: #E65100; background-color: #FFF3E0; font-weight: 500; }
        .cell-ct { color: #1565C0; background-color: #BBDEFB; font-weight: 500; }
        .cell-sk { color: #C62828; background-color: #FFCDD2; font-weight: 600; }

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
            <li><a href="/jadwal" class="active"><i class="fa-regular fa-calendar"></i> Jadwal</a></li>
            <li><a href="/input-jadwal"><i class="fa-regular fa-calendar-plus"></i> Input Jadwal</a></li>
            <li><a href="/pengurangan-hk"><i class="fa-solid fa-user-minus"></i> Pengurangan HK</a></li>

        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="title-section">
                <h1>Jadwal</h1>
            </div>
            <button class="btn-export">
                <i class="fa-solid fa-download"></i> Export
            </button>
        </div>

        <div class="card">
            <table class="jadwal-table">
                <thead>
                    <tr>
                        <th colspan="32" class="th-title-row">JADWAL DINAS ATC — JUNI 2026 (MEDIUM KATEGORI)</th>
                    </tr>
                    <tr>
                        <th colspan="32" class="th-subtitle-row">Shift I: 06:00-15:00 LT (9 jam)  |  Shift II: 15:00-24:00 LT (9 jam)  |  Personel per shift: 3</th>
                    </tr>
                    <tr>
                        <th class="th-header" rowspan="2">NO</th>
                        <th class="th-header" rowspan="2">NAMA</th>
                        <!-- Dates 1 to 30 -->
                        @for ($i = 1; $i <= 30; $i++)
                            <th class="th-header">{{ $i }}</th>
                        @endfor
                        <th class="th-header" rowspan="2">HK</th>
                    </tr>
                    <tr>
                        <!-- Days -->
                        @php
                            $days = ['Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb', 'Mg'];
                        @endphp
                        @for ($i = 0; $i < 30; $i++)
                            @php
                                $day = $days[$i % 7];
                                $isWeekend = ($day == 'Sb' || $day == 'Mg');
                            @endphp
                            <th class="{{ $isWeekend ? 'th-weekend' : 'th-header' }}">{{ $day }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @php
                        $rows = [
                            ['AQS', 'PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA PA', 26],
                            ['ADW', 'SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA SA', 26],
                            ['AJP', 'PA PA PA PA PA L PA PA PA PA PA L PA PA CT CT CT CT CT PA PA PA PA PA L PA PA PA PA PA', 22],
                            ['ALM', 'SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA SA', 26],
                            ['OOP', 'PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA PA', 26],
                            ['PBO', 'DK DK DK DK DK DK DK DK SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA', 19],
                            ['SSA', 'PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA PA', 26],
                            ['AAW', 'SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA CT CT CT CT CT SA SA SA SA', 22],
                            ['MRH', 'PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA PA', 26],
                            ['HFI', 'SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SK SA SA SA SA L SA SA SA SA SA', 25],
                            ['MNR', 'PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA PA', 26],
                            ['DFA', 'SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA SA', 26],
                            ['NRA', 'PA PA PA PA PA L PA CT CT CT CT CT PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA PA', 22],
                            ['ANR', 'SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA SA', 26],
                            ['MRF', 'PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA L PA PA PA PA PA PA', 26],
                            ['DNH', 'SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA L SA SA SA SA SA SA', 26],
                        ];
                    @endphp

                    @foreach ($rows as $index => $row)
                        <tr>
                            <td class="col-no">{{ $index + 1 }}</td>
                            <td class="col-nama">{{ $row[0] }}</td>
                            @php
                                $shifts = explode(' ', $row[1]);
                            @endphp
                            @foreach ($shifts as $shift)
                                <td class="cell-{{ strtolower($shift) }}">{{ $shift }}</td>
                            @endforeach
                            <td class="col-hk">{{ $row[2] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
