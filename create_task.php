<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $task = $_POST["task"];
        $query = "INSERT INTO `todo`(task,status) VALUES('{$task}', '0')";
        $sql = mysqli_query($conn, $query);
        if($sql){
            echo "<script>alert('task added to database')</script>";
?>  
        <script>
            window.location.href="index.php";
        </script>

<?php
        }else{
            echo "something went wrong";
        }
    }