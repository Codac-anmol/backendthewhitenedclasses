<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title', 'Admin'); ?> — The Whitened Classes</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap">
  <style>
    :root {
      --navy-900: #102542; --navy-800: #1b365d; --navy-700: #274472;
      --gold-400: #fdba74; --gold-500: #f97316; --gold-600: #ea580c;
      --white: #ffffff; --gray: #94a3b8; --danger: #f43f5e; --success: #22c55e;
      --radius: 16px;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(160deg, var(--navy-900), var(--navy-800) 60%, var(--navy-700));
      color: var(--white);
      min-height: 100vh;
      display: flex;
    }
    a { color: inherit; text-decoration: none; }
    h1, h2, h3, .brand { font-family: 'Outfit', sans-serif; }

    /* Sidebar */
    .sidebar {
      width: 240px;
      flex-shrink: 0;
      background: rgba(255,255,255,0.05);
      backdrop-filter: blur(20px) saturate(160%);
      -webkit-backdrop-filter: blur(20px) saturate(160%);
      border-right: 1px solid rgba(255,255,255,0.08);
      padding: 28px 18px;
      min-height: 100vh;
    }
    .brand { font-weight: 800; font-size: 1.15rem; margin-bottom: 32px; display: block; }
    .brand span { color: var(--gold-400); }
    .nav-item {
      display: flex; align-items: center; gap: 10px;
      padding: 11px 14px; border-radius: 10px; margin-bottom: 4px;
      color: var(--gray); font-weight: 600; font-size: 0.92rem;
      transition: .2s;
    }
    .nav-item:hover { background: rgba(255,255,255,0.06); color: var(--white); }
    .nav-item.active { background: linear-gradient(135deg, var(--gold-400), var(--gold-600)); color: var(--navy-900); }
    .logout-form { margin-top: 24px; }
    .logout-btn {
      width: 100%; padding: 10px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.1);
      background: rgba(255,255,255,0.04); color: var(--white); cursor: pointer; font-weight: 600; font-size: 0.85rem;
    }
    .logout-btn:hover { background: rgba(244,63,94,0.15); border-color: rgba(244,63,94,0.3); }

    /* Main area */
    .main { flex: 1; padding: 32px 40px; max-width: 1200px; }
    .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; flex-wrap: wrap; gap: 12px; }
    .topbar h1 { font-size: 1.5rem; font-weight: 700; }
    .topbar p { color: var(--gray); font-size: 0.88rem; margin-top: 4px; }

    /* Glass panel / card */
    .glass {
      background: rgba(255,255,255,0.045);
      backdrop-filter: blur(18px) saturate(160%);
      -webkit-backdrop-filter: blur(18px) saturate(160%);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: var(--radius);
      padding: 24px;
    }

    .btn {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 10px 18px; border-radius: 999px; border: none; cursor: pointer;
      font-weight: 700; font-size: 0.88rem; font-family: 'Outfit', sans-serif;
      transition: .2s;
    }
    .btn-primary { background: linear-gradient(135deg, var(--gold-400), var(--gold-600)); color: var(--navy-900); }
    .btn-primary:hover { box-shadow: 0 4px 20px rgba(249,115,22,.35); }
    .btn-outline { background: rgba(255,255,255,0.05); color: var(--white); border: 1px solid rgba(255,255,255,0.15); }
    .btn-outline:hover { background: rgba(255,255,255,0.1); }
    .btn-danger { background: rgba(244,63,94,0.15); color: #fb7185; border: 1px solid rgba(244,63,94,0.3); }
    .btn-danger:hover { background: rgba(244,63,94,0.25); }
    .btn-sm { padding: 6px 12px; font-size: 0.78rem; }

    table { width: 100%; border-collapse: collapse; }
    th, td { text-align: left; padding: 12px 10px; font-size: 0.88rem; border-bottom: 1px solid rgba(255,255,255,0.07); }
    th { color: var(--gray); font-weight: 600; text-transform: uppercase; font-size: 0.72rem; letter-spacing: .5px; }
    tr:last-child td { border-bottom: none; }

    .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; }
    .badge-admission { background: rgba(249,115,22,.15); color: var(--gold-400); }
    .badge-exam { background: rgba(56,189,248,.15); color: #38bdf8; }
    .badge-event { background: rgba(168,85,247,.15); color: #c084fc; }
    .badge-holiday { background: rgba(34,197,94,.15); color: var(--success); }
    .badge-result { background: rgba(244,63,94,.15); color: #fb7185; }

    .alert { padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 0.88rem; }
    .alert-success { background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.3); color: #4ade80; }
    .alert-error { background: rgba(244,63,94,.12); border: 1px solid rgba(244,63,94,.3); color: #fb7185; }

    label { display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: var(--gray); }
    input[type=text], input[type=date], input[type=number], input[type=email], input[type=password],
    textarea, select {
      width: 100%; padding: 11px 14px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.12);
      background: rgba(255,255,255,0.04); color: var(--white); font-family: inherit; font-size: 0.9rem;
      margin-bottom: 18px;
    }
    input[type=file] { margin-bottom: 18px; font-size: 0.85rem; }
    textarea { min-height: 110px; resize: vertical; }
    .field-error { color: #fb7185; font-size: 0.78rem; margin-top: -12px; margin-bottom: 14px; display: block; }
    .checkbox-row { display: flex; align-items: center; gap: 8px; margin-bottom: 18px; }
    .checkbox-row input { width: auto; margin: 0; }

    .stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px; margin-bottom: 28px; }
    .stat-card { padding: 20px; }
    .stat-card .num { font-size: 2rem; font-weight: 800; font-family: 'Outfit', sans-serif; color: var(--gold-400); }
    .stat-card .label { color: var(--gray); font-size: 0.85rem; margin-top: 4px; }

    .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 14px; }
    .gallery-item { position: relative; border-radius: 12px; overflow: hidden; border: 1px solid rgba(255,255,255,0.08); }
    .gallery-item img { width: 100%; height: 140px; object-fit: cover; display: block; }
    .gallery-item form { position: absolute; top: 6px; right: 6px; }

    @media (max-width: 800px) {
      body { flex-direction: column; }
      .sidebar { width: 100%; min-height: auto; display: flex; align-items: center; gap: 8px; overflow-x: auto; }
      .brand { margin-bottom: 0; margin-right: 10px; white-space: nowrap; }
      .main { padding: 20px; }
    }
  </style>
  <?php echo $__env->yieldContent('head'); ?>
</head>
<body>

  <aside class="sidebar">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="brand">The Whit<span>en</span>ed Classes</a>

    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">🏠 Dashboard</a>
    <a href="<?php echo e(route('admin.notices.index')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.notices.*') ? 'active' : ''); ?>">🔔 Notices</a>
    <a href="<?php echo e(route('admin.resources.index')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.resources.*') ? 'active' : ''); ?>">📚 Resources</a>
    <a href="<?php echo e(route('admin.gallery.index')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.gallery.*') ? 'active' : ''); ?>">🖼️ Gallery</a>

    <form action="<?php echo e(route('admin.logout')); ?>" method="POST" class="logout-form">
      <?php echo csrf_field(); ?>
      <button type="submit" class="logout-btn">Log out</button>
    </form>
  </aside>

  <main class="main">
    <?php if(session('status')): ?>
      <div class="alert alert-success"><?php echo e(session('status')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
      <div class="alert alert-error"><?php echo e($errors->first()); ?></div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
  </main>

</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/whitened-admin/resources/views/layouts/admin.blade.php ENDPATH**/ ?>