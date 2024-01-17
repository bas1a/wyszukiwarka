<?php
session_start();
// Sprawdzanie, czy użytkownik jest zalogowany
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ) {
    // Przekierowanie na stronę logowania, jeśli użytkownik nie jest zalogowany
    header("location: view_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dodaj wydarzenie</title>

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
                <div class="col-sm-6 px-3">
                    <h1 class="text-center mb-4">Dodaj nowe Wydarzenie</h1>
                    <form action="../controllers/event_add_controller.php" method="post">
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nazwa..." required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" name="location" class="form-control" placeholder="Miejsce" required>
                        </div>

                        <div class="form-group mb-3">
                            <textarea name="description" class="form-control" required rows="10" placeholder="Opis.."></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" name="image_url" class="form-control" placeholder="Link URL do zdjęcia..." required>
                        </div>

                        <div class="form-group mb-3">
                            <select name="type" class="form-control" required>
                                <option value="">Wybierz typ wydarzenia</option>
                                <option value="Koncert">Koncert</option>
                                <option value="Teatr">Teatr</option>
                                <option value="Balet">Balet</option>
                                <option value="Opera">Opera</option>
                                <option value="Kino">Kino</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary my-3 w-100"> Dodaj wydarzenie</button>
                    </form>
                </div>
                <?php include 'shared_artists.php'; ?>
            </div>
        </div>
    </main>

    <footer>
        <?php include 'shared_footer.php'; ?>
    </footer>

</body>

</html>