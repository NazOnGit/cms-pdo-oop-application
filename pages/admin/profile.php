<?php
// APPLICATION BOOTSTRAP
// include; optional UI pieces
// used to load OPTIONAL php files in which when those files are missing, site still runs

// require: used to load IMPORTANT php files. if files are lost php throws fatal error

// require_once:
// critical system setup
// same as require, but prevents from loading duplicate files
require_once "../../config/init.php";

// PAGE META DATA: define dynamic variables (title + styles)

// 1. Define variables BEFORE head.php so it can access them.

// head.php reads these variables and prints them into the <head>.

// If head.php runs first, it won’t know these variables exist.

// STYLE SHEET LOAD ORDER FROM (head.php)

// INITIALIZATION → reuse.css → navbar/footer → page specific CSS

$page_title = "profile";
$page_specific_stylesheet = [
  BASE_URL . "/assets/css/adm_navbar.css",
  BASE_URL . "/assets/css/footer.css",
  BASE_URL . "/assets/css/profile.css"
];

// PAGE LAYOUT
// 2. Load HTML structure + inject dynamic values (title + CSS)
// for BASE_URL & ROOT_PATH —> boostrap.php
include ROOT_PATH . "/partials/head.php";

// 3. Render page content (components)
include ROOT_PATH . "/partials/admin/adm_navbar.php";


?>

<!-- PAGE SPECIFIC CONTENT -->
<main>
  <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
      <a class="nav-link active ms-0" href="profile.php">Profile</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
      <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
          <div class="card-header">Profile Picture</div>
          <div class="card-body text-center">
            <!-- Profile picture image-->
            <img class="img-account-profile rounded-circle mb-2" src="https://picsum.photos/200" alt="Profile Image">
            <!-- Profile picture help block-->
            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
            <!-- Profile picture upload button-->
            <input class="form-control" type="file" name="profile_image" accept="image/*">
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
          <div class="card-header">Account Details</div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              <!-- Form Group (username)-->
              <div class="mb-3">
                <label class="small mb-1" for="inputUsername">Username</label>
                <input class="form-control" id="inputUsername" type="text" placeholder="Please enter Username" value="edwindiaz" disabled>
              </div>
              <!-- Form Row-->
              <div class="row gx-3 mb-3">
                <!-- Form Group (first name)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputFirstName">First name</label>
                  <input class="form-control" id="inputFirstName" type="text" name="first_name" placeholder="Please enter First name" value="Edwin">
                </div>
                <!-- Form Group (last name)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputLastName">Last name</label>
                  <input class="form-control" id="inputLastName" type="text" name="last_name" placeholder="Please enter Last name" value="Diaz">
                </div>
              </div>
              <!-- Form Row-->
              <div class="row gx-3 mb-3">
                <!-- Form Group (organization name)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputOrgName">Organization name</label>
                  <input class="form-control" id="inputOrgName" type="text" name="organization" placeholder="Please enter Organization name" value="Acme Corporation">
                </div>
                <!-- Form Group (location)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputLocation">Location</label>
                  <input class="form-control" id="inputLocation" type="text" name="location" placeholder="Please enter Location" value="New York, USA">
                </div>
              </div>
              <!-- Form Group (email address)-->
              <div class="mb-3">
                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                <input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Please enter Email address" value="EdwinDiaz@edwindiaz.com">
              </div>
              <!-- Form Row-->
              <div class="row gx-3 mb-3">
                <!-- Form Group (phone number)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputPhone">Phone number</label>
                  <input class="form-control" id="inputPhone" type="tel" name="phone" placeholder="Please enter Phone number" value="+1 (555) 123-4567">
                </div>
                <!-- Form Group (birthday)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputBirthday">Birthday</label>
                  <input class="form-control" id="inputBirthday" type="date" name="birthday" placeholder="Please enter Birthday" value="1990-01-01">
                </div>
              </div>
              <!-- Save changes button-->
              <button class="global-btn profile-save-btn" type="submit">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>































<?php
// 3. Render page content (components)
include ROOT_PATH . "/partials/footer.php";
