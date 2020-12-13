<link rel="stylesheet" href="/css/board/index.css">
<link rel="stylesheet" href="/css/authentication/default.css">

<h1 class="item item-title">My projects</h1>

<div class="form">
    <form method="POST">
        <label for="name" required>Project name:</label>
        <input type="text" name="project_name">
        <br><br>
        <label for="name" required>Project description:</label>
        <input type="text" name="project_desc">
        <br><br>
        <div class="formButton">
            <input type="submit" value="Add project">
        </div>
    </form>
</div>

<?php foreach($projectsForUser as $project): ?>
    <a class="item item-select" href="/board/tasks/<?= $project['PK_Project_id'] ?>">
        <ul>
            <li class="title"><?= $project["Project_name"] ?></li>
            <li class="desc"><?= $project["Project_desc"] ?></li>
            
        </ul>
    </a>
    
<?php endforeach; ?>

