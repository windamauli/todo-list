<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url('assets/css/main-style.css'); ?>" rel="stylesheet">
    <Title>Todo-List</Title>
</head>
<body>
        <div class="container-right">
            <button onclick="location.href='<?php echo site_url('page/signup')?>'">Sign Up</button>
        </div>

        <div class="container-login">
            <h3>Login here.</h3>
            <form method="post" action="<?php echo base_url('index.php/page/login') ?>">
                <label>Username:</label>
                <input type="text" name="username"></input>
                <label>Password:</label>
                <input type="password" name="password"></input><br><br>
                <button type="submit" name="submit">Login</button><br>
                <div class="link-display">
                    <?php if($this->session->flashdata('yes')){ ?>
                    <span style="color:red;"><?php echo $this->session->flashdata('yes'); ?></span>
                    <?php } ?><br>
                    <span>Doesn't have account? </span><a href="<?php echo site_url('page/signup')?>">Sign Up.</a>
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