<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url('assets/css/list-style.css'); ?>" rel="stylesheet">
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

        <div class="container-list">
            <h3 style="color: #6f6f6f;">Todo-List</h3>
            <form method="post" action="<?php echo site_url('page/sort');?>" style='float:left;'>
                <select name="sort" id="sort" onchange="this.form.submit()" style="width: 80px;">
                    <option selected disabled>Sort</option>
                    <option value="1">Sort Oldest to Newest </option>
                    <option values="0">Sort Newest to Oldest </option>
                </select>&ensp;&ensp;
            </form>
            <form method="post" action="<?php echo site_url('page/getbyStatus');?>" style="margin-right:10px;">
                <select name="status" id="status" onchange="this.form.submit()" style="margin-right:60px;">
                    <option selected disabled>Status</option>
                    <option value="1">Done </option>
                    <option value="0">Undone </option>
                </select>
            </form>
            <form method="post" action="<?php echo site_url('page/getbyDate');?>" >
                <input type="date" name="date" placeholder="Date.."></input>
                <button type="sumbit">Search</button>
            </form>
            <br><br><br>
            <div class="scrollmenu">
                <?php foreach ($result as $hasil) { ?>
                    <div class="list">
                        <?php if($hasil->status == "1"){?>
                            <input type="checkbox" checked disabled>
                        <?php } else if(($hasil->status == "0")) {?>
                            <input type="checkbox" disabled>
                        <?php }?>
                        <span>&nbsp;<a href="<?php echo base_url(); ?>index.php/page/detail?ID=<?php echo $hasil->id_task?>"><?php echo $hasil->title ?></a></span><br>
                        &emsp;&nbsp;&ensp;<span style="color: #6f6f6f;"><?php echo $hasil->date ?></span>

                        &emsp;&emsp;&ensp;&nbsp;&ensp;&ensp;&ensp;
                        <?php if($hasil->status == "0"){?>
                            <a href="<?php echo site_url("page/edit_status/" .$hasil->id_task);?>"><button style="width:120px;">Mark as done</button></a>
                        <?php }else{ ?>
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&ensp;
                        <?php }?>
                                                    
                        <a href="<?php echo base_url(); ?>index.php/page/edit_task?ID=<?php echo $hasil->id_task?>"><button>Edit</button></a>
                        <a href="<?php echo site_url("page/hapus/" .$hasil->id_task);?>"onclick="return confirm('Hapus data?');" ><button>Hapus</button></a> 
                        
                    </div>
                 <?php } ?>
            </div>
            
        </div>  

        <div class="container-left">
            <h1>Todo-List</h1>
        </div>

</body>
</html>