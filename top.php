<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ski New England</title>
    <link rel="icon" type="image/x-icon" href="image/NE-favicon.png">
    <meta name="author" content="Ryan Potter">
    <meta name="author" content="Reed Brencher">
    <meta name="description" content="A look at some of New England's favorite ski resorts, in states such as Connecticut,
        New Hampshire, Maine, Massachusetts, and Vermont.">
    <link rel="stylesheet" href="css/custom-potter.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" href="css/custom-brencher.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" media=" (max-width: 800px)" href="css/custom-tablet.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" media=" (max-width: 600px)" href="css/custom-phone.css?version=<?php print time(); ?>" type="text/css">

    <!-- note to self. Get character count and make smaller?-->

</head>
    <?php
    print '<body class="' . $pathParts['filename']. '">';
    print '<!-- ################       Start of Body Element ####################### -->';
    include 'connect-DB.php';
    print PHP_EOL;
    include 'header.php';
    print PHP_EOL;
    ?>

