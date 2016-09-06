<?php
session_start();
include "db/connections.php";
$book = new User();

$cUser = $book -> userCount();

if($cUser != 0){
    ?>
        <script>
            window.location.href = "signin.php";
        </script>
    <?php
}else{
    ?>
    <script>
        window.location.href = "dashboard.php";
    </script>
<?php
}



?>

