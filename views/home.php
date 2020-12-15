<!-- home view -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TeamDash - Home </title>
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
                    <a class="btn btn-sm btn-outline-primary" href="/profile"> Profile </a>
                </div>
                <div>
                    <a class="btn btn-outline-danger" href="/logout"> Logout </a>
                </div>
            </form>
        </nav>
        <div class="container">

            <!-- add new project -->
            <div class="row">
                <div class="col-12">
                    <ul> <li>New Project</li> </ul>
                    <form method="post">
                        <div class="form-group">
                            <label for="input_name"> Name </label>
                            <input type="text" class="form-control" name="project_name" id="input_name" required>
                        </div>
                        <div class="form-group">
                            <label for="input_description"> Description </label>
                            <input type="text" class="form-control" name="project_description" id="input_description" required>
                        </div>
                        <button type="submit" class="btn btn-success"> Submit </button>
                    </form>
                </div>
            </div>

            <!-- separator -->
            <div class="row">
                <div class="col-12">
                    <h3></h3>
                </div>
            </div>

            <!-- user's projects -->
            <div class="row">
                <div class="col-12">
                    <ul> 
                        <li>My Projects</li> 
                    </ul>
                    <div class="row">
                    <!-- generate card for each existing projects -->
                    <?php foreach($user_projects as $project): ?>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $project["Project_name"] ?></h5>
                                <p class="card-text"><?= $project["Project_desc"] ?></p>
                                <a href="/board/<?= $project['PK_Project_id'] ?>" class="btn btn-primary">More</a>
                            </div>
                        </div>                  
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>  
        </div>
    </body>
</html>
