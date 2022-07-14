<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
        <a href="./" class="brand-link">
                <h3 class="text-center p-0 m-0"><b><?php echo  mysqli_este("select firstname from users where id = '" . $_SESSION['login_id'] . "'", "firstname") ?></b></h3>
            

        </a>

    </div>
    <div class="sidebar pb-4 mb-4">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item dropdown">
                    <a href="<?php echo SERVERURL ?>" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Noticias
                        </p>
                    </a>
                </li>
                <?php if ($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2) : ?>
                <!-- noticia -->
                <li class="nav-item">
                    <a href="#" class="nav-link nav-noticia_nueva nav-noticia_lista nav-noticia_editar">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>
                            Noticias
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL ?>noticia/nueva/" class="nav-link nav-noticia_nueva tree-item">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Agregar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL ?>noticia/lista/" class="nav-link nav-noticia_lista tree-item">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- FIN noticia -->
                <?php endif; ?>
                <?php if ($_SESSION['login_type'] == 1) : ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-edit_user">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Usuarios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo SERVERURL ?>user/new/" class="nav-link nav-new_user tree-item">
                                    <i class="fas fa-angle-right nav-icon"></i>
                                    <p>Agregar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo SERVERURL ?>user/list/" class="nav-link nav-user_list tree-item">
                                    <i class="fas fa-angle-right nav-icon"></i>
                                    <p>Lista</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </nav>
    </div>
</aside>
<script>
    $(document).ready(function() {
        var page =
            '<?php
                if (isset($_GET['page'])) {
                    $include = explode("/", $_GET['page']);
                    echo    $include[0] . "_" . $include[1];
                } else {
                    echo 'home';
                }   ?> ';
        var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
        if (s != '')
            page = page + '_' + s;
        if ($('.nav-link.nav-' + page).length > 0) {
            $('.nav-link.nav-' + page).addClass('active')
            if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
                $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
                $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
            }
            if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
                $('.nav-link.nav-' + page).parent().addClass('menu-open')
            }

        }

    })
</script>

