<?php
// APPLICATION INITIALIZATION
require_once "config/init.php";

// PAGE META DATA: define dynamic variables (title + styles)
// 1. Define variables BEFORE head.php so it can access them.
// head.php reads these variables and prints them into the <head>.
// If head.php runs first, it won’t know these variables exist.
// for BASE_URL & ROOT_PATH —> boostrap.php
$page_title = "home";
$page_specific_stylesheet = [
  asset_url('css/index.css'),
  asset_url('css/navbar.css'),
  asset_url('css/hero.css'),
  asset_url('css/footer.css')
];

// PAGE LAYOUT
// 2. Load HTML structure + inject dynamic values (title + CSS)
include base_path('partials/head.php');

// 3. Render page content (components)
// for other components visit: footer.php
include base_path("partials/navbar.php");
include base_path("partials/hero.php");

// ARTICLE CLASS INSTANTIATION
$article = new Article();
$articles = $article->get_all();
// echo "<pre>";
// var_dump($article);
// echo "</pre>";

?>


<main class="blog-post__wrapper">
  <!-- Check if the query from get_all() method returned any article rows. -->
  <!-- we only need one blog post as template to fill in dynamic data -->
  <?php if (!empty($articles)): ?>
    <?php foreach ($articles as $article): ?>
      <div class="blog-post__contents">
        <div class="blog-post__img-container">

          <!-- $article = one article row from database -->

          <!-- $article->image = value from image column -->
          <?php if (!empty($article->image)): ?>
            <img
              src="<?php echo uploads_url($article->image); ?>"
              class="blog-post__img"
              alt="<?php echo htmlspecialchars($article->title); ?>">

          <?php else: ?>
            <div class="blog-post__img blog-post__img-placeholder"></div>
          <?php endif; ?>
        </div>

        <div class="blog-post__body">
          <h2 class="blog-post__title"><?php echo $article->title; ?></h2>
          <p class="blog-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, pulvinar facilisis justo mollis, auctor consequat urna.</p>
          <a href="" class="btn btn-blog">read more</a>
        </div>
      </div>


    <?php endforeach; ?>
  <?php endif; ?>
</main>

<?php
// 3. Render page content (components)
include base_path("partials/footer.php");
