<?php
// APPLICATION BOOTSTRAP
require_once "../../config/init.php";

// PAGE META DATA: define dynamic variables (title + styles)
// 1. Define variables BEFORE head.php so it can access them.
// head.php reads these variables and prints them into the <head>.
// If head.php runs first, it won’t know these variables exist.
// for BASE_URL & ROOT_PATH —> boostrap.php
$page_title = "about";
$page_specific_stylesheet = [
  BASE_URL . "/assets/css/about.css",
  BASE_URL . "/assets/css/navbar.css",
  BASE_URL . "/assets/css/hero.css",
  BASE_URL . "/assets/css/footer.css"
];

// PAGE LAYOUT
// 2. Load HTML structure + inject dynamic values (title + CSS)
include ROOT_PATH . "/partials/head.php";

// 3. Render page content (components)
// for other components visit: footer.php
include ROOT_PATH . "/partials/navbar.php";
include ROOT_PATH . "/partials/hero.php";
?>

<!-- FULL-WIDTH PAGE CONTAINER [about.php] container -->
<!-- taking full width of <body> -->
<!-- Handles vertical layout (flex column, min-height) and pushing footer down -->
<!-- Acts as the outer shell for this specific page -->
<main class="about-page">
  <!-- LAYOUT WRAPPER (CONSTRAINT LAYER) -->
  <!-- Centers content horizontally (margin: 0 auto) -->
  <!-- Applies max-width (e.g. 120rem, 140rem) -->
  <div class="about-page__wrapper">
    <!-- CONTENT CONTAINER (INNER LAYOUT) -->
    <!-- Holds actual page content (text, sections, components) -->
    <div class="about-content">
      <h1 class="about-primary">page under construction...</h1>

    </div>
  </div>
</main>

<?php
// 3. Render page content (components)
include ROOT_PATH . "/partials/footer.php";
