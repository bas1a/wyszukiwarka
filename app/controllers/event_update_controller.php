<?php
session_start();
require_once '../../config/database.php';
require_once '../models/event.php';

$database = new Database();
$db = $database->getConnection();
$event = new Event($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Odbierz dane z formularza
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $type = $_POST['type'];

    // Walidacja danych (opcjonalna)

    // Aktualizacja danych w bazie
    if ($event->update($id, $name, $location, $date, $description, $image_url, $type)) {
        // Ustawienie komunikatu o sukcesie
        $_SESSION['success_message'] = "Wydarzenie zostało pomyślnie zaktualizowane.";
    } else {
        // Ustawienie komunikatu o błędzie
        $_SESSION['error_message'] = "Wystąpił błąd podczas aktualizacji wydarzenia.";
    }

    header("location: ../../index.php");
    exit;
}
