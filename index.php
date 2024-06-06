<?php
include 'top.php';
?>
    <main class="home-page">
        <section>
            <div class="homeHeader">
                <h2>History Of Skiing in New England</h2>
            </div>
            <div class="home-info">
                <div class ="cannon-img">
                    <img alt="Cannon Mountain Tram" src="image/cannon-mountain-tram.jpg">
                </div>

                <p>Skiing has long been a popular sport in New England, dating back to about one hundred years ago.
                    Vermont was the first of these northern states to alleviate the effort that came with skiing, uphill travel.
                    The first ski lift was constructed in 1934 at Clinton Gilbert's farm using a moving rope powered by a Model-T Ford engine.
                    This was the first ski lift ever constructed in the United States.
                    After some time, the J-bar lift was created to haul skiers up the mountain in comfort.
                    As skiing started to take off in Vermont, more uphill capacity was needed.
                    The solution to this was the United States' first T-bar at Pico Peak.
                    Up in northern Vermont, Stowe was home to the nation's first ski patrol, established in 1936.
                    It was also at Stowe that the state's first single chairlift was built. It was well over a mile long.
                    But the chairlift in the region was in Gunstock, NH. It was a single person chairlift.
                    From here, the focus of skiing went to improve access for the guests. In 1958, Wildcat Mountain in New Hampshire
                    focused their efforts to build the first gondola.  And Cannon Mountain cleared their first trails in 1933.
                    Among the rise in skiing leisurely, the popularity of ski racing went up as well. The first downhill
                    ski race was held at Mount Moosilauke, New Hampshire. Jumping forward a bit, in 1995, the largest expansion
                    of lift and snow-making in US history occurred at Sugarbush. the mountain's snow-making capabilities were increased
                    by nearly 300% and the country's longest high-speed quad was installed to connect the two separate mountains,
                    stretching over 2 miles. This cost nearly 28 million US dollars.</p>
                <div class ="shawnee-img">
                    <img alt="Then Shawnee Peak, Now Pleasant Mountain" src="image/shawnee-peak.jpg">
                </div>
            </div>

            <section>
                <div class="snowfall">
                    <h2>New England Snowfall</h2>
                    <table class="snowfall-table">
                        <caption>Average 10 Year Snowfall</caption>

                        <tr>
                            <th>City</th>
                            <th>1971-1980</th>
                            <th>1981-1990</th>
                            <th>1991-2000</th>
                            <th>2001-2010</th>
                            <th>2011-2019</th>
                        </tr>
                        <?php
                        $sql = 'SELECT fldCity, fldDateOne, fldDateTwo, fldDateThree, fldDateFour, fldDateFive FROM tblNewEnglandSnowfall';

                        $statement = $pdo->prepare($sql);
                        $statement->execute();

                        $records = $statement->fetchAll();

                        foreach($records as $record){
                            print '<tr>';
                            print '<td>' . $record['fldCity'] . '</td>';
                            print '<td>' . $record['fldDateOne'] . '</td>';
                            print '<td>' . $record['fldDateTwo'] . '</td>';
                            print '<td>' . $record['fldDateThree'] . '</td>';
                            print '<td>' . $record['fldDateFour'] . '</td>';
                            print '<td>' . $record['fldDateFive'] . '</td>';
                            print '</tr>' . PHP_EOL;
                        }
                        ?>
                        <tr>
                            <td colspan="6"><a href="https://www.wunderground.com/cat6/US-Snowfall-1900-2019-Decade-Decade-Look" target="_blank">Source</a></td>
                        </tr>
                    </table>
                </div>
            </section>
        </section>
    </main>
        <?php
        include 'footer.php';
        ?>
</html>