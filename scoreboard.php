<?php
//JOHANSEN DATA @ 2022 | SCOREBOARD SYSTEM
$content = file('scoreboard_database.txt');
echo '<ol>';
foreach ($content as $line) {
    echo ('<li>' . $line . '</li>');
}
echo '</ol>';
?>
