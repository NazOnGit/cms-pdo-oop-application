<header class="header-top__wrapper">
  <nav class="header-top__contents">
    <!-- Left section: logo navigation -->
    <div class="header-top__navbar-left">
      <a href="admin.php"
        class="header-top__link <?php echo setActiveClass('admin.php'); ?>">cms pdo system - admin
      </a>
    </div>

    <!-- Right section -->
    <div class="header-top__navbar-right">
      <ul class="header-top__list">
        <li>
          <a href="<?php echo BASE_URL;  ?>/pages/admin/admin.php"
            class="header-top__link <?php echo setActiveClass('admin.php'); ?>">
            dashboard
          </a>
        </li>

        <li>
          <a href="create_article.php"
            class="header-top__link <?php echo setActiveClass('create_article.php'); ?>">
            create article
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('/index.php'); ?>"
            class="header-top__link <?php echo setActiveClass('index.php'); ?>">
            view site
          </a>
        </li>

        <li>
          <a href="profile.php"
            class="header-top__link <?php echo setActiveClass('profile.php'); ?>">
            profile
          </a>
        </li>

        <li>
          <a href="logout.php"
            class="header-top__link <?php echo setActiveClass('logout.php'); ?>">
            logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>