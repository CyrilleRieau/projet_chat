
<?php
include_once './Post.php';

 /* @author rieau
 */
class Database {

    private $pdo;
    
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=posts_db', 'cyrille', 'mdp');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function postCreate(Post $post): bool {
        $postCreate = $this->pdo->prepare('INSERT INTO posts(contenu, `date`) VALUES (:contenu, :`date`)');
        $postCreate->bindValue('contenu', $post->getContenu(), PDO::PARAM_STR);
        $postCreate->bindValue('date', $post->getDate()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        if ($postCreate->execute()) {
            $post->setId(intval($this->pdo->lastInsertId()));
            return true;
        }
        return false;
    }

    public function recupPost() {
        $recupPost = $this->pdo->query('SELECT * FROM posts');
        $posts = [];
        while ($ligne = $recupPost->fetch()) {
            $post = new Post($ligne['contenu'], $ligne['date'], $ligne['id']);
            $posts[] = $post;
        }
        return $posts;
        }
}
    