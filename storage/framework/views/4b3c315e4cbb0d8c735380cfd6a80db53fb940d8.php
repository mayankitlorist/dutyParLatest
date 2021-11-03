<!-- Content Wrapper. Contains page content -->

<?php $__env->startSection('content'); ?>
<?php
// print_r(Auth::user()->id); 
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
                                User List  
                            </h3>
                            <!-- tools box -->
                         <!--  <<?php if(Auth::user()->role_type==1): ?>
                            <div class="card-tools">
                                <button  class="btn btn-primary"  data-toggle="modal" data-target="#userAddModal" style="float: right">Add User</button>
                            </div>
                            <?php endif; ?> -->
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
                                                <th>Profile</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Center</th>
                                                <th>Trainer</th>

                                                <?php if(Auth::user()->role_type==1): ?>
                                                <!-- <th>Action</th> -->
                                                <?php endif; ?>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php 
                                            // print_r($user); die;
                                            ?>
                                                <tr>
                                                    <td><div><img class="profile-img" src="<?php echo e($user['profile_image']); ?>" width="150px" height="150px"/></div></td>
                                                    <td><?php echo e($user['name']); ?></td>
                                                    <td><?php echo e($user['email']); ?></td>
                                                    <td>

                                                        <?php if($user['role_type'] == 1): ?>
                                                        Teacher
                                                        <?php elseif($user['role_type'] == 2): ?>
                                                        Student
                                                        <?php else: ?>
                                                        Trainer
                                                        <?php endif; ?>
                                                    <!-- <?php echo e($user['role_type']); ?> -->
                                                    </td>
                                                    <td>
                                                        <?php $__currentLoopData = $user['office_id']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <li><?php echo e($office->name); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td><?php echo e($user['trainer']); ?></td>
                                                     <?php if(Auth::user()->role_type==1): ?>
                          
                                                    <!-- <td> -->
                                                        <!-- <a class="js-edit-logo" data-toggle="modal" data-target="#userEditModal" data-id="<?php echo e($user['id']); ?>" data-name="<?php echo e($user['name']); ?>" data-email="<?php echo e($user['email']); ?>" data-role="<?php echo e($user['role_type']); ?>" data-office="<?php echo e($user['office_id']); ?>" data-parent="<?php echo e($user['parent_id']); ?>"  data-uid="<?php echo e($user['uid']); ?>" data-phone="<?php echo e($user['phone']); ?>" style="cursor:pointer" title="edit state"><i class="fa fa-edit"></i></a> -->
                                                        <!-- <a class="delete-material" href="<?php echo e(route('delete.user',$user['id'])); ?>"  data-id="<?php echo e($user['id']); ?>"  title="delete logo" onClick="return  confirm('Are you sure you want to delete ?')"><i class="fa fa-trash-alt"></i></a -->
                                                        <!-- </td> -->
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
                            <h4 class="modal-title">Add User</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <form action="<?php echo e(route('admin.add.user')); ?>" method="post" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Profile Image</label>
                                    <input type="file" class="form-control" name="profile_image" value="<?php echo e(old('profile_image')); ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="email-1">Name*</label>
                                    <div><input type="text" class="form-control" name="name" value="" required></div>
                                </div>

                                <div class="form-group">
                                    <label for="email-1">Uid*</label>
                                    <div><input type="text" class="form-control" name="uid" value="" required></div>
                                </div>

                                <div class="form-group">
                                    <label for="email-1">Password*</label>
                                    <div><input type="password" class="form-control" name="password" value="" required></div>
                                </div>

                                <div class="form-group">
                                    <label for="email-1">Email*</label>
                                    <div><input type="text" class="form-control" name="email" value="" required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="email-1">Phone Number*</label>
                                    <div><input type="text" class="form-control" name="phone" value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email-1">Role*</label>
                                    <div>
                                        <select name="role_type" required>

                                        <option value="" disabled selected>Select Organization</option>
                                         <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"/>
                                              <?php echo e($role->role_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <!--  <option value="" disabled selected>Select Role Type</option>
                                            <option value="employee" <?php echo e(old('role_type')=='employee'?'selected':''); ?>>Student</option> -->
                                            <!-- <option value="manager" <?php echo e(old('role_type')=='manager'?'selected':''); ?>>Manager</option> -->
                                            <!-- <option value="admin" <?php echo e(old('role_type')=='admin'?'selected':''); ?>>Teacher</option> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email-1">Center*</label>
                                    <div>
                                        <select name="office_id[]" required multiple style="width: 100%;">
                                            <option value="" disabled selected>Select Center Type</option>
                                            <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($office->id); ?>"
                                                        <?php echo e((collect(old('office_id'))->contains($office->id)) ? 'selected':''); ?>

                                                />
                                                <?php echo e($office->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
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
            <div id="userEditModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit User Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <form action="<?php echo e(route('admin.update.user')); ?>" method="post" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" id="userid">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Profile Image</label>
                                    <input type="file" class="form-control" name="profile_image" id="profile">
                                </div>
                                <div class="form-group">
                                    <label for="email-1">Name</label>
                                    <div><input type="text" id="name" class="form-control" name="name" required></div>
                                </div>

                              

                                <div class="form-group">
                                    <label for="email-1">Uid</label>
                                    <div><input type="text" id="uid" class="form-control" name="uid" required></div>
                                </div>

                                  <div class="form-group">
                                    <label for="email-1">Email</label>
                                    <div><input type="text" id="email" class="form-control" name="email" required>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="phone-1">Phone</label>
                                    <div><input type="text" id="phone" class="form-control" name="phone" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email-1">Role</label>
                                    <div>
                                        <select name="role_type" id="role">
                                             <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"/>
                                              <?php echo e($role->role_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <!--  <option value="" disabled selected>Select Role Type</option>
                                            <option value="employee">Student</option> -->
                                            <!-- <option value="manager">Manager</option> -->
                                            <!-- <option value="admin">Teacher</option> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email-1">Center</label>
                                    <div>
                                        <select name="office_id[]" id="office" multiple style="width: 100%;">
                                            <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($office->id); ?>"><?php echo e($office->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email-1">Reporting To</label>
                                    <div>
                                        <select name="parent_id" id="parent_id" style="width: 100%;">
                                            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($admin->id); ?>"><?php echo e(ucwords($admin->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
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
            var email =   $(this).attr('data-email');
            var role =   $(this).attr('data-role');
            var office =   $(this).attr('data-office');
            var parent = $(this).attr('data-parent');
            var uid = $(this).attr('data-uid');
            var phone = $(this).attr('data-phone');



            $("#userEditModal .modal-dialog #userid").val(id);
            $("#userEditModal .modal-dialog #name").val(name);
            $("#userEditModal .modal-dialog #email").val(email);
            $("#userEditModal .modal-dialog #uid").val(uid);
            $("#userEditModal .modal-dialog #phone").val(phone);


            $("#userEditModal .modal-dialog #role option:selected").removeAttr("selected");
            var roleid = '#userEditModal .modal-dialog #role option[value=' + role +']';
            $(roleid).attr('selected', 'selected');

            $("#userEditModal .modal-dialog #parentid option:selected").removeAttr("selected");
            var parentid = '#userEditModal .modal-dialog #parentid option[value=' + parent +']';
            $(parentid).attr('selected', 'selected');

            $("#userEditModal .modal-dialog #office option:selected").removeAttr("selected");
            JSON.parse(office).forEach(function (offic) {
                var officeid = '#userEditModal .modal-dialog #office option[value=' + offic.id +']';
                $(officeid).attr('selected', 'selected');
            });
        });
      
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/azureuser/dutyParLatest/resources/views/admin/user/index.blade.php ENDPATH**/ ?>