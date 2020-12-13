<link rel="stylesheet" href="/css/board/index.css">
<link rel="stylesheet" href="/css/authentication/default.css">

<h1 class="item item-title">Task for <?= $test['Name']["Project_name"]?> </h1>

<div class="form formTask">
    <form method="POST">
        <label for="name">Task Name:</label><br>
        <input type="text" name="task">
        <br><br>
        <input type="submit" value="Add task">
    </form>
</div>


    <?php foreach($test['Tasks'] as $t): ?>
        <div class="item">
            <a><?= $t["Task_name"] ?></a>
            <br><br>
                <div class="item-task">
                    <a href="/board/delete_task/<?= $t["PK_Task_id"] ?>/<?= $test['id']?>">Remove</a>
                </div>
        </div>
    <?php endforeach; ?>

<div>
    <a class="item delete-project" href="/board/delete_project/<?= $test['id']?>">Remove project</a>
</div>