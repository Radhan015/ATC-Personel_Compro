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
            
            --cell-pagi: #FFF4D2;
            --cell-siang: #FDE8D7;
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
        .col-pagi-header { background-color: var(--cell-header-pagi); width: 42.5%; }
        .col-siang-header { background-color: var(--cell-header-siang); width: 42.5%; }

        .cell-pagi { background-color: var(--cell-pagi); }
        .cell-siang { background-color: var(--cell-siang); }
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
                <input type="date" id="dayPicker" class="filter-box">
                <select id="shiftFilter" class="filter-box">
                    <option value="">Semua Shift</option>
                    <option value="S1">Pagi</option>
                    <option value="S2">Siang</option>
                </select>
            </div>
        </div>

        <div class="card">
            <h2 class="card-title" id="cardTitle">Jadwal Per Tanggal</h2>

            <div id="dayStatus" style="padding: 30px; text-align: center; color: #666;">
                Memuat jadwal…
            </div>

            <div class="table-container" id="tableContainer" style="display: none;">
                <table class="schedule-table">
                    <thead id="dayHead"></thead>
                    <tbody id="dayBody"></tbody>
                </table>
            </div>

            <div id="dayInfo" style="margin-bottom: 20px; font-size: 13px; color: #555;"></div>

            <div class="card-footer">
                <div class="legend">
                    Keterangan:
                    <div class="legend-item legend-pagi">P = Pagi</div>
                    <div class="legend-item legend-siang">S = Siang</div>
                </div>
                <button class="btn-export" id="btnExport">
                    <i class="fa-solid fa-download"></i> Export
                </button>
            </div>
        </div>
    </div>

    <script>
        const API = 'http://localhost:5000/api';
        const SHIFT_KEY  = { S1: 'pagi', S2: 'siang' };
        const HEAD_CLASS = { S1: 'col-pagi-header', S2: 'col-siang-header' };
        const CELL_CLASS = { S1: 'cell-pagi', S2: 'cell-siang' };

        const picker      = document.getElementById('dayPicker');
        const shiftFilter = document.getElementById('shiftFilter');
        const statusEl    = document.getElementById('dayStatus');
        const containerEl = document.getElementById('tableContainer');

        let lastData = null;

        function showStatus(msg) {
            statusEl.innerHTML = msg;
            statusEl.style.display = '';
            containerEl.style.display = 'none';
        }

        async function init() {
            try {
                const res = await fetch(`${API}/status`);
                const st  = await res.json();

                const mm = String(st.month).padStart(2, '0');
                picker.min = `${st.year}-${mm}-01`;
                picker.max = `${st.year}-${mm}-${String(st.days).padStart(2, '0')}`;

                const today = new Date();
                const day = (today.getFullYear() === st.year && today.getMonth() + 1 === st.month)
                    ? today.getDate() : 1;
                picker.value = `${st.year}-${mm}-${String(day).padStart(2, '0')}`;

                if (!st.has_schedule) {
                    showStatus('Jadwal belum di-generate — upload data di halaman <a href="/input-jadwal">Input Jadwal</a>.');
                    return;
                }
                loadDay();
            } catch (err) {
                showStatus('Tidak bisa terhubung ke backend. Jalankan: <code>.venv/bin/python main.py</code>');
            }
        }

        async function loadDay() {
            const day = parseInt(picker.value.split('-')[2], 10);
            try {
                const res  = await fetch(`${API}/schedule/day?day=${day}`);
                const data = await res.json();
                if (!res.ok) throw new Error(data.error || 'Gagal memuat jadwal');
                lastData = data;
                render();
            } catch (err) {
                showStatus(err.message);
            }
        }

        function render() {
            const data   = lastData;
            const filter = shiftFilter.value;
            const shifts = filter ? [filter] : ['S1', 'S2'];

            document.getElementById('cardTitle').textContent =
                `Jadwal Per Tanggal — ${data.day_name}, ${data.day} ${data.month_name} ${data.date.split('-')[0]}`;

            let head = '<tr><th class="col-posisi">Posisi / Sektor</th>';
            shifts.forEach(s => {
                const def = data.shift_def[s];
                head += `<th class="${HEAD_CLASS[s]}">${def.label.toUpperCase()}<span>(${def.time})</span></th>`;
            });
            head += '</tr>';
            document.getElementById('dayHead').innerHTML = head;

            let body = '';
            data.grid.forEach(row => {
                body += `<tr><td class="cell-posisi">${row.sector}</td>`;
                shifts.forEach(s => {
                    const slot = row[SHIFT_KEY[s]];
                    if (slot.count === 0) {
                        body += `<td class="${CELL_CLASS[s]}"><span>—</span></td>`;
                    } else {
                        const names = slot.personnel.map(p => p.initial).join(', ');
                        body += `<td class="${CELL_CLASS[s]}" title="${slot.personnel.map(p => p.nama).join(', ')}">
                                    <strong>${slot.codes.join(', ')}</strong><span>${names}</span></td>`;
                    }
                });
                body += '</tr>';
            });
            document.getElementById('dayBody').innerHTML = body;

            const off   = data.off.map(p => p.initial).join(', ') || '—';
            const leave = data.leave.map(p => `${p.initial} (${p.jenis})`).join(', ') || '—';
            document.getElementById('dayInfo').innerHTML =
                `<strong>OFF:</strong> ${off} &nbsp;|&nbsp; <strong>Cuti/Izin:</strong> ${leave}`;

            statusEl.style.display = 'none';
            containerEl.style.display = '';
        }

        picker.addEventListener('change', loadDay);
        shiftFilter.addEventListener('change', () => lastData && render());
        document.getElementById('btnExport').addEventListener('click', () => {
            const day = parseInt(picker.value.split('-')[2], 10);
            window.location.href = `${API}/export?day=${day}`;
        });

        init();
    </script>
</body>
</html>
