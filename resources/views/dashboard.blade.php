<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>User Dashboard · Capital</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* =========================
       DARK (Black) THEME TOKENS
       ========================= */
    :root {
      /* Pure black-centric palette (no navy) */
      --bg: #0a0a0a;              /* page background */
      --bg-grad-top: #000000;     /* subtle vertical gradient */
      --bg-grad-bottom: #0c0c0c;
      --panel: #111111;           /* panels/cards */
      --card: #141414;            /* inner card rows */
      --elev: #0e0e0e;            /* sidebar/raised */

      --text: #e7e7e7;            /* primary text */
      --muted: #9a9a9a;           /* subdued text */
      --border: rgba(255,255,255,0.08);
      --hairline: rgba(255,255,255,0.06);
      --shadow: 0 10px 30px rgba(0,0,0,0.45);

      --brand: #d9b24a;           /* golden brand */
      --brand-strong: #b68e18;

      --ok:#22c55e; --warn:#f59e0b; --danger:#ef4444; --info:#3b82f6;
      --focus: rgba(217,178,74,0.35);
      --ring: 0 0 0 3px var(--focus);
      --radius-lg: 14px;  /* unified radii */
      --radius-md: 12px;
      --radius-sm: 10px;
    }

    /* Base reset */
    * { box-sizing: border-box; }
    html, body { height: 100%; margin: 0; }

    /* Global scrolling: enable Y, prevent horizontal jitter */
    html { overflow-x: hidden; overflow-y: auto; }

    /* Background and typography */
    body {
      background: linear-gradient(180deg, var(--bg-grad-top), var(--bg-grad-bottom));
      color: var(--text);
      font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    /* Layout */
    .layout { display: grid; grid-template-columns: 260px 1fr; height: 100dvh; }

    .side {
      background: linear-gradient(180deg, #0b0b0b, var(--elev));
      border-right: 1px solid var(--hairline);
      padding: 20px 16px;
      overflow-y: auto; /* own scroll */
      position: relative;
    }

    .brand { display:flex; align-items:center; gap:10px; font-weight:800; margin-bottom:24px; }
    .brand-icon { width:36px; height:36px; border-radius:12px; background:linear-gradient(135deg,var(--brand),var(--brand-strong)); display:grid; place-items:center; color:#111; font-weight:900; box-shadow: 0 6px 18px rgba(217,178,74,0.25); }

    .menu { display:flex; flex-direction:column; gap:6px; margin-top:16px; }
    .menu a { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:var(--radius-sm); color:var(--muted); text-decoration:none; border:1px solid transparent; transition: background .2s ease, color .2s ease, border-color .2s ease; }
    .menu a.active, .menu a:hover { color:var(--text); background: rgba(255,255,255,0.04); border-color: var(--hairline); }
    .menu a:focus-visible { outline: none; box-shadow: var(--ring); }

    .main { padding: 20px; overflow: hidden; min-height: 100dvh; display: flex; flex-direction: column; gap: 20px; min-width: 0; }

    .topbar { display:flex; justify-content:space-between; align-items:center; gap:16px; flex-shrink:0; }
    .title { font-weight:800; font-size:24px; letter-spacing: .2px; }

    /* KPI grid */
    .kpis { display:grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap:16px; flex-shrink:0; }
    .card { background: var(--panel); border: 1px solid var(--hairline); border-radius: var(--radius-lg); box-shadow: var(--shadow); }
    .kpi { padding: 20px; border-top: 3px solid var(--info); }
    .kpi .label { color: var(--muted); font-size: 12px; text-transform: uppercase; letter-spacing: .06em; font-weight: 600; }
    .kpi .value { font-size: 28px; font-weight: 800; margin-top: 8px; }
    .kpi.warn{ border-top-color: var(--warn);} .kpi.ok{ border-top-color: var(--ok);} .kpi.danger{ border-top-color: var(--danger);} .kpi.info{ border-top-color: var(--brand);} /* use brand gold for info */

    /* Chart + side stats */
    .grid-2 { display:grid; grid-template-columns: 1.5fr 1fr; gap:16px; flex-shrink:0; align-items: stretch; }

    .chart-panel { min-height: 260px; height: 300px; padding: 16px 20px; overflow: hidden; }
    .chart-panel h3 { margin: 0 0 12px 0; font-size: 16px; font-weight: 700; color: var(--text); }
    .chart-panel canvas { width: 100% !important; height: calc(100% - 24px) !important; display: block; }

    .stats-panel { min-height: 260px; height: 300px; padding: 16px 20px; display:flex; flex-direction:column; gap:12px; overflow:hidden; }
    .panel h3 { margin: 0 0 16px 0; font-size: 16px; font-weight: 600; }
    .stats { display:grid; grid-template-columns: repeat(2,1fr); gap:12px; flex:1; min-height:0; overflow:auto; }
    .stat { background: var(--card); border: 1px solid var(--hairline); border-radius: var(--radius-md); padding: 14px; display:flex; flex-direction:column; justify-content:center; }
    .stat .small { color: var(--muted); font-size: 12px; margin-bottom: 6px; }
    .stat .big { font-size: 20px; font-weight: 800; }

    /* Tables section — perfect scrolling */
    .tables-section { flex: 1; min-height: 0; overflow: hidden; }
    .tables-grid { display:grid; grid-template-columns: 1fr 1fr; gap:16px; height: 100%; min-height: 0; }

    .table-container { display:flex; flex-direction:column; padding: 16px 20px; gap: 12px; min-height: 0; }
    .table-container h3 { margin: 0; font-size: 16px; font-weight: 700; }

    .table-wrapper { flex: 1; min-height: 0; overflow: auto; /* this is the scroller */ }

    table { width: 100%; border-collapse: separate; border-spacing: 0 6px; font-size: 13px; min-width: 560px; }
    thead th { color: var(--muted); font-weight: 600; text-align: left; font-size: 12px; padding: 0 12px 10px 12px; position: sticky; top: 0; background: var(--panel); z-index: 2; }
    tbody td { background: var(--card); border: 1px solid var(--hairline); padding: 12px; border-right: none; }
    tbody td:first-child { border-top-left-radius: 8px; border-bottom-left-radius: 8px; border-left: 1px solid var(--hairline); }
    tbody td:last-child { border-right: 1px solid var(--hairline); border-top-right-radius: 8px; border-bottom-right-radius: 8px; }

    .tag { padding: 4px 8px; border-radius: 999px; border: 1px solid var(--hairline); color: var(--muted); font-size: 11px; background: var(--card); }

    .logout { border:1px solid var(--hairline); background: transparent; color: var(--muted); border-radius: var(--radius-sm); padding: 10px 12px; cursor: pointer; transition: background .2s ease, color .2s ease, border-color .2s ease; font-size: 14px; }
    .logout:hover { color: var(--text); background: rgba(255,255,255,0.04); }
    .logout:focus-visible { outline: none; box-shadow: var(--ring); }

    /* Scrollbars — consistent across panels */
    .side::-webkit-scrollbar,
.table-wrapper::-webkit-scrollbar,
.stats::-webkit-scrollbar { width: 8px; height: 8px; }
.side::-webkit-scrollbar-track,
.table-wrapper::-webkit-scrollbar-track,
.stats::-webkit-scrollbar-track { background: var(--card); border-radius: 4px; }
.side::-webkit-scrollbar-thumb,
.table-wrapper::-webkit-scrollbar-thumb,
.stats::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }
.side::-webkit-scrollbar-thumb:hover,
.table-wrapper::-webkit-scrollbar-thumb:hover,
.stats::-webkit-scrollbar-thumb:hover { background: #5a5a5a; }

    /* Responsive */
    @media (max-width: 1200px) {
      .layout { grid-template-columns: 1fr; }
      .side { display: none; }
      .main { padding: 16px; }
      .kpis { grid-template-columns: repeat(2, minmax(0,1fr)); }
      .grid-2 { grid-template-columns: 1fr; }
      .chart-panel, .stats-panel { height: 260px; }
      .tables-grid { grid-template-columns: 1fr; }
    }

    @media (prefers-reduced-motion: reduce) {
      * { transition: none !important; animation: none !important; }
    }
  </style>
</head>
<body>

<div class="layout">
  <!-- Sidebar -->
  <aside class="side">
    <div class="brand">
      <div class="brand-icon">C</div>
      <div>
        <div>Capital</div>
        <small style="color:var(--muted)">Dashboard</small>
      </div>
    </div>

    <nav class="menu">
      <a href="#" class="active">🏠 Overview</a>
      <a href="#contacts">👥 Contacts</a>
      <a href="#portfolio">🗂️ Portfolio</a>
      <a href="#stats">📈 Stats</a>

      <form method="POST" action="{{ route('logout') }}" style="margin-top:20px">
        @csrf
        <button type="submit" class="logout">↩️ Log out</button>
      </form>
    </nav>
  </aside>

  <!-- Main -->
  <main class="main">
    <div class="topbar">
      <div class="title">Overview</div>
      <div style="display:flex;align-items:center;gap:12px;color:var(--muted)">
        <span>Hi, {{ Auth::user()->name }}</span>
        <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--brand),var(--brand-strong));display:grid;place-items:center;color:#111;font-weight:900">
          {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
      </div>
    </div>

    <!-- KPI cards -->
    <section class="kpis">
      <div class="card kpi ok">
        <div class="label">Today Contacts</div>
        <div class="value">24</div>
      </div>
      <div class="card kpi info">
        <div class="label">This Week</div>
        <div class="value">156</div>
      </div>
      <div class="card kpi warn">
        <div class="label">This Month</div>
        <div class="value">847</div>
      </div>
      <div class="card kpi danger">
        <div class="label">Yesterday</div>
        <div class="value">18</div>
      </div>
    </section>

    <!-- Chart + side stats -->
    <section class="grid-2" id="stats">
      <div class="card chart-panel">
        <h3>Contacts (last 7 days)</h3>
        <canvas id="chart"></canvas>
      </div>

      <div class="card stats-panel">
        <h3>Quick stats</h3>
        <div class="stats">
          <div class="stat">
            <div class="small">Portfolio</div>
            <div class="big">45</div>
          </div>
          <div class="stat">
            <div class="small">Offers</div>
            <div class="big">12</div>
          </div>
          <div class="stat">
            <div class="small">Reviews</div>
            <div class="big">28</div>
          </div>
          <div class="stat">
            <div class="small">Partners</div>
            <div class="big">8</div>
          </div>
          <div class="stat">
            <div class="small">Users</div>
            <div class="big">5</div>
          </div>
          <div class="stat">
            <div class="small">Growth</div>
            <div class="big">+33%</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tables -->
    <section class="tables-section">
      <div class="tables-grid">
        <div class="card table-container" id="contacts">
          <h3>Latest Contacts</h3>
          <div class="table-wrapper">
            <table>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Ahmed Hassan</td>
                  <td>+20 123 456 789</td>
                  <td>Aug 21</td>
                  <td><span class="tag">New</span></td>
                </tr>
                <tr>
                  <td>Sarah Mohamed</td>
                  <td>+20 987 654 321</td>
                  <td>Aug 21</td>
                  <td><span class="tag">New</span></td>
                </tr>
                <tr>
                  <td>Omar Ali</td>
                  <td>+20 555 123 456</td>
                  <td>Aug 21</td>
                  <td><span class="tag">New</span></td>
                </tr>
                <tr>
                  <td>Fatima Ahmed</td>
                  <td>+20 444 789 123</td>
                  <td>Aug 20</td>
                  <td><span class="tag">New</span></td>
                </tr>
                <tr>
                  <td>Mahmoud Said</td>
                  <td>+20 333 111 222</td>
                  <td>Aug 20</td>
                  <td><span class="tag">New</span></td>
                </tr>
                <tr>
                  <td>Layla Ibrahim</td>
                  <td>+20 222 333 444</td>
                  <td>Aug 19</td>
                  <td><span class="tag">Follow-up</span></td>
                </tr>
                <tr>
                  <td>Youssef Ahmed</td>
                  <td>+20 111 222 333</td>
                  <td>Aug 19</td>
                  <td><span class="tag">Contacted</span></td>
                </tr>
                <tr>
                  <td>Nour Hassan</td>
                  <td>+20 666 777 888</td>
                  <td>Aug 18</td>
                  <td><span class="tag">Contacted</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card table-container" id="portfolio">
          <h3>Latest Portfolio</h3>
          <div class="table-wrapper">
            <table>
              <thead>
                <tr>
                  <th>Project</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Villa Finishing</td>
                  <td>Interior</td>
                  <td>Aug 21</td>
                  <td><span class="tag">Active</span></td>
                </tr>
                <tr>
                  <td>Office Interior</td>
                  <td>Commercial</td>
                  <td>Aug 20</td>
                  <td><span class="tag">Active</span></td>
                </tr>
                <tr>
                  <td>Restaurant Design</td>
                  <td>Design</td>
                  <td>Aug 19</td>
                  <td><span class="tag">Done</span></td>
                </tr>
                <tr>
                  <td>Hotel Renovation</td>
                  <td>Renovation</td>
                  <td>Aug 18</td>
                  <td><span class="tag">Done</span></td>
                </tr>
                <tr>
                  <td>Mall Interiors</td>
                  <td>Commercial</td>
                  <td>Aug 17</td>
                  <td><span class="tag">Done</span></td>
                </tr>
                <tr>
                  <td>Apartment Complex</td>
                  <td>Residential</td>
                  <td>Aug 16</td>
                  <td><span class="tag">In Progress</span></td>
                </tr>
                <tr>
                  <td>Clinic Interior</td>
                  <td>Medical</td>
                  <td>Aug 15</td>
                  <td><span class="tag">Planning</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>
</div>

<script>
  // Chart — gold on black, responsive, no aspect ratio issues
  const labels = ['Aug 15', 'Aug 16', 'Aug 17', 'Aug 18', 'Aug 19', 'Aug 20', 'Aug 21'];
  const data = [12, 19, 15, 25, 22, 18, 24];

  const ctx = document.getElementById('chart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels,
      datasets: [{
        label: 'Contacts',
        data,
        backgroundColor: '#d9b24a',
        borderColor: '#b68e18',
        borderWidth: 1,
        borderRadius: 5,
        maxBarThickness: 34
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      layout: { padding: 0 },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { precision: 0, color: '#9a9a9a', font: { size: 11 } },
          grid: { color: 'rgba(255,255,255,0.08)' }
        },
        x: {
          ticks: { color: '#9a9a9a', font: { size: 11 } },
          grid: { color: 'rgba(255,255,255,0.08)' }
        }
      },
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: '#111',
          borderColor: 'rgba(255,255,255,0.1)',
          borderWidth: 1,
          titleColor: '#fff',
          bodyColor: '#ddd'
        }
      },
      interaction: { intersect: false, mode: 'index' }
    }
  });
</script>
</body>
</html>
