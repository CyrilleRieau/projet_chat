
<?php
function myLoader($className) {
  $class = str_replace('\\', '/', $className);
  require($class . '.php');
  }
  spl_autoload_register('myLoader');
  
  use Post;
 /* @author rieau
 */
class Database {
    private $pdo;
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=event_db', 'cyrille', 'mdp');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function postCreate(Post $post): bool {
        $postCreate = $this->pdo->prepare('INSERT INTO post(contenu, date, auteur) VALUES (:contenu, :date, :auteur)');
        $postCreate->bindValue('contenu', $post->getContenu(), PDO::PARAM_STR);
        $postCreate->bindValue('date', $post->getDate() );
        $postCreate->bindValue('auteur', $post->getAuteur(), PDO::PARAM_STR);
        if ($postCreate->execute()) {
            $post->setId(intval($this->pdo->lastInsertId()));
            return true;
        }
        return false;
    }
    public function recupPost() {
        $recupPost = $this->pdo->query('SELECT * FROM post');
        $posts = [];
        while ($ligne = $recupPost->fetch()) {
            $post = new Post($ligne['contenu'], $ligne['date'], $ligne['auteur'], $ligne['id']);
            $posts[] = $post;
        }
        return $posts;
        }
}
    