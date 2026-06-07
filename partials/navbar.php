<header class="header-top__wrapper">

  <nav class="header-top__contents">
    <!-- Left section: logo navigation -->
    <div class="header-top__navbar-left">
      <a href="index.php" class="header-top__link <?php echo setActiveClass('index.php'); ?>">cms pdo system</a>
    </div>

    <!-- Right section -->
    <div class="header-top__navbar-right">
      <ul class="header-top__list">
        <li>
          <a href="<?php echo BASE_URL;  ?>/index.php" class="header-top__link <?php echo setActiveClass('index.php'); ?>">home</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL;  ?>/pages/guest/login.php" class="header-top__link">admin</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL;  ?>/pages/guest/about.php" class="header-top__link <?php echo setActiveClass('about.php'); ?>">about</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL;  ?>/pages/guest/contact.php" class="header-top__link <?php echo setActiveClass('contact.php'); ?>">contact</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL;  ?>/pages/guest/login.php" class="header-top__link <?php echo setActiveClass('login.php'); ?>">login</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL;  ?>/pages/guest/register.php" class="header-top__link <?php echo setActiveClass('register.php'); ?>">register</a>
        </li>
      </ul>
    </div>
  </nav>
</header>