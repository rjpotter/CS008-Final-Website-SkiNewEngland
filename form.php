<?php
include 'top.php';

$dataIsGood = false;
$message = '';

$firstName = '';
$lastName = '';
$email = '';

$Ability = 'Beginner';

$DayOne = false;
$DayTwo = false;
$DayThree = false;
$DayFour = false;
$DayFive = false;
$DaySix = false;
$DaySeven = false;
$DayEight = false;
$DayNine = false;
$DayTen = false;
$DayEleven = false;

function getData($field) {
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    // Check for letters, numbers and dash, period, space and single quote only.
    // added & ; and # as a single quote sanitized with html entities will have
    // this in it bob's will be come bob's
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

?>

    <main class="resortsForm">
        <section class="formheader">
            <h2>Your information will be helpful with our efforts</h2>
            <?php
            if($_SERVER["REQUEST_METHOD"] == 'POST') {
                // Sanitize Data
                $firstName = getData('txtFirstName');
                $lastName = getData('txtLastName');
                $email = getData('txtEmail');

                $radAbility = getData('Ability');

                $DayOne = (int) getData('chkDayOne');
                $DayTwo = (int) getData('chkDayTwo');
                $DayThree = (int) getData('chkDayThree');
                $DayFour = (int) getData('chkDayFour');
                $DayFive = (int) getData('chkDayFive');
                $DaySix = (int) getData('chkDaySix');
                $DaySeven = (int) getData('chkDaySeven');
                $DayEight = (int) getData('chkDayEight');
                $DayNine = (int) getData('chkDayNine');
                $DayTen = (int) getData('chkDayTen');
                $DayEleven = (int) getData('chkDayEleven');

                // validate form
                $dataIsGood = true;

                if($firstName == ""){
                    print '<p class="mistake">Please type in your first name.</p>';
                    $dataIsGood = false;
                }

                if($lastName == ""){
                    print '<p class="mistake">Please type in your last name.</p>';
                    $dataIsGood = false;
                }

                if($email == ""){
                    print '<p class="mistake">Please type in your email address.</p>';
                    $dataIsGood = false;
                } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    print '<p class="mistake">Your email address contains invalid characters.</p>';
                    $dataIsGood = false;
                }

                if ($Ability != "Beginner" and $Ability != "Intermediate" and $Ability != "Advanced" and $Ability != "Expert") {
                    print '<p class="mistake">Please select yourr favorite season.</p>';
                    $dataIsGood = false;
                }

                $totalChecked = 0;

                if($DayOne != 1) $DayOne = 0;
                $totalChecked += $DayOne;

                if($DayTwo != 1) $DayTwo = 0;
                $totalChecked += $DayTwo;

                if($DayThree != 1) $DayThree = 0;
                $totalChecked += $DayThree;

                if($DayFour != 1) $DayFour = 0;
                $totalChecked += $DayFour;

                if($DayFive != 1) $DayFive = 0;
                $totalChecked += $DayFive;

                if($DaySix != 1) $DaySix = 0;
                $totalChecked += $DaySix;

                if($DaySeven != 1) $DaySeven = 0;
                $totalChecked += $DaySeven;

                if($DayEight != 1) $DayEight = 0;
                $totalChecked += $DayEight;

                if($DayNine != 1) $DayNine = 0;
                $totalChecked += $DayNine;

                if($DayTen != 1) $DayTen = 0;
                $totalChecked += $DayTen;

                if($DayEleven != 1) $DayEleven = 0;
                $totalChecked += $DayEleven;

                if($totalChecked == 0){
                    print'<p class="mistake">Please choose at least one checkbox that describes you.</p>';
                    $dataIsGood = false;
                }

                // save data
                if($dataIsGood){
                    try{
                        $sql = 'INSERT INTO tblSkiAbility (fldFirstName, fldLastName, fldEmail, fldAbility, fldDayOne, flddayTwo, fldDayThree, fldDayFour, fldDayFive, fldDaySix, fldDaySeven,
                               fldDayEight, fldDayNine, fldDayTen, fldDayEleven)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                        $statement = $pdo->prepare($sql);
                        $data = array($firstName, $lastName, $email, $Ability, $DayOne, $DayTwo, $DayThree, $DayFour, $DayFive, $DaySix, $DaySeven,
                            $DayEight, $DayNine, $DayTen, $DayEleven);

                        if($statement->execute($data)){
                            $message =  '<h2>Thank you</h2>';
                            $message = '<p>Your information was successfully saved.</p>';

                            $to = $email;
                            $from = 'Ryan Potter & Reed Brencher <rjpotter@uvm.edu>';
                            $subject = 'CS 008 New England Ski Database';
                            $mailMessage = '<p style="font: 12pt Comic Sans MS;">Thank you for filling out ';
                            $mailMessage .= 'our form.</p><p>Your info will not be used to establish dominance by';
                            $mailMessage .= 'helping us prove once and for all that we, east coast skiers, are the best in the country.<br>';
                            $mailMessage .= '<span style="color: lightblue;">Ski New England</span></p>';
                            $mailMessage .= $Message;

                            $headers ="MIME-Version: 1.0\r\n";
                            $headers .= "Content-type: text/html; charset=utf-8\r\n";
                            $headers .= "From: " . $from . "\r\n";

                            $mailSent = mail($to, $subject, $mailMessage, $headers);

                            if ($mailSent) {
                                print "<p>A copy of your form has been emailed to you.</p>";
                                print $mailMessage;
                            }

                        } else {
                            $message = '<p>Record was NOT successfully saved.</p>';
                            $dataIsGood = false;
                        }
                    } catch(PDOException $e){
                        $message = '<p>Couldn\'t insert the record, please contact someone</p>';
                        $dataIsGood = false;
                    }
                }
            } // ends form submitted
            ?>

            <form action="#" id="frmFavResort" method="post">
                <fieldset class="txt">
                    <legend>Contact Information</legend>
                    <p>
                        <label for="txtFirstName">First Name:</label>
                        <input type="text" name="txtFirstName" id="txtFirstName" placeholder="Jane">
                    </p>
                    <p>
                        <label for="txtLastName">Last Name:</label>
                        <input type="text" name="txtLastName" id="txtLastName" placeholder="Doe">
                    </p>
                    <p>
                        <label for="txtEmail">Email:</label>
                        <input type="email" name="txtEmail" id="txtEmail" placeholder="name@email.com" value="<?php print $email; ?>" required>
                    </p>
                </fieldset>

                <fieldset class="radio">
                    <legend>Your Skiing Ability</legend>
                    <div>
                        <input type="radio" name="radAbility" value="Beginner" id="radAbilityBeginner" required <?php
                        if($Ability == "Beginner") print 'checked'; ?>>
                        <label for="radAbilityBeginner">Beginner</label>
                    </div>
                    <div>
                        <input type="radio" name="radAbility" value="Intermediate" id="radAbilityIntermediate" required <?php
                        if($Ability == "Intermediate") print 'checked'; ?>>
                        <label for="radAbilityIntermediate">Intermediate</label>
                    </div>
                    <div>
                        <input type="radio" name="radAbility" value="Advanced" id="radAbilityAdvanced" required <?php
                        if($Ability == "Advanced") print 'checked'; ?>>
                        <label for="radAbilityAdvanced">Advanced</label>
                    </div>
                    <div>
                        <input type="radio" name="radAbility" value="Expert" id="radAbilityExpert" required <?php
                        if($Ability == "Expert") print 'checked'; ?>>
                        <label for="radAbilityExpert">Expert</label>
                    </div>
                </fieldset>

                <fieldset class="checkbox">
                    <legend>Goal Number of Days This Season</legend>
                    <p>
                        <input type="checkbox" name="chkDayOne" id="DayOne" value="1" <?php
                        if($DayOne) print 'checked'; ?>>
                        <label for="DayOne">0-9 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDayTwo" id="DayTwo" value="1" <?php
                        if($DayTwo) print 'checked'; ?>>
                        <label for="DayTwo">10-19 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDayThree" id="DayThree" value="1" <?php
                        if($DayThree) print 'checked'; ?>>
                        <label for="DayThree">20-29 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDayFour" id="DayFour" value="1" <?php
                        if($DayFour) print 'checked'; ?>>
                        <label for="DayFour">30-39 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDayFive" id="DayFive" value="1" <?php
                        if($DayFive) print 'checked'; ?>>
                        <label for="DayFive">40-49 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDaySix" id="DaySix" value="1" <?php
                        if($DaySix) print 'checked'; ?>>
                        <label for="DaySix">50-59 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDaySeven" id="DaySeven" value="1" <?php
                        if($DaySeven) print 'checked'; ?>>
                        <label for="DaySeven">60-69 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDayEight" id="DayEight" value="1" <?php
                        if($DayEight) print 'checked'; ?>>
                        <label for="DayEight">70-79 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDayNine" id="DayNine" value="1" <?php
                        if($DayNine) print 'checked'; ?>>
                        <label for="DayNine">80-89 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDayTen" id="DayTen" value="1" <?php
                        if($DayTen) print 'checked'; ?>>
                        <label for="DayTen">90-99 Days</label>
                    </p>
                    <p>
                        <input type="checkbox" name="chkDayEleven" id="DayEleven" value="1" <?php
                        if($DayEleven) print 'checked'; ?>>
                        <label for="DayEleven">100+ Days</label>
                    </p>
                </fieldset>

                <fieldset class="submit">
                    <legend>Submit</legend>
                    <p>
                        <input type="submit" name="btnSubmit">
                    </p>
                </fieldset>
            </form>
        </section>
    </main>

<?php
include 'footer.php';
?>
</html>