<link rel="stylesheet" href="/css/board/index.css">
<h1 class="item item-title">Mes projets</h1>
<?php foreach($test as $t): ?>
    <a class="item" href="/board/tasks/<?= $t['PK_Project_id'] ?>">
        <ul>
            <li class="title"><?= $t["Project_name"] ?></li>
            <li class="desc"><?= $t["Project_desc"] ?></li>
        </ul>
    </a>
<?php endforeach; ?>

