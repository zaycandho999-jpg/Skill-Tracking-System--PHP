<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Panel | SkillTracker PRO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        /* --- CSS DESIGN SYSTEM (UI WOW) --- */
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #22c55e;
            --danger: #ef4444;
            --warning: #f8961e;
            --dark-bg: #0f172a;
            --sidebar-bg: #1e293b;
            --light-bg: #f8fafc;
            --white: #ffffff;
            --text-main: #334155;
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: var(--light-bg); color: var(--text-main); display: flex; }

        /* Sidebar */
        .sidebar { width: 280px; background: var(--sidebar-bg); height: 100vh; color: white; position: fixed; padding: 30px 20px; display: flex; flex-direction: column; }
        .sidebar h2 { color: #4cc9f0; font-size: 22px; margin-bottom: 40px; font-weight: 700; text-align: center; border-bottom: 1px solid #334155; padding-bottom: 20px; }
        .nav-link { display: flex; align-items: center; color: #94a3b8; padding: 14px 18px; text-decoration: none; border-radius: 10px; margin-bottom: 8px; transition: 0.3s; font-weight: 500; }
        .nav-link:hover, .nav-link.active { background: var(--primary); color: white; box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3); }

        /* Main Content */
        .main { margin-left: 280px; width: calc(100% - 280px); padding: 40px; }
        .header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 35px; }
        .welcome-text h1 { font-size: 28px; color: #1e293b; font-weight: 700; }
        .welcome-text p { color: #64748b; margin-top: 5px; }

        /* Stats Cards */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 40px; }
        .card { background: var(--white); padding: 25px; border-radius: 20px; box-shadow: var(--shadow); border: 1px solid #e2e8f0; }
        .stat-card h3 { font-size: 32px; font-weight: 700; margin-bottom: 5px; }
        .stat-card.blue { border-top: 5px solid var(--primary); color: var(--primary); }
        .stat-card.orange { border-top: 5px solid var(--warning); color: var(--warning); }
        .stat-card.green { border-top: 5px solid var(--success); color: var(--success); }

        /* Charts Layout */
        .charts-container { display: grid; grid-template-columns: 2fr 1fr; gap: 25px; margin-bottom: 40px; }
        .chart-box h3 { margin-bottom: 20px; font-size: 18px; font-weight: 600; }

        /* Multi-Skill Table */
        .table-container { padding: 0; overflow: hidden; }
        .table-header { padding: 25px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; }
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table th { background: #f8fafc; padding: 18px; text-align: left; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #64748b; }
        .data-table td { padding: 18px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; }

        /* Skill Tags */
        .skill-tag { padding: 5px 12px; border-radius: 6px; font-size: 11px; font-weight: 700; color: white; display: inline-block; }
        .php { background: #777bb4; }
        .graphic { background: #f72585; }
        .sql { background: #4cc9f0; }
        .se { background: #7209b7; }

        /* Status Badges */
        .badge { padding: 6px 14px; border-radius: 30px; font-size: 12px; font-weight: 600; }
        .pending { background: #fff7ed; color: #c2410c; border: 1px solid #ffedd5; }
        .approved { background: #f0fdf4; color: #15803d; border: 1px solid #dcfce7; }

        /* Action Buttons */
        .btn { padding: 8px 16px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 13px; transition: 0.2s; margin-right: 5px; }
        .btn-approve { background: var(--success); color: white; }
        .btn-reject { background: var(--danger); color: white; }
        .btn:hover { opacity: 0.8; transform: translateY(-2px); }

        .logout { margin-top: auto; color: #fb7185 !important; }
        .logout:hover { background: #4c0519 !important; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>SkillTracker <span style="color: #4cc9f0;">PRO</span></h2>
    <nav>
        <a href="#" class="nav-link active">📊 Dashboard</a>
        <a href="#" class="nav-link">👥 My Students</a>
        <a href="#" class="nav-link">⏳ Pending Approvals</a>
        <a href="#" class="nav-link">📜 Reports</a>
    </nav>
    <a href="logout.php" class="nav-link logout">🚪 Logout</a>
</div>

<div class="main">
    <header class="header">
        <div class="welcome-text">
            <h1>Supervisor Overview</h1>
            <p>Welcome back, <strong>Eng. Nuux Aadan</strong> (PHP & IT Expert)</p>
        </div>
    </header>

    <div class="stats-grid">
        <div class="card stat-card blue">
            <h3>28</h3>
            <p>Assigned Arday</p>
        </div>
        <div class="card stat-card orange">
            <h3>12</h3>
            <p>Codsiyo Sugan</p>
        </div>
        <div class="card stat-card green">
            <h3>580</h3>
            <p>Saacadood oo la Ansixiyay</p>
        </div>
    </div>

    <div class="charts-container">
        <div class="card chart-box">
            <h3>Weekly Training Hours</h3>
            <canvas id="hoursChart"></canvas>
        </div>
        <div class="card chart-box">
            <h3>Skill Categories</h3>
            <canvas id="skillPie"></canvas>
        </div>
    </div>

    <div class="card table-container">
        <div class="table-header">
            <h3>Student Skill Log Requests</h3>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Ardayga</th>
                    <th>Xirfadda</th>
                    <th>Saacadaha</th>
                    <th>Sharaxaad kooban</th>
                    <th>Xaaladda</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>C/samed Ahmed</strong></td>
                    <td><span class="skill-tag php">PHP Backend</span></td>
                    <td>6 hrs</td>
                    <td>Dhisidda database connection iyo CRUD.</td>
                    <td><span class="badge pending">Pending</span></td>
                    <td>
                        <button class="btn btn-approve">Approve</button>
                        <button class="btn btn-reject">Reject</button>
                    </td>
                </tr>
                <tr>
                    <td><strong>Marwan Ahmed</strong></td>
                    <td><span class="skill-tag graphic">Graphic Design</span></td>
                    <td>4 hrs</td>
                    <td>Naqshadaynta Profile Posters ee Barcelona.</td>
                    <td><span class="badge pending">Pending</span></td>
                    <td>
                        <button class="btn btn-approve">Approve</button>
                        <button class="btn btn-reject">Reject</button>
                    </td>
                </tr>
                <tr>
                    <td><strong>Shafici Abshir</strong></td>
                    <td><span class="skill-tag sql">SQL Database</span></td>
                    <td>5 hrs</td>
                    <td>Query optimization iyo Table indexing.</td>
                    <td><span class="badge approved">Approved</span></td>
                    <td><button class="btn" style="background: #e2e8f0; color: #475569;">View Detail</button></td>
                </tr>
                <tr>
                    <td><strong>C/qaadir Mahad</strong></td>
                    <td><span class="skill-tag se">Software Eng.</span></td>
                    <td>8 hrs</td>
                    <td>System Requirements Specification (SRS).</td>
                    <td><span class="badge pending">Pending</span></td>
                    <td>
                        <button class="btn btn-approve">Approve</button>
                        <button class="btn btn-reject">Reject</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Chart 1: Bar Chart
    const ctx = document.getElementById('hoursChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            datasets: [{
                label: 'Approved Hours',
                data: [20, 35, 15, 45, 30, 25],
                backgroundColor: '#4361ee',
                borderRadius: 8
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    // Chart 2: Doughnut Chart
    const ctx2 = document.getElementById('skillPie').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['PHP', 'Graphics', 'SQL', 'Soft.Eng'],
            datasets: [{
                data: [40, 20, 25, 15],
                backgroundColor: ['#777bb4', '#f72585', '#4cc9f0', '#7209b7'],
                borderWidth: 0
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, cutout: '70%' }
    });
</script>

</body>
</html>