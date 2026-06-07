<?php
// APPLICATION INITIALIZATION
require_once "config/init.php";

// TEST DATABASE CONNECTION
// Creates a Database object from the Database class blueprint.
$db = new Database();
// The Database object calls its getConnection() method.
// The method creates a PDO database connection object.
// The method returns that connection object.
// The returned connection object is then stored in $conn for database communication and CRUD operations.
$conn = $db->getConnection();
if ($conn) {
  echo "database connection established and stored in \$conn.";
}
echo "<pre>";
var_dump($conn);
echo "</pre>";





// PAGE META DATA: define dynamic variables (title + styles)
// 1. Define variables BEFORE head.php so it can access them.
// head.php reads these variables and prints them into the <head>.
// If head.php runs first, it won’t know these variables exist.
// for BASE_URL & ROOT_PATH —> boostrap.php
$page_title = "home";
$page_specific_stylesheet = [
  BASE_URL . "/assets/css/index.css",
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


<main class="blog-post__wrapper">
  <div class="blog-post__contents">
    <div class="blog-post__img-container">
      <div class="blog-post__img"></div>
    </div>

    <div class="blog-post__body">
      <h2 class="blog-post__title">blog post title 1</h2>
      <p class="blog-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, pulvinar facilisis justo mollis, auctor consequat urna.</p>
      <a href="" class="btn btn-blog">read more</a>
    </div>
  </div>
</main>

<?php
// 3. Render page content (components)
include ROOT_PATH . "/partials/footer.php";
