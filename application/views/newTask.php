<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url('assets/css/newtask-style.css'); ?>" rel="stylesheet">
    <Title>Todo-List</Title>
</head>
<body>
        <div class="container-right">
            <span>
                <button onclick="location.href='<?php echo site_url('page/logout')?>'">Log Out</button><br>
                <a href="<?php echo site_url('page/add')?>">+ New Task</a>
                <a href="<?php echo site_url('page/home')?>">My Todo-List</a>
            </span>
        </div>

        <div class="container-task">
            <h3>Add your new task here.</h3>
            <form method="POST" action="<?php echo site_url('page/addTask');?>">
                <input  type="text" name="title" placeholder="Title"></input>
                <input  type="date" name="date" placeholder="Date"></input>
                <textarea rows="8" cols="25" id="TITLE" placeholder="Give the tas some description..." name="desc"></textarea><br><br>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>  

        <div class="container-left">
            <h1>Todo-List</h1>
        </div>

</body>
</html>