<?php

namespace Cleme\Forum\Model\Manager;
use Cleme\Forum\Model\DB;
use Cleme\Forum\Model\Entity\Category;

class CategoryManager {

    // Get all Category
    public function getCategory() {

        $category = [];
        $request = DB::getInstance()->prepare("SELECT * FROM category");
        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach($data as $category_data) {
                $category[] = new Category($category_data['id'], $category_data['categoryName']);
            }
        }
        return $category;
    }
}