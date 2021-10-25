<?php

namespace Cleme\Forum\Model\Manager;

use Cleme\Forum\Model\DB;
use Cleme\Forum\Model\Entity\Subject;

class SubjectManager
{

    public function getSubjectByCategorie(int $categoryId): array {
        $subjectTab = [];

        $request = DB::getInstance()->prepare("
        SELECT * FROM subject WHERE categorie_fk = :categoryId
        ");

        $request->bindParam(':categoryId', $categoryId);

        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach ($data as $subject_data) {
                $subjectTab[] = new Subject(
                    $subject_data['id'],
                    $subject_data['title'],
                    $subject_data['content'],
                    $subject_data['categorie_fk']
                );
            }
        }
        return $subjectTab;
    }
}