<?php
    $colors = array();

    if( isset($_GET['colors']) ) {
        $colors = array_filter( explode('/', $_GET['colors']) );
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>fffadd</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script type="text/javascript" src="/assets/js/jquery-1.11.3.min.js"></script>
</head>
<body class="palette<?php echo (empty($colors) ? ' palette-empty' : null);?>">
    <?php if( empty($colors) ):?>
        <?php $example = 'http://fffadd.xyz/' .
            sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)) . '/' .
            sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)) . '/' .
            sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)) . '/' .
            sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)) . '/' .
            sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)) . sprintf('%02x', rand(0,255)); ?>
        <div id="intro">
            <h1>fffadd</h1>
            <p>Build your own palette by adding in colors using a url structure. For example:</p>
            <p><a href="<?php echo $example;?>"><?php echo $example;?></a></p>
        </div>
    <?php else:?>
        <div id="palette">
            <?php foreach($colors as $color): ?>
                <?php if( ctype_xdigit($color) && (strlen($color) == 3 || strlen($color) == 6) ): ?>
                    <div class="color" style="background:#<?php echo $color;?>" data-color="<?php echo $color;?>">
                        <span>
                            <em><?php echo '#' . $color;?></em>
                            <i>Copied</i>
                        </span>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif;?>
    <script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>