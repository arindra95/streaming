<?php
$role = $this->session->userdata('role');
?>
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url(); ?>" target="_blank">
        <i class="fas fa-home"></i>
        <span>Home Page</span></a>
</li>


<?php if ($role == '1') { ?>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Supper Admin
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datavalue" aria-expanded="true" aria-controls="datavalue">
            <i class="fas fa-cog"></i></i>
            <span>Control Panel</span>
        </a>
        <div id="datavalue" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Control:</h6>
                <a class="collapse-item" href="<?= base_url('Admin/brandList') ?>">Brand</a>
                <a class="collapse-item" href="<?= base_url('Admin/adsList') ?>">Iklan</a>
                <a class="collapse-item" href="<?= base_url('Admin/headList') ?>">Header Seo</a>
                <a class="collapse-item" href="<?= base_url('Admin/contentList') ?>">Content</a>
                <a class="collapse-item" href="<?= base_url('Admin/menuList') ?>">Menu</a>
                <a class="collapse-item" href="<?= base_url('Admin/liveList') ?>">Live Streaming</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#galery" aria-expanded="true" aria-controls="galery">
            <i class="fas fa-user-cog"></i>
            <span>User</span>
        </a>
        <div id="galery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Input:</h6>
                <a class="collapse-item" href="<?= base_url('Admin/userList') ?>">User</a>
            </div>
        </div>
    </li>
<?php } ?>