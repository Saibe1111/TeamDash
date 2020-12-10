
<h1>Taches pour <?= $test['Name']["Project_name"]?> </h1>

<form method="POST">
    <label for="name">Nom de la tache:</label>
    <input type="text" name="task">
    <input type="submit">
</form>

    <?php foreach($test['Tasks'] as $t): ?>
        <a href="/board/delete_task/<?= $t["PK_Task_id"] ?>"><?= $t["Task_name"] ?></a>
        <br>
        <br>
    <?php endforeach; ?>

<a href="/board/delete_project/<?= $test['id']?>">Supprimer le projet</a>