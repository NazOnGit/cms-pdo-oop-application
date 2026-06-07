<?php
// DATABASE CONNECTION PARAMETERS

// We separated database configuration values from the Database class (database.php) for cleaner architecture and easier maintenance.

// The config.php file stores reusable database constants like host, database name, username, and password.

// Then the Database class imports and reads these constants into its class properties, so the class can use them to create the PDO connection dynamically.

// This keeps sensitive configuration centralized instead of hardcoding credentials directly inside the class.

// FLOW
// config.php stores DB constants
// ↓
// Database class properties use these constants in database.php
// ↓
// getConnection() method uses those properties
// ↓
// PDO connection object gets created
const DB_HOST = 'localhost';
const DB_NAME = 'cms_pdo_db';
const DB_USER = 'root';
const DB_PASS = 'root';
