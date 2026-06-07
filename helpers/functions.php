<?php

// =========================================
// QUICK REVIEW OF FUNCTIONS IN THIS PAGE
// =========================================
// 1. setActiveClass(): ‼️

// Checks current page filename using $_SERVER['PHP_SELF'] and basename()

// then returns active CSS class for current navigation link highlighting.

// 2. base_url(): ‼️

// Creates a FULL browser website URL using protocol (http/https),

// current host/domain, PROJECT_DIR, and optional browser path.

// Used for href, src, redirects, assets, and browser-accessible URLs.

// 3. base_path(): ‼️

// Creates a FULL REAL server/computer filesystem path using __DIR__,

// dirname(), PROJECT_DIR, DIRECTORY_SEPARATOR, and optional server path.

// Used for require/include, uploads, deleting files, and filesystem operations.

// 4. uploads_path(): ‼️

// Creates a FULL REAL filesystem path specifically for storing files being uploaded into the 

// uploads folder using base_path(), DIRECTORY_SEPARATOR, and optional upload filename.

// Where is the file physically stored on the computer/server?

// 5. uploads_url(): ‼️

// Creates a FULL browser-accessible URL specifically for files inside uploads folder

// using base_url() and optional upload filename.

// 6. asset_url(): ‼️

// Creates a FULL browser asset URL specifically for CSS, JS, images, and fonts

// using base_url(), assets folder path, and optional asset path.

// What website URL should the browser use to view this file?

// 7. redirect(): ‼️

// Redirects browser to another page URL using header('Location: '),

// base_url(), and immediately stops script execution using exit.







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

// Creates a FULL real filesystem path on the server/computer.

// Unlike base_url(), this is NOT for browser links.

// This is for PHP/server-side operations like:

// - require/include

// - uploads

// - deleting files

// - checking if files exist

// Example final result:

// /Applications/MAMP/htdocs/sql-pdo-oop-cms-application/uploads/image.jpg

function base_path($path = "")
{
  // __DIR__ means:

  // "the folder THIS current file lives in"

  // Example:

  // if this function is relatively inside:

  // /config/init.php

  // then:

  // __DIR__

  // becomes:

  // /config

  // dirname(__DIR__)

  // means:

  // "go UP one folder from the current folder"

  // Example:

  // /config

  // ↓ go up

  // /sql-pdo-oop-cms-application

  // PROJECT_DIR

  // is usually a constant storing project folder name.

  // Example:

  // sql-pdo-oop-cms-application

  // DIRECTORY_SEPARATOR

  // automatically uses the correct slash for the operating system.

  // Windows:

  // \

  // Mac/Linux:

  // /

  // This makes paths safer across different systems.

  // Combine everything together:

  // project root path

  // +

  // operating system slash

  // +

  // project folder name


  $rootPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . PROJECT_DIR;

  // ltrim($path, DIRECTORY_SEPARATOR)

  // removes starting slash from the provided path

  // to avoid double slashes.

  // Example:

  // "/uploads/image.jpg"

  // becomes:

  // "uploads/image.jpg"

  // Final full server filesystem path:

  // /Applications/MAMP/htdocs/sql-pdo-oop-cms-application/uploads/image.jpg

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
