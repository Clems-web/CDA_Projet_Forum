<div id="viewContainer">
    <h1>Manga</h1>

    <?php

    use Cleme\Forum\Model\Manager\CommentaryManager;
    use Cleme\Forum\Model\Manager\SubjectManager;
    use Cleme\Forum\Model\Manager\UserManager;

    $tab = (new SubjectManager())->getSubjectByCategorie(4);

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

        if (isset($_SESSION['user'])) {
            echo "<div class='addCommentForm'>
                  <fieldset>
                      <legend>Commenter</legend>
                          <form action='?controller=addComment&subjectId=".$subject->getId()."' method='POST'>
        
                            <textarea name='comment' id='message' cols='30' rows='10'></textarea>
                            <button type='submit'>Envoyer</button>
                            
                          </form>  
                  </fieldset>
              </div>";
        }

    }


    ?>

</div>
