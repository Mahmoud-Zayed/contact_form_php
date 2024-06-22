

<?php 
    // check if user coming from a request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // assign variables
        $user = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $cellphone = filter_var($_POST["cellphone"], FILTER_SANITIZE_NUMBER_INT);
        $msg = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

        // echo $user . "<br>";
        // echo $mail . "<br>";
        // echo $cellphone . "<br>";
        // echo $msg . "<br>";

        //creating array of errors
        $fromErrors = array();

        if (strlen($user) <= 3) {
            $fromErrors[] = "Username Must Be Larger Than <strong>3</strong> Characters";
        };
        if (strlen($msg) <= 10) {
            $fromErrors[] = "Message Can't Be Less Than <strong>10</strong> Characters";
        };
        if (strlen($cellphone) < 11) {
            $fromErrors[] = "Enter a valid Egyptian phone number <strong>11</strong> Number";
        }
    }
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Contact_App</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        

    <!-- Start Form  -->
    <div class="container">
        <h2 class="text-center pt-4 mt-4">Contact Me</h2>
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <?php if (!empty($fromErrors)) { ?>
                <div class="alert alert-danger alert-dismissible" role="start">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php   
                        foreach($fromErrors as $error) {
                            echo $error . "<br>";
                        }
                    ?>  
                </div> 
            <?php } ?>

            <input class="form-control" type="text" name="username" placeholder="Type Your Username" value="<?php if (isset($user)) { echo $user; } ?>">
            <i class="fa fa-user fa-fw"></i>

            <input class="form-control" type="email" name="email" placeholder="please Type A Valid Email" value="<?php if (isset($mail)) { echo $mail; } ?>">
            <i class="fa fa-envelope fa-fw"></i>

            <input class="form-control" type="text" name="cellphone" placeholder="Type Your Cell Phone"  value="<?php if (isset($cellphone)) { echo $cellphone; } ?>">
            <i class="fa fa-phone fa-fw"></i>

            <textarea class="form-control" name="message" placeholder="Write Your Message"><?php if (isset($msg)) { echo $msg; } ?></textarea>
            <input class="btn btn-success btn-block" type="submit" value="Send Msg">
            <i class="send-icon fa-solid fa-paper-plane fa-fw"></i>

        </form>
        
    </div>
    <!-- End Form  -->

    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>