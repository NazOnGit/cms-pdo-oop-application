<?php
// Register an automatic class-loading function.
// Whenever PHP encounters a class that is being instantiated or used,
// but the class file has not already been loaded through require/include,
// PHP automatically runs this autoloader function.
// PHP automatically calls this function and passes the class name
// into $class_name.
// Example:

// $db = new Database();

// PHP looks for the Database class definition.

// If Database.php has not been loaded yet,

// PHP automatically runs this autoloader and passes:

// $class_name = "Database"

// The autoloader then attempts to locate and load:

// classes/Database.php

// This removes the need to manually require class files

// throughout the application.
spl_autoload_register(function ($class_name) {
  // BUILD CLASSES FOLDER DIRECTORY PATH
  $directory = ROOT_PATH . "/classes/";
  // BUILD EXPECTED CLASS FILE PATH
  // Example:
  // Database → classes/Database.php
  $file = $directory . $class_name . ".php";
  // LOAD CLASS FILE IF FOUND
  if (file_exists($file)) {
    require_once $file;
  } else {
    // STOP EXECUTION IF CLASS FILE IS MISSING
    die("class file for {$class_name} not found in {$file}");
  }
});
