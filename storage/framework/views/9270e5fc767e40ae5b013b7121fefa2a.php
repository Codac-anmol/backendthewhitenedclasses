<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login — The Whitened Classes</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@700;800&display=swap">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Inter', sans-serif;
      background: radial-gradient(ellipse at top left, #274472, #102542 60%);
      min-height: 100vh;
      display: flex; align-items: center; justify-content: center;
      color: #fff;
      padding: 20px;
    }
    .card {
      width: 100%; max-width: 380px;
      background: rgba(255,255,255,0.06);
      backdrop-filter: blur(20px) saturate(160%);
      -webkit-backdrop-filter: blur(20px) saturate(160%);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 22px;
      padding: 36px 30px;
      box-shadow: 0 20px 60px rgba(0,0,0,.35);
    }
    h1 { font-family: 'Outfit', sans-serif; font-size: 1.3rem; margin-bottom: 6px; }
    p.sub { color: #94a3b8; font-size: 0.85rem; margin-bottom: 24px; }
    label { display: block; font-size: 0.82rem; font-weight: 600; margin-bottom: 6px; color: #94a3b8; }
    input {
      width: 100%; padding: 11px 14px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.12);
      background: rgba(255,255,255,0.04); color: #fff; font-size: 0.9rem; margin-bottom: 16px;
    }
    button {
      width: 100%; padding: 12px; border: none; border-radius: 999px; cursor: pointer;
      background: linear-gradient(135deg, #fdba74, #ea580c); color: #102542; font-weight: 800;
      font-family: 'Outfit', sans-serif; font-size: 0.95rem;
    }
    .error { color: #fb7185; font-size: 0.8rem; margin-bottom: 14px; }
  </style>
</head>
<body>
  <div class="card">
    <h1>🎓 Admin Login</h1>
    <p class="sub">Manage notices, resources &amp; gallery photos.</p>

    <?php if($errors->any()): ?>
      <div class="error"><?php echo e($errors->first()); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.login.submit')); ?>">
      <?php echo csrf_field(); ?>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Log In</button>
    </form>
  </div>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/whitened-admin/resources/views/auth/login.blade.php ENDPATH**/ ?>