<?php
include 'top.php';
?>
<main>
    <h1>SQL</h1>
    <h2>Create table 1</h2>
    <pre>
    CREATE TABLE tblNewEnglandSnowfall(
        pmkNewEnglandSnowfall INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        fldCity VARCHAR(10),
        fldDateOne VARCHAR(10),
        fldDateTwo VARCHAR(10),
        fldDateThree VARCHAR(10),
        fldDateFour VARCHAR(10),
        fldDateFive VARCHAR(10)
     )
    </pre>

    <h2>Insert Data 1</h2>
    <pre>
    INSERT INTO tblNewEnglandSnowfall (fldCity, fldDateOne, fldDateTwo, fldDateThree, fldDateFour, fldDateFive) VALUES
    ('Portland, ME', '75.0"', '58.5"', '59.1"', '66.7"', '78.2"'),
    ('Burlington, VT', '92.2"', '71.6"', '88.4"', '91.9"', '82.7"'),
    ('Albany, NY', '69.4"', '62.0"', '60.3"', '60.6"', '88.0"'),
    ('Boston, MA', '41.0"', '35.4"', '48.2"', '46.8"', '54.9"'),
    ('New York City', '21.3"', '19.7"', '24.7"', '31.5"', '36.4"')
    </pre>

    <h2>Select records 1</h2>
    <pre>
    SELECT fldCity, fldDateOne, fldDateTwo, fldDateThree, fldDateFour, fldDateFive FROM tblNewEnglandSnowfall
    </pre>

    <h1>SQL</h1>
    <h2>Create table 2</h2>
    <pre>
    CREATE TABLE tblSkiAbility(
        pmkSkiAbility INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        fldFirstName VARCHAR(30),
        fldLastname VARCHAR(30),
        fldEmail VARCHAR(30),
        fldAbility VARCHAR(30),
        fldDayOne VARCHAR(30),
        fldDayTwo VARCHAR(30),
        fldDayThree VARCHAR(30),
        fldDayFour VARCHAR(30),
        fldDayFive VARCHAR(30),
        fldDaySix VARCHAR(30),
        fldDaySeven VARCHAR(30),
        fldDayEight VARCHAR(30),
        fldDayNine VARCHAR(30),
        fldDayTen VARCHAR(30),
        fldDayEleven VARCHAR(30)
     )
    </pre>


</main>
<?php
include 'footer.php';
?>
</body>
</html>
