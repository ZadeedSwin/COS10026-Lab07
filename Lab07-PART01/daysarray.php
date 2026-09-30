<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Lab 07 - Experimenting with PHP arrays">
    <meta name="keywords" content="PHP, arrays, days">
    <meta name="author" content="Zadeed Haque">
    <title>Days of the Week</title>
</head>
<body>
    <h1>PHP Arrays - Days of the Week</h1>
    <?php
        // Step 1: days of the week in English
        $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        echo "<p>The Days of the week in English are: ", implode(", ", $days), ".</p>";

        // Step 3: reassign the array to the days in French
        $days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
        echo "<p>The Days of the week in French are: ", implode(", ", $days), ".</p>";
    ?>
</body>
</html>
