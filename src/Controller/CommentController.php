<?php

namespace Cleme\Forum\Controller;

use Cleme\Forum\Model\DB;
use Cleme\Forum\Model\Entity\Commentary;
use Cleme\Forum\Model\Manager\CommentaryManager;

class CommentController {

    public function addComment() {
        if (isset($_SESSION['user'], $_POST['comment'], $_GET['subjectId'])) {

            $db = new DB();
            $content = $db->cleanInput($_POST['comment']);

            $comment = new Commentary(
                null,
                $content,
                $_GET['subjectId'],
                $_SESSION['user']->getId()
            );

            (new CommentaryManager())->addCommentIntoDB($comment);

            header('Location: ../index.php?controller=category');
        }
    }
}