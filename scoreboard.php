
<?php include("sb_topp.php");?>

<?php
// JOHANSEN DATA SYSTEMS @ 2022 | SCOREBOARD V2
$content = file('scoreboard_database.txt');
echo '<ol>';
foreach ($content as $line) {
    echo ('<li>' . $line . '</li>');
}
echo '</ol>';
?>

<?php include("sb_bunn.php");?>
