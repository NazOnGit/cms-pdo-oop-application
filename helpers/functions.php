<?php
// =========================================
// QUICK REVIEW OF FUNCTIONS IN THIS PAGE
// =========================================

// require/include PHP files
// require_once ROOT_PATH . "/helpers/functions.php";
// starts with "/" after ROOT_PATH

// dynamic server filesystem path
//base_path('helpers/functions.php');
// no starting slash needed
// ltrim() removes it if you accidentally write "/helpers/functions.php"

// normal browser page URL
// base_url('pages/guest/login.php');
// no starting slash needed

// assets URL: CSS, JS, images, fonts
// asset_url('css/index.css');
// no starting slash needed
// because function already enters assets/

// uploads browser URL: <img src="">, download links
// uploads_url('photo.jpg');
// no starting slash needed
// because function already enters uploads/

// uploads server path: move/delete/check uploaded files
// uploads_path('photo.jpg');
// no starting slash needed
// because function already enters uploads/


// ===========================
// 1. ACTIVE CLASS FUNCTION
// ===========================

function setActiveClass(string $pageName): string
{
  $current_page = basename($_SERVER['PHP_SELF']);
  return $current_page === $pageName
    ? 'is-active'
    : '';
}

// ======================================
// 2. BUILD FULL WEBSITE URL FUNCTION
// ======================================
// Creates a full browser URL using the current protocol
// (http/https), host/domain, project folder, and optional path.
//
// Used for:
// - href links
// - src attributes (images, CSS, JS)
// - redirects
// - dynamically generated URLs
//
// Example:
// http://localhost/sql-pdo-oop-cms-application/pages/login.php

function base_url($path = "")

{ // Detect current protocol (http or https).
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off"
    ? 'https://'
    : 'http://';

  // Get current host/domain.
  // Example: localhost:8888 or example.com
  $host = $_SERVER['HTTP_HOST'];

  // Build website root URL.
  $baseUrl = $protocol . $host . '/' . PROJECT_DIR;

  // Remove leading slash from path to avoid double slashes.
  return $baseUrl . '/' . ltrim($path, '/');
}


// ======================================
// 3. BUILD FULL SERVER FILE PATH FUNCTION
// ======================================
// Creates a full filesystem path from the project root.
// Used for PHP server-side operations:
// - require/include
// - uploads
// - deleting files
// - checking if files exist
//
// Example:
// /Applications/MAMP/htdocs/sql-pdo-oop-cms-application/uploads/image.jpg
function base_path($path = "")
{
  // ROOT_PATH = project root filesystem path.
  $rootPath = ROOT_PATH;
  // Remove leading slash from provided path
  // to avoid duplicate separators.
  return $rootPath . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
}



// ======================================
// 4. BUILD FULL UPLOADS FOLDER FILE PATH
// ======================================

// Creates a FULL REAL server/computer path

// specifically for files inside the uploads folder.

// Used for:

// - uploaded images

// - deleting uploads

// - moving uploaded files

// - checking if upload files exist

// Example final result:

// /Applications/MAMP/htdocs/sql-pdo-oop-cms-application/uploads/photo.jpg
function uploads_path($filename = '')
{
  // base_path()

  // already builds the FULL project filesystem path.

  // 'uploads'

  // means:

  // go into uploads folder

  // DIRECTORY_SEPARATOR

  // automatically inserts correct slash:

  // Mac/Linux:

  // /

  // Windows:

  // \

  // $filename

  // is the file name passed into the function.

  // Example:

  // photo.jpg

  // Final combined path:

  // uploads/photo.jpg
  return base_path('uploads' . DIRECTORY_SEPARATOR . $filename);
}


// ======================================
// 5. BUILD UPLOAD FILE BROWSER URL ‼️‼️‼️
// ======================================

function uploads_url($filename = '')
{
  // Creates a browser URL for files inside /uploads.

  // Use this for:

  // - <img src="">

  // - download links

  // - displaying uploaded files in the browser

  // Example:

  // uploads_url('cat.jpg')

  // Result:

  // http://localhost/sql-pdo-oop-cms-application/uploads/cat.jpg

  // base_url('uploads/')

  // builds the project website URL and enters the uploads folder.
  return base_url('uploads/' . ltrim($filename, '/'));
}



// ======================================
// 6. BUILD ASSET BROWSER URL FUNCTION
// ======================================

// Creates browser-accessible URLs specifically

// for project assets like:

// - CSS

// - JavaScript

// - images

// - fonts

// This function depends on base_url()

// which builds the main website root URL.

// Example final result:

// http://localhost/assets/css/style.css

// Or ideally for project-folder setups:

// http://localhost/sql-pdo-oop-cms-application/assets/css/style.css
function asset_url($path = "")
{
  // base_url('assets/')

  // asks base_url() to:

  // 1. build the website root URL

  // 2. then enter the assets folder

  // Example:

  // http://localhost/assets/

  // ltrim($path, '/')

  // removes starting "/" from provided path

  // to avoid accidental double slashes.

  // Example:

  // "/css/style.css"

  // becomes:

  // "css/style.css"

  // Final browser asset URL:

  // http://localhost/assets/css/style.css

  // Narration:
  // asset_url() asks base_url() to first build the main website URL including the project folder.

  // Then it enters the assets folder.

  // Then it attaches whatever CSS, JS, image, or font path we pass into the function.

  // Finally it returns one complete browser-accessible asset URL.
  return base_url('assets/') . ltrim($path, '/');
}


// ======================================
// 7. REDIRECT USER TO ANOTHER PAGE
// ======================================

// Redirects browser to another page URL
// and immediately stops script execution.
//
// Commonly used after:
// - form submissions
// - login/register actions
// - create/update/delete operations
//
// Example:
// redirect('pages/guest/login.php');
function redirect($url)
{
  // Build full URL and send browser redirect.
  header('Location: ' . base_url($url));

  // Stop current script after redirect.
  exit;
}

// 8. REQUEST TYPE HELPER
// The main benefit is making the code readable and obvious: if (isPostRequest())
// Check server array
// Get request method
// Compare to POST
// Returns true when the current request was sent using HTTP POST.
// Used for form submissions and actions that send data to the server.
function isPostRequest()
{
  return $_SERVER['REQUEST_METHOD'] === "POST";
}

// 9. POST DATA RETRIEVER HELPER
// retrives a POST field value
// $_POST = PHP superglobal associative array container.
// Inside it are individual key-value pairs,
// where the key usually comes from the form input's name attribute
// and the value comes from the user's submitted input.
// Automatically stores form data submitted via HTTP POST request.
// Returns trimmed input if field exists.
// Otherwise returns the provided default value.
function getPostData($field, $default = null)
{
  return isset($_POST[$field])
    ? trim($_POST[$field])
    : $default;
}
