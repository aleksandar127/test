<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <div>
        <h1><a href='./home'>HOME</a></h1>
        <h1><a href='./registerform'>REGISTER</a></h1>

        <form action='./login' method='post'>
        <input type='text' name='email' placeholder='email'/>
        <input type='text' name='password' placeholder='password'/>
        <button type='submit'>submit</button>
        </form>
        <?php

        if(isset($this->data['msg']))
            echo $this->data['msg'];

        ?>
    </div>
</body>
</html>
