<?php
    require_once("db.connect.php");
    $query = "UPDATE `todo` SET status='1' WHERE id ='" . $_GET["id"]."'"; 
    if(mysqli_query($conn, $query)){
?>
    <script>
        window.location.href="index.php";
    </script>
<?php
    }else{
        echo "<script>alert('Something went wrong')</script>";
    }
?>