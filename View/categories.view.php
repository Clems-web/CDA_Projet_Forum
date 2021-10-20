<?php

use Cleme\Forum\Model\Entity\Category;
use Cleme\Forum\Model\Manager\CategoryManager;

$result = (new CategoryManager())->getCategory();


?>
<div id="categoryContainer">
    <?php
    foreach ($result as $part) {
        echo "<div><a href='?controller=".$part->getcategoryName()."'>".$part->getcategoryName()."</a></div>";
    }
    ?>
</div>

