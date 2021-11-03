<!-- Content Wrapper. Contains page content -->

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Welcome, <?php echo e(Auth::user()->name); ?>!</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
            <div class="row ml-2 mt-4">
                <p class="text-dark">Welcome to the administrative Panel.</p>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<?php $__env->stopSection(); ?>
<!-- /.content-wrapper -->

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/azureuser/dutyParLatest/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>