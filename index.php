<?php
    require_once("db.connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
    <!-- CSS only -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <style>
        h2{
            font-family: 'Rubik', poppins;
        }
        header{
            margin-top: 2em;
        }
        .icons{
            font-size: 18px;
        }
        .fontawe{
            display: inline-block;
            margin-left: 15px;
        }
        .status{
            display: inline-block;
            width: 25%;
        }
        @media screen and (min-width: 500px) {
            .status {
                width: 45%;
            }
        }
    </style>
</head>

<body>
    <header>
        <h4 class="text-center text-red">Todo App with HTML, PHP and Mysql</h4>
    </header>
    <div class="container overflow-x:auto">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        Tasks
                    </th>
                    <th>
                        Date &amp; Time
                    </th>
                    <th>
                        Status &amp; Actions
                    </th>
                </tr>
            </thead>
            <tfoot class="table-dark">
                <tr>
                    <th>
                        Tasks
                    </th>
                    <th>
                        Date &amp; Time
                    </th>
                    <th>
                        Status &amp; Actions
                    </th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                    $query = "SELECT * FROM todo";
                    $result = mysqli_query($conn, $query);
                    $number = mysqli_num_rows($result);

                    if($number > 0){
                        foreach($result as $data){
                ?>
                <tr class="">
                    <td><?php echo $data['task'] ?></td>
                    <td>
                        <?php 
                            $str = $data['date_time'];
                            echo date('g:i A, l - d M Y', strtotime($str))
                        ?>
                    </td>
                    <td>
                        <div class="completed">
                            <div class="status">
                                <?php
                                   if($data['status'] == 0){
                                       echo "<span class='text-danger'>Pending</span>";
                                   }else{
                                       echo "<span class='text-success'>Done</span>";
                                   }
                                ?>
                            </div>
                            <div class="fontawe">
                                <?php
                                   if($data['status'] == 0){
                                       echo "<a href='update_task.php?id={$data['id']}'' class='icons'>
                                       <i class='fas fa-check text-warning'></i>
                                   </a> <a href='delete_task.php?id={$data['id']}' class='icons'>
                                       <i class='fas fa-trash text-danger'></i>
                                   </a>";
                                   }else{
                                       echo "<a href='update_task2.php?id={$data['id']}'' class='icons'>
                                       <i class='fas fa-undo text-warning'></i>
                                   </a> <a href='#' class='icons'>
                                   <i class='fas fa-trash text-danger'></i>
                               </a>";
                                   }}}
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <div class="row">
                <div class="col-8">
                    <input type="text" class="form-control width-80" placeholder="Deploy the app..." name="task" />
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary w-100">Add Task</button>
                </div>
            </div>
        </form>
    </div>

    <?php
        require_once("create_task.php");
    ?>
        

    <footer>
        <!-- JavaScript Bundle -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </footer>
</body>

</html>