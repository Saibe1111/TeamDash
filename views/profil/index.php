<h1>User information</h1>

<a> Username :</a>
<a><?= $userInfo["User_Username"] ?></a>
<br><br>

<a> Lastname & firstname :</a>
<a><?= $userInfo["User_lastname"] ?></a>
<a><?= $userInfo["User_firstname"] ?></a>
<a href="">Modifier</a>
<br><br>

<a> E-mail :</a>
<a><?= $userInfo["User_mail"] ?></a>
<a href="">Modifier</a>
<br><br>

<a href="/profil/delete_user/<?= $userInfo['PK_User_id']?>">Delete my account</a>
<br><br>