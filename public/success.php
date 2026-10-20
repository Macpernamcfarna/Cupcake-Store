<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min (1).css">
    <title>Success</title>
</head>
<body>

    <div style="color: pink;">
        <?php if(isset($_SESSION["create"])){ ?>
            <div class="alert alert-success">
                <?php echo $_SESSION["create"]; unset($_SESSION["create"]); ?>
            </div>
        <?php } ?>
    </div>

</body>
</html>