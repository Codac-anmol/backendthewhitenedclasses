<?php $__env->startSection('title', 'Resources'); ?>

<?php $__env->startSection('content'); ?>
  <div class="topbar">
    <div>
      <h1>Resources</h1>
      <p>Free downloadable sample papers, worksheets &amp; revision notes.</p>
    </div>
    <a href="<?php echo e(route('admin.resources.create')); ?>" class="btn btn-primary">+ New Resource</a>
  </div>

  <div class="glass">
    <table>
      <thead>
        <tr><th>Title</th><th>Class</th><th>Format</th><th>Size</th><th>File</th><th style="text-align:right;">Actions</th></tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($resource->icon); ?> <?php echo e($resource->title); ?></td>
            <td><?php echo e($resource->class_label); ?></td>
            <td><?php echo e($resource->format); ?></td>
            <td><?php echo e($resource->file_size_label ?? '—'); ?></td>
            <td>
              <?php if($resource->file_path): ?>
                <a href="<?php echo e($resource->file_url); ?>" target="_blank" style="color:#fdba74;">View</a>
              <?php else: ?>
                <span style="color:#94a3b8;">No file</span>
              <?php endif; ?>
            </td>
            <td style="text-align:right; display:flex; gap:8px; justify-content:flex-end;">
              <a href="<?php echo e(route('admin.resources.edit', $resource)); ?>" class="btn btn-outline btn-sm">Edit</a>
              <form action="<?php echo e(route('admin.resources.destroy', $resource)); ?>" method="POST" onsubmit="return confirm('Delete this resource?');">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="6">No resources yet.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div style="margin-top:20px;"><?php echo e($resources->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/whitened-admin/resources/views/admin/resources/index.blade.php ENDPATH**/ ?>