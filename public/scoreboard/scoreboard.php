
<?php include("sb_topp.php");?>

<?php
$content = file('scoreboard_database.txt');
echo '<ol>';
foreach ($content as $line) {
    echo ('<li>' . $line . '</li>');
}
echo '</ol>';
?>

<?php include("sb_bunn.php");?>
