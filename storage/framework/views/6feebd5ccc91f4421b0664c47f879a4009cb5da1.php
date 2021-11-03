
    <!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if(Auth::user()->profile_image !=''): ?>
                    <img src="<?php echo e(Auth::user()->profile_image); ?>" class="img-circle elevation-2" alt="User Image">
                <?php else: ?>
                <img src="<?php echo e(asset('admin/assets/img/avatar.png')); ?>" class="img-circle elevation-2" alt="User Image">
                    <?php endif; ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                 <?php if(Auth::user()->role_type!=2): ?>  
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/dashboard'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('admin.userlist')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/user-list'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            User List 
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('admin.officelist')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/office-list'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Center List
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/batch_detail')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/batch_detail'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Batch 
                        </p>
                    </a>
                </li>

                  <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/user_batch')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/user_batch'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Online Batch Detail
                        </p>
                    </a>
                </li>
                 <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/attendance_mark')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/attendance_mark'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Attendance
                        </p>
                    </a>
                </li> 
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/attendenceDetail')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/attendenceDetail'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Attendance Detail
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/BatchSessionCount')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/BatchSessionCount'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Batch Session Count
                        </p>
                    </a>
                </li>
                <?php if(Auth::user()->uid == "Ashwani_A"): ?>
                    <li class="nav-item has-treeview">
                        <a href="<?php echo e(url('admin/newdashboarduser')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                New Dashboard
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
               <!-- <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/support')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Support
                        </p>
                    </a>
                </li>-->
                <?php else: ?>
               
                 <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/attendance_mark')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/attendance_mark'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Attendance
                        </p>
                    </a>
                </li> 
                    <?php if(Auth::user()->id == 83670): ?>
                    <li class="nav-item has-treeview">
                        <a href="<?php echo e(url('admin/newdashboard')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/newdashboard'? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dummy Dashboard
                            </p>
                        </a>
                    </li> 
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(Auth::user()->role_type == 1): ?>
                <!-- <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/attendenceDetailstatus')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/attendenceDetail'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Attendance Detail_status
                        </p>
                    </a>
                </li> -->
                <?php endif; ?>
                 	
                <?php if(Auth::user()->role_type == 4): ?>

                
              <!-- <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/import')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/import'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Excel Import
                        </p>
                    </a>
                </li> -->

                <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/dashboard1')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/dashboard1'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                             DS
                        </p>
                    </a>
                </li>

                 <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('admin/attendencereport')); ?>" class="nav-link <?php echo e(Request::path() == 'admin/dashboard1'? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                             Attendence Report
                        </p>
                    </a>
                </li> 

                <?php endif; ?>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /home/azureuser/dutyParLatest/resources/views/admin/layout/sidebar.blade.php ENDPATH**/ ?>