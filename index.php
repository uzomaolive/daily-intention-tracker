<?php 
$file = 'intentions.json';
$today = date('Y-m-d'); // Get today's date

//Read existing intentions from the file
$intentions = [];
if (file_exists($file)) {
    $intentions = json_decode(file_get_contents($file), true) ?? [];

}

$todaysIntention = $intentions[$today] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <meta nae ="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daily Intention Tracker</title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body> 
        <div class="container">
            <h1>🌞 Daily Intention Tracker</h1>
            <?php if ($todaysIntention): ?>
                <p class="today">Today's intention:</p>
                <h3>"<?php echo htmlspecialchars($todaysIntention); ?>"</h3>
                <p>Come back tomorrow to set a new one 💫</p>
            <?php else: ?>
                <form action="save_intention.php" method="POST">
                    <p>What's your intention for today?</p>
                    <textarea name="intention" placeholder="Type your intention here..." required></textarea>
                    <br>
                    <button type="submit">Save Intention</button>
                </form>
                <?php endif; ?>
        </div>
    </body>
</html>