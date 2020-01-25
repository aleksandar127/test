<!DOCTYPE html>
<html>
<head>
    <title>resultscreen</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <div>
        <h1><a href='./loginform'>LOGIN</a></h1>
        <h1><a href='./registerform'>REGISTER</a></h1>
        <h1><a href='./home'>HOME</a></h1>
        <?php

        if($this->data['users']){
            echo '<ol>';
            foreach($this->data['users'] as $user)
                echo '<li>Name: '.$user['name'].'<br>Email: '.$user['email'].'</li><br>';

            echo '</ol>';
        }
        else
            echo 'There is no results!';



        ?>
    </div>
</body>
</html>
