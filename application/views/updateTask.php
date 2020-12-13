<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url('assets/css/update-style.css'); ?>" rel="stylesheet">
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
            <h3>Edit your task here.</h3>
            <form method="POST" action="<?php echo base_url();?>index.php/page/proses_edit">
                <input  type="hidden" name="id_task" value="<?php echo $task[0]->id_task?>"></input>
                <input  type="text" name="title" value="<?php echo $task[0]->title?>"></input>
                <input  type="date" name="date" value="<?php echo $task[0]->date?>"></input>
                <textarea rows="8" cols="25" name="desc" value=""><?php echo $task[0]->desc?></textarea>
                <?php if($task[0]->status == '1') {?>
                    <table style="width:100%">
                        <tr>
                            <th><input type="checkbox" name="status" value='0'></input></th>
                            <td style="color: #6f6f6f; text-align:left;" >&emsp; Undone</td>
                        </tr>
                    </table>
                    
                <?php } else {?>
                    <table style="width:100%">
                        <tr>
                            <th><input type="checkbox" name="status" value='1'></input></th>
                            <td style="color: #6f6f6f; text-align:left;">&emsp; Done</td>
                        </tr>
                    </table>
                <?php }?>
                <button type="submit" name="submit">Edit</button>
            </form>
        </div>  

        <div class="container-left">
            <h1>Todo-List</h1>
        </div>

</body>
</html>