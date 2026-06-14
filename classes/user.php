<?php
// USER DATABASE OPERATIONS
// Handles database interactions related to users, such as:
// - creating/registering new user records
// - authenticating user login credentials
// - retrieving user data from database
// - updating user information
class User
{
  private $conn;
  private $table = 'users';




  // CONSTRUCTOR function __construct()
  // The constructor is a special method that runs automatically when an object is instantiated.
  // We use it here to automatically obtain a PDO database connection and store it in the User object's conn property.
  // This ensures every User object starts with a working database connection.

  // INITIALIZE DATABASE CONNECTION FOR USER OPERATIONS
  // Creates a Database object,
  // obtains a PDO connection object,
  // and stores it in $this->conn for user-related queries.
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

  // LOGIN USER
  // Find user by email and verify login password.
  public function login($email, $password)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    // Fetch matching database row as an object.
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    // $password = raw password from login form.
    // $user->password = hashed password stored in database.
    // password = database password column name.
    // Verify raw password matches stored hash.
    if ($user && password_verify($password, $user->password)) {
      return $user->id;
    }
  }
}
