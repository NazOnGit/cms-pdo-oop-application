<?php

// APPLICATION INITIALIZATION
// a file that prepares the environment for every page
// Any page that includes init.php automatically has access and init.php is responsible for:
// 1. global constants
// 2. sessions
// 3. database connection
// 4. helper functions
// 5. error reporting



// 1. DEFINE GLOBAL CONSTANTS
// ROOT_PATH = absolute filesystem path to the project root.
// Used by PHP for require/include paths.
// Prevents messy relative paths like ../../ everywhere.
// Example:
// /Applications/MAMP/htdocs/sql-pdo-oop-cms-application
define('ROOT_PATH', dirname(__DIR__));


// BASE_URL = browser URL path to project root
// Used in href, src, CSS, JS, images
define('BASE_URL', '/sql-pdo-oop-cms-application');


// PROJECT_DIR = project folder name only
// Used by helper functions like base_url()
// DO NOT start with "/"
define('PROJECT_DIR', 'sql-pdo-oop-cms-application');

// APP_NAME = global application/project name constant
// Used for reusable branding, titles, headings, and project text across the app
define("APP_NAME", "CMS PDO SYSTEM");

// 2. SESSION START
session_start();

// 3. ERROR DISPLAY
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 3. DATABASE CONNECTION PARAMETERS
// Uses current-folder (__DIR__) navigation.
// Good for localized/self-contained includes inside config folder.
require_once __DIR__ . "/config.php";


// 4. CLASSES AUTOLOADER
// Use current-folder (__DIR__) navigation.
require_once __DIR__ . "/autoloader.php";

// 4. LOAD DATABASE WITHOUT AUTOLOADER
// Uses project-root (ROOT_PATH) navigation.
// Good for app-wide/global includes without ../../ climbing.
// require_once ROOT_PATH . "/classes/database.php";


// 5. HELPER FUNCTIONS
require_once ROOT_PATH . "/helpers/functions.php";
