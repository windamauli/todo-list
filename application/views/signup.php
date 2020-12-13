<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url('assets/css/main-style.css'); ?>" rel="stylesheet">
    <Title>Todo-List</Title>
</head>
<body>
        <div class="container-right">
            <button onclick="location.href='<?php echo site_url('page/index')?>'">Login</button>
        </div>

        <div class="container-signup">
            <h3>Sign up here.</h3>
            <form method="POST" action="<?php echo site_url('page/prosesRegis');?>">
                <label>Email:</label>
                <input type="email" name="email"></input>
                <label>Username:</label>
                <input type="text" name="username"></input>
                <label>Password:</label>
                <input type="password" name="password"></input><br><br>
                <button type="submit" name="submit">Sign Up</button><br><br>
                <div class="link-display">
                    <span>Already have account? </span><a href="<?php echo site_url('page/index')?>">Login.</a>
                </div>
            </form>
        </div>  

        <div class="container-left">
            <h1>Todo-List</h1>
        </div>

        <div class="App-footer">
            <p>Put your self at the top of your Todo-List.</p>
        </div>
</body>
</html>