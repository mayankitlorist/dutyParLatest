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
                                Batch Detail List
                            </h3>
                            <!-- tools box -->
                            <?php if(Auth::user()->id==54506): ?>
                            <div class="card-tools">
                                <button  class="btn btn-primary"  data-toggle="modal" data-target="#userAddModal" style="float: right">Add Batch</button>
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
                                                <th>Scheme name</th>
                                                <th>Batch name</th>
                                                <th>Starttime</th>
                                                <th>Endtime</th>
                                                <?php if(Auth::user()->id==54506): ?>
                                                <th>Action</th>
                                                <?php endif; ?>
                                            </tr>
                                            </thead>

                                             <tbody>
                                            <?php $__currentLoopData = $batch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batchs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                     <td><?php echo e($batchs->name); ?></td>
                                                     <td><?php echo e($batchs->batch_name); ?></td>
                                                     <td><?php echo e($batchs->start_time); ?></td>
                                                     <td><?php echo e($batchs->end_time); ?></td>
                                                     <?php if(Auth::user()->id==54506): ?>
                                                     <td> 
                                                         <a class="js-edit-logo" data-toggle="modal" data-target="#usereditModal" data-name="<?php echo e($batchs->name); ?>" data-batchname="<?php echo e($batchs->batch_name); ?>"
                                                          data-starttime="<?php echo e($batchs->start_time); ?>"
                                                            data-endtime="<?php echo e($batchs->end_time); ?>"
                                                         style="cursor:pointer" title="edit state"><i class="fa fa-edit"></i></a>
                                                        
                                                     </td>
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

            <div id="userAddModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Batch Detail</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <form action="<?php echo e(url('admin/add_batch')); ?>" method="post" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>
                            <div class="modal-body">

                                <div class="form-group">
                                    <div>
                                        <label class="form-group">Schema name*</label>
                                    
                                         <div>
                                        <select  name="schema_id" required>

                                        <option value="">Select Schema</option>
                                            <?php $__currentLoopData = $schema; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schemas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($schemas->id); ?>">
                                             <?php echo e($schemas->name); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </option>
                                          </select>
                                                                                                                                                                
                                    </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Batch name*</label>
                                    <div><input type="text" class="form-control" name="batch_name" value="" required></div>
                                </div>

                               
            
                               
                                 <div class="form-group">
                                    <label >Start_time*</label>
                                    <div><input type="datetime-local" class="form-control" name="Start_time" value="" required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label >End_time*</label>
                                    <div><input type="datetime-local" class="form-control" name="End_time" value="" required>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="email-1">Role*</label>
                                    <div>
                                        <select name="role_type" required>

                                        <option value="" disabled selected>Select Organization</option>
 -->                                        
                                           <!--  <option value="" disabled selected>Select Role Type</option>
                                            <option value="employee" <?php echo e(old('role_type')=='employee'?'selected':''); ?>>Student</option> -->
                                            <!-- <option value="manager" <?php echo e(old('role_type')=='manager'?'selected':''); ?>>Manager</option> -->
                                            <!-- <option value="admin" <?php echo e(old('role_type')=='admin'?'selected':''); ?>>Teacher</option> -->
                                       <!--  </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email-1">Center*</label>
                                    <div>
                                        <select name="office_id[]" required multiple style="width: 100%;">
                                            <option value="" disabled selected>Select Center Type</option>
                                               </select>
                                    </div>
                                </div>
 -->

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

            <div id="usereditModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Batch Detail</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <form action="<?php echo e(url('admin/add_batch')); ?>" method="post" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>
                            <div class="modal-body">

                                <div class="form-group">
                                    <div>
                                        <label class="form-group">Schema name*</label>
                                    
                                         <div>
                                        <select  name="schema_id" required>

                                        <option value="">Select Schema</option>
                                            <?php $__currentLoopData = $schema; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schemas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($schemas->id); ?>">
                                             <?php echo e($schemas->name); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </option>
                                          </select>
                                 
                                    </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Batch name*</label>
                                    <div><input type="text" class="form-control" name="batch_name" id="batchName" value="" required></div>
                                </div>

                               
            
                               
                                 <div class="form-group">
                                    <label >Start_time*</label>
                                    <div><input type="datetime" class="form-control" name="Start_time" id="startTime" value="2020-02-20 02:00" required>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label >End_time*</label>
                                    <div><input type="datetime-local" class="form-control" name="End_time" id="endtime" value="" required>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="email-1">Role*</label>
                                    <div>
                                        <select name="role_type" required>

                                        <option value="" disabled selected>Select Organization</option>
 -->                                        
                                           <!--  <option value="" disabled selected>Select Role Type</option>
                                            <option value="employee" <?php echo e(old('role_type')=='employee'?'selected':''); ?>>Student</option> -->
                                            <!-- <option value="manager" <?php echo e(old('role_type')=='manager'?'selected':''); ?>>Manager</option> -->
                                            <!-- <option value="admin" <?php echo e(old('role_type')=='admin'?'selected':''); ?>>Teacher</option> -->
                                       <!--  </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email-1">Center*</label>
                                    <div>
                                        <select name="office_id[]" required multiple style="width: 100%;">
                                            <option value="" disabled selected>Select Center Type</option>
                                               </select>
                                    </div>
                                </div>
 -->

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
            var batchname =   $(this).attr('data-batchname');
            var starttime =   $(this).attr('data-starttime');
            var endtime =   $(this).attr('data-endtime');
            var parent = $(this).attr('data-parent');
            var uid = $(this).attr('data-uid');
            var phone = $(this).attr('data-phone');

// alert(batchname);
// alert(endtime);
// alert(starttime);


   var tempDate = starttime.split(' ');
   var newDateArray = tempDate[0].split('-');
   var newDate =[];
   newDate.push(newDateArray[2]);
   newDate.push(newDateArray[1]);
   newDate.push(newDateArray[0]);
   newDate = newDate.join('-');
   newDate = newDate+' '+tempDate[1];
   // alert(newDate);

    $('#batchName').val(batchname);
    $('#starttime').val(newDate);
    $('#endtime').val(endtime);


           
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/azureuser/dutyParLatest/resources/views/admin/userbatchdetail/index.blade.php ENDPATH**/ ?>