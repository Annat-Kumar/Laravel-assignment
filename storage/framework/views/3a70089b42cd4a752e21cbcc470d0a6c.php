


<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="card-body">
                    <h3>Blog Listing</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <!-- Add more table headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($blog->title); ?></td>
                                    <td><?php echo e($blog->content); ?></td>
                                    <td><a href="<?php echo e(route('editBlog', $blog->id)); ?>" class="btn btn-primary">Edit</a></td>
                                    <td><form method="POST" action="<?php echo e(route('deleteBlog', $blog->id)); ?>" onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                    </td>
                                    
                                    <!-- Add more table cells for additional columns -->
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    
                    
                    <br>
                    <div class="pagination">
                        <?php echo e($blogs->links()); ?>

                    </div>

                    <br>
                    <br>

                    <p><a href="/addblog">Add New Blog</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-prg\resources\views/admin/blogListing.blade.php ENDPATH**/ ?>