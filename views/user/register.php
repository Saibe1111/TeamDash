<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> TeamDash - Register  </title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        
        <!-- import stylesheets -->                
        <link rel="stylesheet" href="/scss/login_register.css">

        <!-- import fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet"> 

        <!-- import icons -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> 

        <!-- import scripts -->
        <script type="text/javascript" src="/js/login_focus.js"  defer></script>      
        <script type="text/javascript" src="/js/login_error.js"  defer></script> 
    </head>    
    <body>
        <!-- background components -->
        <img id="wave" src="/images/wave.png">
        <div class="container">             
            <div class="left-img">
                <img id="img" class="float-left" src="/images/register_img.svg">
            </div>
            <!-- register form -->
            <div class="user-section">
                <form action="register.php">
                    <!-- form header -->                   
                   <img src="/images/male_avatar.svg">

                    <!-- name input -->   
                    <div class="input-section first">
                        <div class="icon">
                            <i class="fa fa-user" ></i> 
                        </div>
                        <div>
                            <h5> Name </h5>
                            <input class="input" type="text" required>
                        </div>
                    </div>
                        
                    <!-- username input -->
                    <div class="input-section first">
                        <div class="icon">
                            <i class="fa fa-user" ></i> 
                        </div>
                        <div>
                            <h5> Username </h5>
                            <input class="input" type="text" required>
                        </div>
                    </div>

                    <!-- mail input -->
                    <div class="input-section first">
                        <div class="icon">
                            <i class="fa fa-user" ></i> 
                        </div>
                        <div>
                            <h5> Email </h5>
                            <input class="input" type="email" required>
                        </div>
                    </div>

                    <!-- password input --> 
                    <div class="input-section first">
                        <div class="icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div>
                            <h5> Password </h5>
                            <input class="input" type="password" required>
                        </div>       
                    </div>

                    <!-- form footer -->
                    <input type="submit" class="btn" value="Register"> 
                 </form>
            </div>
        </div>      
    </body>
</html>
