<!-- register view -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> TeamDash - Register  </title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        
        <!-- import stylesheets -->                
        <link rel="stylesheet" href="/scss/authentication.css">

        <!-- import fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet"> 

        <!-- import icons -->
        <script src="https://use.fontawesome.com/79845f4d1d.js"></script> 

        <!-- import scripts -->
        <script type="text/javascript" src="/js/authentication_focus.js"  defer></script>      
        <script type="text/javascript" src="/js/register_error.js"  defer></script> 
    </head>    
    <body>
        <!-- background components -->
        <img id="wave" src="/images/background.png">
        <div class="container">             
            <div class="left-img">
                <img id="img" class="float-left" src="/images/register_img.svg">
            </div>

            <!-- register form -->
            <div class="user-section">
                <form method="post">

                    <!-- form header -->                   
                   <img src="/images/male_avatar.svg">

                    <!-- name input -->   
                    <div class="input-section first">
                        <div class="icon">
                            <i class="fa fa-user" ></i> 
                        </div>
                        <div>
                            <h5> Full Name </h5>
                            <input name="name" class="input" type="text" required>
                        </div>
                    </div>
                        
                    <!-- username input -->
                    <div class="input-section first">
                        <div class="icon">
                            <i class="fa fa-hashtag" ></i> 
                        </div>
                        <div>
                            <h5> Username </h5>
                            <input name="username" class="input" type="text" required>
                        </div>
                    </div>

                    <!-- mail input -->
                    <div class="input-section first">
                        <div class="icon">
                            <i class="fa fa-envelope" ></i> 
                        </div>
                        <div>
                            <h5> Email </h5>
                            <input name="email" class="input" type="email" required>
                        </div>
                    </div>

                    <!-- password input --> 
                    <div class="input-section first">
                        <div class="icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div>
                            <h5> Password </h5>
                            <input name="password" class="input" type="password" required>
                        </div>       
                    </div>

                    <!-- form footer -->
                    <input type="submit" class="btn" value="Register"> 
                    
                 </form>
            </div>
        </div>      
    </body>
</html>