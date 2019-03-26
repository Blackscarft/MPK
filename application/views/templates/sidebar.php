<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>
    
    <?php 
        $role_id   = $this->session->userdata('roles_id');
        $queryMenu = "  SELECT `users_menu`.`id`,`menu`
                        FROM `users_menu` JOIN `users_access_menu`
                          ON `users_menu`.`id` = `users_access_menu`.`menu_id`
                        WHERE `users_access_menu`.`roles_id` = $role_id
                      ORDER BY `users_access_menu`.`id` ASC
                    ";
        $menus = $this->db->query($queryMenu)->result_array();
     ?> 
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Looping Menu -->
    <?php foreach ($menus as $menu) :?>
    <div class="sidebar-heading">
            <?= $menu['menu'] ?>
    </div>
    <!-- Submenu  -->
    <?php 
    $menuId = $menu['id'];
    $querySubMenu = "
                SELECT *
                  FROM `users_sub_menu`
                 WHERE `menu_id` = $menuId
                   AND `is_active` = 1
                 ";
    $subMenus = $this->db->query($querySubMenu)->result_array();
     ?>
    <?php foreach ($subMenus as $subMenu) : ?>
        <!-- Nav Item - Dashboard -->
        <?php if ($title == $subMenu['title']) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        
        <a class="nav-link pb-0" href="<?= base_url($subMenu['url']) ?>">
            <i class="<?= $subMenu['icon'] ?>"></i>
            <span><?= $subMenu['title'] ?></span></a>
    </li>
    <?php endforeach; ?>
    <!-- divider -->
    <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>
    <!-- Nav Item - Log out -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
<!-- End of Sidebar --> 
</ul>
