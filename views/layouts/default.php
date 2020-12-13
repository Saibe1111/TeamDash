<header>
    <link rel="stylesheet" href="/css/default.css">
    <div class="topnav">
        <a class="active">TeamDash</a>
        <div class="topnav-right">
            <a href="/authentication/register">Register</a>
            <a href="/authentication/login">Login</a>
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
    <p>Teamdash - &copy;2020</p>
</footer>