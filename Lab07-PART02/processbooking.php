<?php
    // Only process the page if it was reached by submitting the form.
    // If someone opens this page directly, send them back to the form.
    // (This must come before any HTML is output, or header() will fail.)
    if (!isset($_POST["firstname"])) {
        header("location: register.html");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Rohirrim Tour booking confirmation">
    <meta name="keywords" content="PHP, form, booking">
    <meta name="author" content="Zadeed Haque">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
    <?php
        // Clean a value before echoing it back (stops HTML/script injection)
        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Text fields - use isset() to check each value was sent
        $firstname = sanitise_input($_POST["firstname"]);
        $lastname  = isset($_POST["lastname"])  ? sanitise_input($_POST["lastname"])  : "";
        $age       = isset($_POST["age"])       ? sanitise_input($_POST["age"])       : "";
        $food      = isset($_POST["food"])      ? sanitise_input($_POST["food"])      : "none";
        $bookday   = isset($_POST["bookday"])   ? sanitise_input($_POST["bookday"])   : "";
        $partysize = isset($_POST["partysize"]) ? sanitise_input($_POST["partysize"]) : "";

        // Species radio buttons send a code (M, D, E, H) - turn it into a word
        $species = "Unknown species";
        if (isset($_POST["species"])) {
            switch ($_POST["species"]) {
                case "M": $species = "Human";  break;
                case "D": $species = "Dwarf";  break;
                case "E": $species = "Elf";    break;
                case "H": $species = "Hobbit"; break;
            }
        }

        // Checkboxes are only sent when ticked, so check each with isset()
        $tour = "";
        if (isset($_POST["accom"])) { $tour .= "Accommodation, "; }
        if (isset($_POST["4day"]))  { $tour .= "4 Day Tour, "; }
        if (isset($_POST["10day"])) { $tour .= "10 Day Tour, "; }
        if ($tour == "") {
            $tour = "nothing selected";
        } else {
            $tour = rtrim($tour, ", ");   // remove the trailing comma
        }

        // Echo the values back as a confirmation
        echo "<p>Welcome $firstname $lastname!<br>";
        echo "You are booked for: $tour<br>";
        echo "Species: $species<br>";
        echo "Age: $age<br>";
        echo "Meal preference: $food<br>";
        echo "Booking date: $bookday<br>";
        echo "Number of travellers: $partysize</p>";
    ?>
</body>
</html>
