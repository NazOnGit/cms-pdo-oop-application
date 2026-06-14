<?php
// APPLICATION BOOTSTRAP
require_once "../../config/init.php";

// PAGE META DATA: define dynamic variables (title + styles)
// 1. Define variables BEFORE head.php so it can access them.
// head.php reads these variables and prints them into the <head>.
// If head.php runs first, it won’t know these variables exist.
// for BASE_URL & ROOT_PATH —> boostrap.php
$page_title = "login";
$page_specific_stylesheet = [
  BASE_URL . "/assets/css/login.css",
  BASE_URL . "/assets/css/navbar.css",
  BASE_URL . "/assets/css/hero.css",
  BASE_URL . "/assets/css/footer.css"
];

// PAGE LAYOUT
// 2. Load HTML structure + inject dynamic values (title + CSS)
include ROOT_PATH . "/partials/head.php";

// 3. Render page content (components)
include ROOT_PATH . "/partials/navbar.php";
include ROOT_PATH . "/partials/hero.php";

// GETTING DATA & HANDLE USER REGISTRATION VIA FORM SUBMISSION USING FUNCTION HELPERS FROM FUNCTIONS.PHP
if (isPostRequest()) {
  $email = getPostData('email');
  $password = getPostData('password');

  $user = new User();

  if ($user->login($email, $password)) {
    redirect("pages/admin/admin.php");
  } else {
    echo "login failed";
  }
}


?>

<main class="login-page">
  <div class="login-form__container">
    <form class="login-form" method="POST">
      <!-- Login title -->
      <h1 class="login-form__title">login</h1>
      <!-- PHP Error message -->
      <!-- Input box -->
      <div class="login-form__input-container">

        <!-- Email input -->
        <div class="login-form__input-group">
          <label for="email" class="login-form__label">*email address</label>
          <input
            type="email"
            class="login-form__input"
            name="email"
            placeholder="email address"
            required />
        </div>
        <!-- Password input -->
        <div class="login-form__input-group">
          <label for="password" class="login-form__label">*password</label>
          <input
            type="password"
            class="login-form__input"
            name="password"
            placeholder="password" />
        </div>
        <!-- Button -->
        <div class="form-btn__wrapper">
          <button type="submit" class="global-btn login-form__btn">enter</button>
        </div>
        <!-- Register new account -->
        <div class="register-btn__wrapper">
          <p class="register-text">Don't have an account?</p>
          <a href="<?php echo BASE_URL; ?>/pages/guest/register.php" class="register-link">register here</a>
        </div>
      </div>
    </form>
  </div>
</main>


<?php
// 3. Render page content (components)
include ROOT_PATH . "/partials/footer.php";
