 <!-- Assuming you have a main layout file -->

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit Blog Post</h1>

        <form method="POST" action="<?php echo e(route('updateBlog', $blog->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo e($blog->title); ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4" required><?php echo e($blog->content); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <span class="can-spn" style="margin-left: 20px"><a href="/blog" class="btn btn-danger">Cancel</a></span>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-prg\resources\views/admin/editBlog.blade.php ENDPATH**/ ?>