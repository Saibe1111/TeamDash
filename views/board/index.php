<link rel="stylesheet" href="/css/board/index.css">
<h1 class="item item-title">My projects</h1>

<div  class="item">
    <h1>Add a project</h1>
    <form method="POST">
        <label for="name" required>Project name:</label>
        <input type="text" name="project_name">
        <br>
        <label for="name" required>Project description:</label>
        <input type="text" name="project_desc">
        <br>
        <input type="submit" >
    </form>
</div>
<?php foreach($projectsForUser as $project): ?>
    <a class="item" href="/board/tasks/<?= $project['PK_Project_id'] ?>">
        <ul>
            <li class="title"><?= $project["Project_name"] ?></li>
            <li class="desc"><?= $project["Project_desc"] ?></li>
            
        </ul>
    </a>
    
<?php endforeach; ?>

