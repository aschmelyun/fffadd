<?php
    $colors = array();

    if( isset($_GET['colors']) ) {
        $colors = array_filter( explode('/', $_GET['colors']) );
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Palette</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <script type="text/javascript" src="/assets/js/jquery-1.11.3.min.js"></script>
</head>
<body>
    <div id="palette">
        <?php foreach($colors as $color): ?>
            <div class="color" style="background:#<?php echo $color;?>" data-color="<?php echo $color;?>">
                <span>
                    <em><?php echo '#' . $color;?></em>
                    <i>Copied</i>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
    <script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>