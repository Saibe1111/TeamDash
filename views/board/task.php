
<h1>Task for <?= $test['Name']["Project_name"]?> </h1>

<form method="POST">
    <label for="name">Task Name:</label>
    <input type="text" name="task">
    <input type="submit">
</form>

    <?php foreach($test['Tasks'] as $t): ?>
        <a><?= $t["Task_name"] ?></a>
        <a href="/board/delete_task/<?= $t["PK_Task_id"] ?>/<?= $test['id']?>">Remove</a>
        <br>
        <br>
    <?php endforeach; ?>

<a href="/board/delete_project/<?= $test['id']?>">Remove project</a>