<?php
session_unset();
    session_destroy();
    session_start();
    $_SESSION['err']="Logout Successful.";
    ?>
    <a id="link" target="_parent" href="login.php"></a>

<script type="text/javascript">
    document.getElementById('link').click();
</script>
    <?php
    //echo "<script>window.top.location.href = 'login.php'; </script>";
    //header("location:login.php");
 ?>
