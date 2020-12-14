<link rel="stylesheet" href="/css/board/index.css">
<link rel="stylesheet" href="/css/authentication/default.css">

<h1 class="item item-title">User information</h1>

<div class="item">
<a class="title"> Username :</a>
<br><br>
<a><?= $userInfo["User_Username"] ?></a>
<br><br>

<a class="title">Lastname & firstname :</a>
<br><br>
<a><?= $userInfo["User_lastname"] ?></a>
<a><?= $userInfo["User_firstname"] ?></a>
<br><br>

<a class="title"> E-mail :</a>
<br><br>
<a><?= $userInfo["User_mail"] ?></a>
<br><br>

</div>

<div>
    <a class="item delete-project" href="/profil/delete_user/<?= $userInfo['PK_User_id']?>">Delete my account</a>
</div>