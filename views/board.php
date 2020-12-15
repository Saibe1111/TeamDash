<!-- board view -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TeamDash - <?= ucfirst($board_data['name']["Project_name"])?> </title>
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
            <div class="row align-items-center">

                <!-- project's tasks -->
                <div class="card col-6" style="width: 18rem;">
                    <div class="card-header">
                        <?= ucfirst($board_data['name']["Project_name"])?>'s tasks
                    </div>

                    <ul class="list-group list-group-flush">
                        <?php foreach($board_data['task'] as $task): ?>
                            <li class="list-group-item">
                                <?= $task["Task_name"] ?>
                                <a href="/board/dt/<?= $task['PK_Task_id'] ?>/<?= $board_data['id']?>" class="btn btn-danger text-red"> 
                                    Remove 
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="card-footer">
                        <a href="/board/dp/<?= $board_data['id']?>" class="btn btn-danger text-red"> 
                            Remove project named "<?= ucfirst($board_data['name']["Project_name"])?>"
                        </a>
                    </div>
                </div>

                <!-- add task -->
                <div class="col-6">
                    <form method="post">
                        <div class="form-group">
                            <label for="input_task"> New Task </label>
                            <input type="text" class="form-control" name="task" id="input_task" required>
                        </div>
                        <button type="submit" class="btn btn-success"> Submit </button>
                    </form>
                </div>
                
            </div>
        </div>
    </body>
</html>
