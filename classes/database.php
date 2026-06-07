<?php
class Database
{
  // DATABASE CONFIGURATION PROPERTIES
  // Store database connection parameters loaded from configuration constants(config.php) into the class properties.
  // Each Database object receives these values and uses them
  // when creating a PDO connection object.
  // these properties become part of the object’s internal state when the object is created.
  // $conn holds the connection object used to talk to the database.
  // $conn is just an open communication line to the database
  private $host = DB_HOST;
  private $db_name = DB_NAME;
  private $username = DB_USER;
  private $password = DB_PASS;

  // HOLDS FINAL PDO DATABASE CONNECTION OBJECT
  public $conn;


  // CREATE AND RETURN PDO DATABASE CONNECTION
  public function getConnection()
  {
    // TRY DATABASE CONNECTION
    // If connection fails, PDO throws exception.
    try {

      // CREATE PDO DATABASE CONNECTION OBJECT
      // mysql:host=localhost;dbname=cms_pdo_db
      // built dynamically using current object properties.
      $this->conn = new PDO(
        "mysql:host={$this->host};dbname={$this->db_name}",
        $this->username,
        $this->password
      );

      // FORCE PDO TO THROW REAL EXCEPTIONS/ERRORS
      // instead of silently failing.
      $this->conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
      );
    } catch (PDOException $exception) {

      // DISPLAY DATABASE CONNECTION ERROR
      echo "Connection error" . $exception->getMessage();
    }

    // RETURN FINAL PDO CONNECTION OBJECT
    // What do we use the returned connection for?
    // 1. Run SQL queries
    // 2. Create records (INSERT)
    // 3. Read records (SELECT)
    // 4. Update records (UPDATE)
    // 5. Delete records (DELETE)
    // 6. Prepare statements
    // 7. Fetch database results
    // 8. Begin/commit transactions
    return $this->conn;
  }
}
