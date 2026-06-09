<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Jadwal - ATC Personel Planner</title>
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
            
            /* Upload Area */
            --upload-bg: #D4E2F6;
            --upload-border: #6B9AE8;
            --text-blue: #4A85F6;
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
            margin-bottom: 30px;
        }

        .title-section h1 {
            font-size: 28px;
            font-weight: 800;
            color: #000;
        }

        /* Card & Upload Area */
        .card {
            background: #FFF;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            display: flex;
            flex-direction: column;
        }

        .upload-area {
            background-color: var(--upload-bg);
            border: 2px dashed var(--upload-border);
            border-radius: 12px;
            padding: 60px 20px;
            text-align: center;
            margin-bottom: 30px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .upload-area:hover {
            background-color: #C8DBF4;
        }

        .upload-icon {
            font-size: 56px;
            color: var(--upload-border);
            margin-bottom: 20px;
        }

        .upload-text {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
        }

        .upload-text strong {
            color: var(--text-blue);
            font-weight: 700;
        }

        .upload-subtext {
            font-size: 14px;
            color: #666;
        }

        .btn-submit {
            align-self: flex-end;
            background-color: #0047AB;
            color: white;
            border: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.2s;
        }

        .btn-submit:hover {
            background-color: #003380;
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
            <li><a href="/input-jadwal" class="active"><i class="fa-regular fa-calendar-plus"></i> Input Jadwal</a></li>
            <li><a href="/pengurangan-hk"><i class="fa-solid fa-user-minus"></i> Pengurangan HK</a></li>

        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="title-section">
                <h1>Input Jadwal</h1>
            </div>
        </div>

        <div class="card">
            <div class="upload-area">
                <div class="upload-icon">
                    <i class="fa-solid fa-table"></i>
                </div>
                <div class="upload-text">
                    <strong>Klik untuk upload</strong> atau drag & drop file
                </div>
                <div class="upload-subtext">
                    Excel, CSV (maks. 10MB)
                </div>
            </div>

            <button class="btn-submit">
                <i class="fa-solid fa-check"></i> Submit
            </button>
        </div>
    </div>

</body>
</html>
