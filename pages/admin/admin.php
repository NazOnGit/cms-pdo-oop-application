<?php
// APPLICATION INITIALIZATION
// include; optional UI pieces
// used to load OPTIONAL php files in which when those files are missing, site still runs

// require: used to load IMPORTANT php files. if files are lost php throws fatal error

// require_once:
// critical system setup
// same as require, but prevents from loading duplicate files
require_once "../../config/init.php";
// echo base_url('pages/admin/admin.php');


// PAGE META DATA: define dynamic variables (title + styles)
// 1. Define variables BEFORE head.php so it can access them.
// head.php reads these variables and prints them into the <head>.
// If head.php runs first, it won’t know these variables exist.
// for BASE_URL & ROOT_PATH —> boostrap.php
$page_title = "dashboard";
$page_specific_stylesheet = [
  BASE_URL . "/assets/css/admin.css",
  BASE_URL . "/assets/css/adm_navbar.css",
  BASE_URL . "/assets/css/footer.css"
];

// PAGE LAYOUT
// 2. Load HTML structure + inject dynamic values (title + CSS)
include ROOT_PATH . "/partials/head.php";

// 3. Render page content (components)
include ROOT_PATH . "/partials/navbar.php";
?>

<!-- === Page specific admin.php container === -->
<main>
  <div class="admin__title-wrapper">
    <h1 class="admin-title">dashboard</h1>
  </div>

  <div class="admin__table-wrapper">
    <table class="admin__table">
      <thead>
        <tr>
          <th>id</th>
          <th>title</th>
          <th>author</th>
          <th>published date</th>
          <th>exerpt</th>
          <th>actions</th>
        </tr>
      </thead>


      <tbody>
        <tr>
          <!-- ======================================= -->
          <!-- DISPLAY EACH USER’S INFO IN TABLE -->
          <!-- ======================================= -->
          <td></td>
          <td></td>
          <td></td>
          <td></td>

          <!-- ‼️‼️‼️‼️ -->
          <td>
            <a href="" class="t__form-btn btn-green">edit</a>
          </td>

          <!-- ‼️‼️‼️‼️ -->
          <td>
            <div class="t__form-wrapper">
              <form class="t__form" method="POST">
                <input
                  type="hidden"
                  name="user_id"
                  value="" />

                <button class="t__form-btn btn-red">delete</button>
              </form>
            </div>
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>

<?php
// 3. Render page content (components)
include ROOT_PATH . "/partials/footer.php";
