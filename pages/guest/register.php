<?php
// APPLICATION INITIALIZATION
require_once "../../config/init.php";


// PAGE META DATA: define dynamic variables (title + styles)
// 1. Define variables BEFORE head.php so it can access them.
// head.php reads these variables and prints them into the <head>.
// If head.php runs first, it won’t know these variables exist.
// for BASE_URL & ROOT_PATH —> boostrap.php
$page_title = "register";
$page_specific_stylesheet = [
  BASE_URL . "/assets/css/register.css",
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

// GETTING DATA & HANDLE USER REGISTRATION VIA FORM SUBMISSION USING FUNCTION HELPERS FROM FUNCTIONS.PHP
if (isPostRequest()) {
  $username = getPostData('username');
  $email = getPostData('email');
  $password = getPostData('password');
  $confirm_password = getPostData('confirm_password');


  $user = new User();

  if ($user->register($username, $email, $password)) {
    redirect("pages/guest/login.php");
  } else {
    echo "registration failed";
  }
}
?>




<main class="register-page__main">
  <div class="register-wrapper">
    <!-- Form -->
    <form class="register-form" method="POST">
      <!-- Title -->
      <div class="register-title__wrapper">
        <h1 class="register-title">register</h1>
      </div>
      <!-- PHP Error message -->
      <div class="register-input__container">
        <!-- Username input -->
        <div class="form-group">
          <label for="username" class="form-label">*username</label>
          <input
            name="username"
            id="username"
            type="text"
            class="form-input__field"
            placeholder="username"
            value="" required />
        </div>
        <!-- Email input -->
        <div class="form-group">
          <label for="email" class="form-label">*email address</label>
          <input
            type="email"
            name="email"
            class="form-input__field"
            placeholder="email"
            value=""
            required />
        </div>
        <!-- Password input -->
        <div class="form-group">
          <label for="*password" class="form-label" name="password">*password</label>
          <input
            type="password"
            class="form-input__field"
            name="password"
            placeholder="enter password"
            value=""
            required />
        </div>
        <!-- Confirm password input -->
        <div class="form-group">
          <label for="password" class="form-label" name="password">*confirm password</label>
          <input
            type="password"
            class="form-input__field"
            name="confirm_password"
            placeholder="confirm password"
            value=""
            required />
        </div>
        <!-- Register button -->
        <div class="form-btn__wrapper">
          <button type="submit" class="global-btn register-btn">register</button>
        </div>
      </div>
    </form>
  </div>
</main>

<?php
// 3. Render page content (components)
include ROOT_PATH . "/partials/footer.php";
