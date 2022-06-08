<header id="header" class="header-area absulate-header animated cssanimation">
    <div class="container">
        <div class="row">
            <div class="col-9 col-md-3">
                <!-- Start site logo -->
                <div class="site-logo">
                    <a href="index.html"><img src="../../assets/images/logo-1.png" alt=""></a>
                </div>
                <!-- End site logo -->
            </div>
            <div class="col-3 col-md-9">
                <!-- Start main navigation -->
                <div class="main-menu-wrap">
                    <nav class="proone-nav" style="display: block;">
                        <?php wp_nav_menu(array('theme_location' => 'top', 'container' => false)); ?>
                    </nav>
                </div>
                <!-- Mobile Menu Active here. Don't Remove it -->
                <div class="mobile-menu-area"></div>
                <!-- End main navigation -->
            </div>
        </div>
    </div>
</header>