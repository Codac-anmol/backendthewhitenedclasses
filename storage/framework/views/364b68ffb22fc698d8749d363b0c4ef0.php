<?php $__env->startSection('title', $notice->exists ? 'Edit Notice' : 'New Notice'); ?>

<?php $__env->startSection('content'); ?>
  <div class="topbar">
    <div>
      <h1><?php echo e($notice->exists ? 'Edit Notice' : 'New Notice'); ?></h1>
      <p>This appears on the Notices &amp; Resources page of the website.</p>
    </div>
    <a href="<?php echo e(route('admin.notices.index')); ?>" class="btn btn-outline">← Back to list</a>
  </div>

  <div class="glass" style="max-width: 620px;">
    <form method="POST" action="<?php echo e($notice->exists ? route('admin.notices.update', $notice) : route('admin.notices.store')); ?>">
      <?php echo csrf_field(); ?>
      <?php if($notice->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

      <label for="title">Title</label>
      <input type="text" id="title" name="title" value="<?php echo e(old('title', $notice->title)); ?>" required>

      <label for="description">Description</label>
      <textarea id="description" name="description" required><?php echo e(old('description', $notice->description)); ?></textarea>

      <label for="tag">Tag</label>
      <select id="tag" name="tag" required>
        <?php $__currentLoopData = \App\Models\Notice::TAGS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($value); ?>" <?php if(old('tag', $notice->tag) === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>

      <label for="notice_date">Date</label>
      <input type="date" id="notice_date" name="notice_date"
             value="<?php echo e(old('notice_date', optional($notice->notice_date)->format('Y-m-d'))); ?>" required>

      <div class="checkbox-row">
        <input type="checkbox" id="is_new" name="is_new" value="1" <?php if(old('is_new', $notice->is_new)): echo 'checked'; endif; ?>>
        <label for="is_new" style="margin:0;">Show "New" badge</label>
      </div>

      <button type="submit" class="btn btn-primary"><?php echo e($notice->exists ? 'Save Changes' : 'Publish Notice'); ?></button>
    </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/whitened-admin/resources/views/admin/notices/form.blade.php ENDPATH**/ ?>