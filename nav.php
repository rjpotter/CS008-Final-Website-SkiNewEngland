<nav>
    <a class="<?php
    if ($pathParts['filename'] == "index") {
        print 'activePage';
    }
    ?>" href="index.php">Home</a>

    <a class="<?php
    if ($pathParts['filename'] == "mountains") {
        print 'activePage';
    }
    ?>" href="mountains.php">Mountains</a>

    <a class="<?php
    if ($pathParts['filename'] == "webcams") {
        print 'activePage';
    }
    ?>" href="webcams.php">Webcams</a>

    <a class="<?php
    if ($pathParts['filename'] == "form") {
        print 'activePage';
    }
    ?>" href="form.php">Form</a>
</nav>