<link rel="stylesheet" href="/css/board/index.css">
<h1 class="item item-title">Mes projets</h1>

<div  class="item">
    <h1>Ajouter un projet</h1>
    <form method="POST">
        <label for="name">Nom du projet:</label>
        <input type="text" name="project_name">
        <br>
        <label for="name">Description:</label>
        <input type="text" name="project_desc">
        <br>
        <input type="submit">
    </form>
</div>
<?php foreach($test as $t): ?>
    <a class="item" href="/board/tasks/<?= $t['PK_Project_id'] ?>">
        <ul>
            <li class="title"><?= $t["Project_name"] ?></li>
            <li class="desc"><?= $t["Project_desc"] ?></li>
            
        </ul>
    </a>
    
<?php endforeach; ?>

