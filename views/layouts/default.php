<header>
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/board/index.css">
    <div class="topnav">
        <a class="active">TeamDash</a>
        <?php if(isset($_SESSION['user']['id'])): ?>

            <a href="/board">Board</a>
            <a href="/profil">Profil</a>
            <div class="topnav-right">
                <a href="/authentication/logout">Logout</a>
            </div>
            
        <?php else: ?>

            <div class="topnav-right">
                <a href="/authentication/register">Register</a>
                <a href="/authentication/login">Login</a>
            </div>

        <?php endif ?>
        
    </div>
</header>

<main>
    <div class="error">
        <?php if (isset($_SESSION['Flash']['ERROR'])): ?>
            <?php foreach($_SESSION['Flash']['ERROR'] as $e): ?>
                <a><?= $e ?></a>
            <?php endforeach; 
            unset($_SESSION['Flash']['ERROR']);
            ?>
        <?php endif ?>
    </div>

    <div class="success">
        <?php if (isset($_SESSION['Flash']['SUCCESS'])): ?>
            <?php foreach($_SESSION['Flash']['SUCCESS'] as $s): ?>
                <a><?= $s ?></a>
            <?php endforeach; 
            unset($_SESSION['Flash']['SUCCESS']);
            ?>
        <?php endif ?>
    </div>

    <?= $content ?>
    
</main>

<footer> 
<hr>
    <p>Teamdash - &copy;2020</p>
</footer>

