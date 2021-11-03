<!-- Content Wrapper. Contains page content -->

<?php $__env->startSection('content'); ?>
<?php
// print_r(Auth::user()->id); die;
?>
    <style>
        .save-content{
            margin-top: 8px;
            float: right;
        }
    </style>
<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Center List
                        </h3>
                        <!-- tools box -->
                        <?php if(Auth::user()->id==54506): ?>
                        <div class="card-tools">
                            <button  class="btn btn-primary"  data-toggle="modal" data-target="#officeAddModal" style="float: right">Add Center</button>

                        </div>
                        <?php endif; ?>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                        <div class="tab-content">

                            <!-- Tab panel -->
                            <div id="tab-pane1" class="tab-pane active">

                                <!-- Card Body -->
                                <div class="card-body">

                                    <!-- Card Title-->
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Distance</th>
                                            <?php if(Auth::user()->id==54506): ?>
                                            <th>Action</th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = @$offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(@$office->name); ?></td>
                                                <td><?php echo e(@$office->location); ?></td>
                                                <td><?php echo e(@$office->latitude); ?></td>
                                                <td><?php echo e(@$office->longitude); ?></td>
                                                <td><?php echo e(@$office->distance); ?></td>
                                                
                                                <?php if(Auth::user()->id==54506): ?>
                                            
                                                <td>
                                                    <a class="js-edit-logo" data-toggle="modal" data-target="#officeEditModal" data-id="<?php echo e(@$office->id); ?>" data-name="<?php echo e(@$office->name); ?>"  data-location="<?php echo e(@$office->location); ?>" data-latitude="<?php echo e(@$office->latitude); ?>" data-longitude="<?php echo e(@$office->longitude); ?>" data-distance="<?php echo e(@$office->distance); ?>" style="cursor:pointer" title="edit state"><i class="fa fa-edit"></i></a>
                                                    <a class="delete-material" href="<?php echo e(route('delete.office',@$office->id)); ?>"  data-id="<?php echo e(@$office->id); ?>"  title="delete logo" onClick="return  confirm('Are you sure you want to delete ?')"><i class="fa fa-trash-alt"></i></a
                                                    ></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>

        <div id="officeAddModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Center Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <form action="<?php echo e(route('admin.add.office')); ?>" method="post" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="officeid">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="email-1">Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email-1">Location</label>
                                <input type="text" id="location" class="form-control" name="location" value="<?php echo e(old('location')); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email-1">Latitude</label>
                                <input type="text" id="latitude" class="form-control" name="latitude" value="<?php echo e(old('latitude')); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email-1">Longitude</label>
                                <input type="text" id="longitude" class="form-control" name="longitude" value="<?php echo e(old('longitude')); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email-1">Distance</label>
                                <input type="text" id="distance" class="form-control" name="distance" value="<?php echo e(old('distance')); ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary text-uppercase">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="officeEditModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Center Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <form action="<?php echo e(route('admin.update.office')); ?>" method="post" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="officeid">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="email-1">Name</label>
                                <input type="text" id="name" class="form-control" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="email-1">Location</label>
                                <input type="text" id="location" class="form-control" name="location" required>
                            </div>

                            <div class="form-group">
                                <label for="email-1">Latitude</label>
                                <input type="text" id="latitude" class="form-control" name="latitude" required>
                            </div>

                            <div class="form-group">
                                <label for="email-1">Longitude</label>
                                <input type="text" id="longitude" class="form-control" name="longitude" required>
                            </div>

                            <div class="form-group">
                                <label for="email-1">Distance</label>
                                <input type="text" id="distance" class="form-control" name="distance" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary text-uppercase">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
    <script src="<?php echo e(asset('admin/plugins/jquery/jquery.min.js')); ?>"></script>
    <script>
        $(".js-edit-logo").on('click',function (e) {
            var id =   $(this).attr('data-id');
            var name =   $(this).attr('data-name');
            var location =   $(this).attr('data-location');
            var latitude =   $(this).attr('data-latitude');
            var longitude =   $(this).attr('data-longitude');
            var distance =   $(this).attr('data-distance');
            $("#officeEditModal .modal-dialog #officeid").val(id);
            $("#officeEditModal .modal-dialog #name").val(name);
            $("#officeEditModal .modal-dialog #location").val(location);
            $("#officeEditModal .modal-dialog #latitude").val(latitude);
            $("#officeEditModal .modal-dialog #longitude").val(longitude);
            $("#officeEditModal .modal-dialog #distance").val(distance);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/azureuser/dutyParLatest/resources/views/admin/office/index.blade.php ENDPATH**/ ?>