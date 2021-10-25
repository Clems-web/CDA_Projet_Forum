<div id="viewContainer">
    <h1>Anime</h1>

    <?php

    use Cleme\Forum\Model\Manager\CommentaryManager;
    use Cleme\Forum\Model\Manager\SubjectManager;
    use Cleme\Forum\Model\Manager\UserManager;

    $tab = (new SubjectManager())->getSubjectByCategorie(5);

    foreach ($tab as $subject) {
        echo "<div class='subjectContainer'>
                <div class='titleHead'>
                    <h2>".$subject->getTitle()."</h2>
                </div>
                
                <div class='subjectContent'>".$subject->getContent()."</div>
              </div>";

        $commantaryTab = (new CommentaryManager())->getCommentaryBySubjectId($subject->getId());

        foreach ($commantaryTab as $comment) {
            echo "<div class='commentaryContainer'>
                    <div class='titleHead'>
                        <h2>".(new UserManager())->getUserName($comment->getUserfk())."</h2>  
                    </div>
                    <div class='commentContent'>".$comment->getContent()."</div>
                  </div>";
        }
    }


    ?>

</div>

