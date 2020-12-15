<!-- home view -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TeamDash - My Profile </title>
        <link rel="icon" type="image/png" href="/images/logo.png">

        <!-- import Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- import stylesheet -->
        <link rel="stylesheet" href="/scss/home.css"> 

    </head>
    <body>
        <nav class="navbar navbar-light background">
            <a href="home" class="navbar-brand"> 
            TeamDash
            </a>
            <form class="form-inline">
                <div class=>
                    <a class="b tn btn-sm btn-outline-primary" href="/profile"> Profile </a>
                </div>
                <div>
                    <a class="btn btn-outline-danger" href="/logout"> Logout </a>
                </div>
            </form>
        </nav>
        <div class="container">

            <!-- add new project -->
            <div class="row">
                <form>
                <ul><li>Your information :</li></ul>
                    <!-- username -->
                    <div class="form-group row">
                        <label for="username_input"> Username </label>
                        <input type="text" class="form-control" placeholder='<?= $data["User_Username"] ?>' disabled>
                    </div>

                    <div class="row">
                        <!-- firstname -->
                        <div class="form-group col">
                            <label for="firstname_input"> Firstname </label>
                            <input type="text" class="form-control" placeholder='<?= $data["User_firstname"] ?>' disabled>
                        </div>

                        <!-- lastname -->
                        <div class="form-group col">
                            <label for="lastname_input"> Lastname </label>
                            <input type="text" class="form-control" placeholder='<?= $data["User_lastname"] ?>' disabled>
                        </div>
                    </div>

                    <!-- email -->
                    <div class="form-group row">
                        <label for="mail_input"> Email </label>
                        <input type="text" class="form-control" placeholder='<?= $data["User_mail"] ?>' disabled>
                    </div>

                    <div class="form-footer">
                        <a href="remove" class="btn btn-danger col-12">Delete my account</a>
                    </div>
                </form>
            </div>
 
        </div>
    </body>
</html>
