<?php

namespace Cleme\Forum\Model\Manager;

use Cleme\Forum\Model\DB;
use Cleme\Forum\Model\Entity\Commentary;

class CommentaryManager {

    public function getCommentaryBySubjectId(int $subjectId): array {
        $commentaryTab = [];

        $request = DB::getInstance()->prepare("SELECT * FROM commentary WHERE subject_fk = :subjectId");

        $request->bindValue(':subjectId', $subjectId);

        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach ($data as $commentary_data) {
                $commentaryTab[] = new Commentary(
                    $commentary_data['id'],
                    $commentary_data['content'],
                    $commentary_data['subject_fk'],
                    $commentary_data['user_fk']
                );
            }
        }
        return $commentaryTab;
    }


    public function addCommentIntoDB(Commentary $commentary) {
        $request = DB::getInstance()->prepare("
        INSERT INTO commentary(content, subject_fk, user_fk) VALUES (:content, :subject_fk, :user_fk)
        ");

        $request->bindValue(':content', $commentary->getContent());
        $request->bindValue(':subject_fk', $commentary->getSubjectFk());
        $request->bindValue(':user_fk', $commentary->getUserFk());

        $request->execute();

    }

}