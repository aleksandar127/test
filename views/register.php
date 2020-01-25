<!DOCTYPE html>
<html>
<head>
    <title>register</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <div>
        <h1><a href='./loginform'>LOGIN</a></h1>
        <h1><a href='./home'>HOME</a></h1>

        <form action='./register' method='post'>
            <input type='text' name='name' placeholder='name'/>
            <input type='text' name='email' placeholder='email'/>
            <input type='text' name='password' placeholder='password'/>
            <input type='text' name='re_password' placeholder='re_password'/>
            <button type='submit'>submit</button>
        </form>
        <?php

        if(isset($this->data['msg'])){
            echo '<ul>';
            foreach($this->data['msg'] as $msg)
                echo '<li>'.$msg.'</li>';
            echo '</ul>';    
        }
        ?>
    </div>
</body>
</html>
