
<?php
include_once './Post.php';

 /* @author rieau
 */
class Database {

    private $pdo;
    
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=cyrille_posts_db', 'cyrille', 'cyrille');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function createPost(Post $post): bool {
        $stmt = $this->pdo->prepare('INSERT INTO posts(contenu, date) VALUES (:contenu, :date)');
        $stmt->bindValue('contenu', $post->getContenu(), PDO::PARAM_STR);
        $stmt->bindValue('date', $post->getDate(), PDO::PARAM_STR);
        if ($stmt->execute()) {
            $post->setId(intval($this->pdo->lastInsertId()));
            return true;
        }
        return false;
    }

    public function readPost() : array {
        $stmt = $this->pdo->query('SELECT * FROM posts');
        $posts = [];
        while ($ligne = $stmt->fetch()) {
            $post = new Post($ligne['contenu'], $ligne['date'], $ligne['id']);
            $posts[] = $post;
        }
        return $posts;
    }
}
    