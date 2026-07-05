<?php $__env->startSection('title', 'Notices'); ?>

<?php $__env->startSection('content'); ?>
  <div class="topbar">
    <div>
      <h1>Notices</h1>
      <p>Admission updates, exam schedules, events &amp; announcements.</p>
    </div>
    <a href="<?php echo e(route('admin.notices.create')); ?>" class="btn btn-primary">+ New Notice</a>
  </div>

  <div class="glass">
    <table>
      <thead>
        <tr><th>Title</th><th>Tag</th><th>Date</th><th>New?</th><th style="text-align:right;">Actions</th></tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($notice->title); ?></td>
            <td><span class="badge badge-<?php echo e($notice->tag); ?>"><?php echo e($notice->tag); ?></span></td>
            <td><?php echo e($notice->notice_date->format('d M Y')); ?></td>
            <td><?php echo e($notice->is_new ? '✅' : '—'); ?></td>
            <td style="text-align:right; display:flex; gap:8px; justify-content:flex-end;">
              <a href="<?php echo e(route('admin.notices.edit', $notice)); ?>" class="btn btn-outline btn-sm">Edit</a>
              <form action="<?php echo e(route('admin.notices.destroy', $notice)); ?>" method="POST" onsubmit="return confirm('Delete this notice?');">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="5">No notices yet.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div style="margin-top:20px;"><?php echo e($notices->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/whitened-admin/resources/views/admin/notices/index.blade.php ENDPATH**/ ?>