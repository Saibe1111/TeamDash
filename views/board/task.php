
<h1>Taches pour <?= $test['Name']["Project_name"]?> </h1>
    <?php foreach($test['Tasks'] as $t): ?>
        <h3 ><?= $t["Task_name"] ?></h3>
        <a></a>
    <?php endforeach; ?>