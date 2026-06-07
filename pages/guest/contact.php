<?php
// APPLICATION INITIALIZATION
require_once "../../config/init.php";

// PAGE META DATA: define dynamic variables (title + styles)
// 1. Define variables BEFORE head.php so it can access them.
// head.php reads these variables and prints them into the <head>.
// If head.php runs first, it won’t know these variables exist.
// for BASE_URL & ROOT_PATH —> boostrap.php
$page_title = "contact";
$page_specific_stylesheet = [
  BASE_URL . "/assets/css/contact.css",
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
?>



<!-- page specific contact.php container -->
<main class="contact-page">
  <!-- Page layout width container -->
  <div class="contact-page__wrapper">
    <!-- Page content layout width container -->
    <div class="contact-content">
      <!-- column 1 -->
      <div class="contact-content__column-1">
        <!-- Title input -->
        <h1 class="contact-title">get in touch</h1>
        <!-- Form container -->
        <form class="contact-form" action="" method="POST" enctype="text/plain">
          <!-- Name input -->
          <div class="form-group">
            <label for="name" class="form-label">name <span aria-hidden="true">*</span></label>
            <input
              id="name"
              type="text"
              class="form-input"
              value=""
              required />
          </div>
          <!-- Email input -->
          <div class="form-group">
            <label for="email" class="form-label">email

              <span aria-hidden="true">*</span></label>
            <input
              id="email"
              type="email"
              class="form-input"
              value=""
              required />
          </div>
          <!-- Message input -->
          <div class="form-group">
            <label for="message" class="form-label form-message">
              message
              <!-- Sighted users see: Message * -->
              <!-- * is hidden from screen readers -->
              <span aria-hidden="true">*</span>
            </label>

            <textarea
              id="message"
              name="message"
              class="form-input"
              rows="5"
              placeholder="How can we help you?"
              required></textarea>
            <!-- Screen reader users hear: "Message required" -->
          </div>
          <!-- Button -->
          <div class="form-btn__wrapper">
            <button type="submit" class="global-btn contact-btn">send message</button>
          </div>
        </form>
      </div>
      <!-- Column 2 -->
      <div class="contact-content__column-2">
        <!-- title -->
        <h2 class="contact-title">contact information</h2>
        <!-- text -->
        <p class="contact-text">Feel free to reach out to us through any of the following methods.</p>

        <!-- list -->
        <ul class="contact__info-list">
          <li class="list">
            <strong class="list-strong">email:</strong>
            <span class="list-value">
              <a href="mailto:chinazaebii@gmail.com" class="list-link">Builddreams@mail.com</a>
            </span>
          </li>

          <li class="list">
            <strong class="list-strong">phone:</strong>
            <span class="list-value">+79774478383
            </span>
          </li>

          <li class="list">
            <strong class="list-strong">address:</strong>
            <span class="list-value">1-ya Magistralnaya ulitsa, 15, Moscow, 123290, Russia</span>
          </li>
        </ul>

        <!-- social icons -->
        <div class="flex__column-gap">
          <!-- link list title -->
          <h2 class="list-strong">follow us</h2>

          <!-- link list icons -->
          <ul class="contact__social-links">
            <!-- facebook icon -->
            <li>
              <a class="social-link" href="#">
                <ion-icon class="social-icon" name="logo-facebook"></ion-icon>
              </a>
            </li>
            <!-- twitter icon -->
            <li>
              <a class="social-link" href="#">
                <ion-icon class="social-icon"
                  name="logo-twitter"></ion-icon>
              </a>
            </li>

            <!-- instagram icon -->
            <li>
              <a class="social-link" href="#">
                <ion-icon class="social-icon"
                  name="logo-instagram"></ion-icon>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</main>



<?php
// 3. Render page content (components)
include ROOT_PATH . "/partials/footer.php";
