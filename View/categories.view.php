<?php

use Cleme\Forum\Model\Entity\Category;
use Cleme\Forum\Model\Manager\CategoryManager;

$manager = new CategoryManager();
$result = $manager->getCategory();


?>
<div id="categoryContainer">
    <?php
    foreach ($result as $part) {
        echo "<div><a href='?controller=".$part->getTitle()."'>".$part->getTitle()."</a></div>";
    }
    ?>
</div>

