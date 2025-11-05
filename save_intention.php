<?php
$file = 'inetentions.json';
$today = date('Y-m-d'); // Get today's date

//Read existing intentions
$inetentions = [];
if (file_exists($file)) {
    $inetentions =json_decode(file_get_contents($file), true) ?? [];

}

// Save new intention
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $intention = trim($_POST['intention']);
    if ($intention !== '') {
        $intentions[$today] = $intention;
        file_put_contents($file, json_encode($intentions, JSON_PRETTY_PRINT));
    }
}

//Redirect to the main page
header('Location: index.php');
exit;