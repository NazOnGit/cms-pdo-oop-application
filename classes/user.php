<?php
// USER DATABASE OPERATIONS
// Handles user-related database actions such as:
// - registration
// - authentication/login
class User
{
  private $conn;
  private $table = 'users';

  // CONNECT TO USER TABLE IN DATABASE
  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->getConnection();
  }

  // REGISTER USERS INTO DATABASE / HASH PASSWORDS
  // register.php extracts data from $_POST:
  // $username
  // $email
  // $password
  // and passes those values from the from to the User object's register($username, $email, $password) method when the the class is instantiated and the class calls on the register method.
  public function register($username, $email, $password)
  {
    $query = "INSERT INTO " . $this->table . " (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $this->conn->prepare($query);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    // EXECUTE DATABASE USER QUERIES
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
}
