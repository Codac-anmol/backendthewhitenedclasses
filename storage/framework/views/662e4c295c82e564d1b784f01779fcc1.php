<?php $__env->startSection('title', 'Gallery'); ?>

<?php $__env->startSection('content'); ?>
  <div class="topbar">
    <div>
      <h1>Gallery</h1>
      <p>Photos shown in the homepage Gallery carousel.</p>
    </div>
    <a href="<?php echo e(route('admin.gallery.create')); ?>" class="btn btn-primary">+ Add Photo</a>
  </div>

  <div class="glass">
    <?php if($photos->isEmpty()): ?>
      <p>No photos yet — <a href="<?php echo e(route('admin.gallery.create')); ?>" style="color:#fdba74;">add your first one</a>.</p>
    <?php else: ?>
      <div class="gallery-grid">
        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="gallery-item">
            <img src="<?php echo e($photo->image_url); ?>" alt="<?php echo e($photo->title ?? 'Gallery photo'); ?>">
            <form action="<?php echo e(route('admin.gallery.destroy', $photo)); ?>" method="POST" onsubmit="return confirm('Remove this photo?');">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button type="submit" class="btn btn-danger btn-sm">✕</button>
            </form>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>
  </div>

  <div style="margin-top:20px;"><?php echo e($photos->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/whitened-admin/resources/views/admin/gallery/index.blade.php ENDPATH**/ ?>