<?php
session_start();

// Sprawdzenie, czy użytkownik jest zalogowany jako administrator
// Jeśli nie, przekierowuje do strony logowania
//if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'administrator') {
//    header("location: ../views/view_login.php");
//    exit;
//}

// Wczytanie konfiguracji bazy danych i modelu wydarzenia
require_once '../../config/database.php';
require_once '../models/event.php';

// Utworzenie połączenia z bazą danych
$database = new Database();
$db = $database->getConnection();
$event = new Event($db);

// Sprawdzenie, czy ID wydarzenia zostało przekazane i czy nie jest puste
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $id = trim($_GET["id"]);  // Usunięcie zbędnych spacji dla bezpieczeństwa

    // Próba usunięcia wydarzenia
    if ($event->delete($id)) {
        // Logowanie akcji i ustawienie komunikatu o sukcesie
        error_log("Usunięto wydarzenie o ID: $id");
        $_SESSION['success_message'] = "Pomyślnie usnięto wydarzenie.";
        header("location: ../../index.php");
        exit;
    } else {
        // W przypadku błędu, ustawienie komunikatu i przekierowanie
        error_log("Wystąpił błąd podczas usuwania wydarzenia.");
        $_SESSION['error_message'] = "Wystąpił błąd podczas usuwania wydarzenia.";
        header("location: ../../index.php");
        exit;
    }
} else {
    error_log("Nie przekazano ID wydarzenia do usunięcia.");
    exit;
}
