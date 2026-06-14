<?php
class Article
{
  private $conn;
  private $table = 'articles';
  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->getConnection();
  }

  public function get_all()
  {
    $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    // Ask PDO database api to return all database rows as objects.
    // we use object property syntax -> to access fields because we are using pdo api which fetches data as objects.
    // ex:
    // $article->title
    // $article->content
    // $article->id
    // If he had used: PDO::FETCH_ASSOC
    // it would fetch as associative array with key syntax
    // $article['title']
    // $article['content']
    // $article['id']
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}
