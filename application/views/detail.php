<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url('assets/css/detail-style.css'); ?>" rel="stylesheet">
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
            <h2><?php echo $task[0]->title?></h2>
            <p><?php echo $task[0]->date?></p>
            <p><?php echo $task[0]->desc?></p>
    
            &emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&nbsp;&nbsp;
            <a href="<?php echo base_url(); ?>index.php/page/edit_task?ID=<?php echo $task[0]->id_task?>"><button>Edit</button></a>&emsp;&nbsp;&emsp;&emsp;&emsp;
            <a href="<?php echo site_url("page/hapus/" .$task[0]->id_task);?>"onclick="return confirm('Hapus data?');"><button>Hapus</button></a>
        </div>  

        <div class="container-left">
            <h1>Todo-List</h1>
        </div>

</body>
</html>