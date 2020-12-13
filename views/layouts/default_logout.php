<header>
    <link rel="stylesheet" href="/css/default.css">
    <div class="topnav">
        <a class="active">TeamDash</a>
        <a href="/board">Board</a>
        <a href="/profil">Profil</a>
        <div class="topnav-right">
            <a href="/authentication/logout">Logout</a>
        </div>
    </div>
</header>

<main>
    <div class="error">
        <?php foreach($_SESSION['ERROR'] as $e): ?>
            <a><?= $e ?></a>
            <br>
        <?php endforeach; 
        unset($_SESSION['ERROR']);
        ?>
    </div>
    <?= $content ?>
</main>

<footer> 
<hr>
    <p>&copy;2020 - Teamdash</p>
</footer>