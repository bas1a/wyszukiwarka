<?php
// Dołączenie pliku konfiguracyjnego bazy danych oraz klasy Events
require_once '../../config/database.php';
require_once '../models/event.php';

// Tworzenie obiektu bazy danych i nawiązywanie połączenia
$database = new Database();
$db = $database->getConnection();

// Tworzenie obiektu Events
$event = new Events($db);

// Sprawdzenie, czy formularz został przesłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Przypisanie danych z formularza do właściwości obiektu event
    $event->name = $_POST['name'];
    $event->location = $_POST['location'];
    $event->date = $_POST['date'];
    $event->description = $_POST['description'];
    $event->type = $_POST['type'];
    $event->image_url = $_POST['image_url'];

    // Próba dodania wydarzenia
    if ($event->create()) {
        // Przekierowanie na główną stronę z parametrem 'status'
        header("Location: ../../index.php?status=success");
        exit();
    } else {
        // Przekierowanie z parametrem 'status' wskazującym na błąd
        header("Location: ../../index.php?status=error");
        exit();
    }

}
