<?php
session_start();
require_once '../../config/database.php';
require_once '../models/event.php';

$database = new Database();
$db = $database->getConnection();

$event = new Event($db);
$events = $event->readByType('teatr');
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teatr</title>

    <meta name="description" content="KONCETRY, TEATR, BALET, OPERA" />
    <meta name="keywords" content="wyszukiwarka koncertów, koncerty, wydarzenia kulturalne, teatr, BALET, OPERA" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/styles.css">

</head>

<body>
    <header>
        <?php include 'shared_navbar.php'; ?>
    </header>
    <main>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <?php include 'shared_filter_events.php'; ?>
                <?php include 'shared_event_card.php'; ?>
                <?php include 'shared_artists.php'; ?>
            </div>
        </div>
    </main>
    <?php include 'shared_footer.php'; ?>
</body>

</html>