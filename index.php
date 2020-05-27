<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="Css.css">
    <link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'>
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>


</head>
<body>


<div class="row d-flex justify-content-center container">
    <div class="col-md-8">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Task Lists</div>
            </div>
            <div class="scroll-area-sm">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                                <?php
                                require 'connect.php';
                                $query = $conn->query("SELECT * FROM `task_list` ORDER BY `task_id` ASC");
                                $count = 1;
                                while($fetch = $query->fetch_array()){
                                    ?>
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-warning"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">
                                                    <div class="custom-checkbox custom-control">
                                                        <?php
                                                        if ($fetch['status'] != "Done")
                                                            echo '<input disabled class="custom-control-input"  id="exampleCustomCheckbox12" type="checkbox">';
                                                        else
                                                            echo '<input disabled checked class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox">';
                                                        ?>

                                                        <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>
                                                </div>
                                                <div class="widget-content-left">

                                                    <div class="widget-heading"><?php echo $fetch['task_list']?><div class="badge badge-danger ml-2">Rejected</div>
                                                    </div>

                                                </div>
                                                <div class="widget-content-right">
                                                    <?php
                                                    if($fetch['status'] != "Done"){
                                                        echo
                                                            '<a href="update.php?task_id='.$fetch['task_id'].'" class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></a>';

                                                    }
                                                    ?>
                                                    <a href="delete.php?task_id=<?php echo $fetch['task_id']?>" class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </a> </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            <div class="d-block text-right card-footer">
                <form method="POST" class="form-inline" action="add_query.php">
                    <input type="text" class="form-control" name="task_list"/>
                    <button class="btn btn-primary form-control" name="add">Add Task</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>