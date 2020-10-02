<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-cloud"></i>
            </div>
            <div class="sidebar-brand-text mx-3">
                <span>VanceWork</span>
            </div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php echo e((request()->segment(1) == 'dashboard') ? 'active' : ''); ?> " href="<?php echo e(route('admin')); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link <?php echo e((request()->segment(1) == 'encoding') ? 'active' : ''); ?>" href="<?php echo e(route('encoding')); ?>">
                    <i class="fas fa-pen"></i>
                    <span>201 Encoding</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php echo e((request()->segment(1) == 'profile') ? 'active' : ''); ?>" href="">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php echo e((request()->segment(1) == 'table') ? 'active' : ''); ?>" href="<?php echo e(route('record')); ?>">
                    <i class="fas fa-table"></i>
                    <span>Table</span>
                </a>
            </li>
            
        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
        </div>
    </div>
</nav><?php /**PATH D:\laragon\www\vancework-hris\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>