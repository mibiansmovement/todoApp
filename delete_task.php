<?php
    require_once("db.connect.php");
    $query = "DELETE FROM `todo` WHERE id ='" . $_GET["id"]."'";
    if(mysqli_query($conn, $query)){
        echo "<script>alert('Task deleted')</script>";
?>
    <script>
        window.location.href="index.php";
    </script>
<?php
    }else{
        echo "<script>alert('something went wrong')</script>";
    }

    mysqli_close($conn);
?>