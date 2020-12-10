
<h1>Taches pour <?= $test['Name']["Project_name"]?> </h1>
    <?php foreach($test['Tasks'] as $t): ?>
        <h3 ><?= $t["Task_name"] ?></h3>
        <a></a>
    <?php endforeach; ?>

<a href="/board/delete_project/<?= $test['id']?>">Supprimer le projet</a>