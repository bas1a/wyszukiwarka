<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wyszukiwarka kulturalna</title>

    <meta name="description" content="KONCETRY, TEATR, BALET, OPERA" />
    <meta name="keywords" content="wyszukiwarka koncertów, koncerty, wydarzenia kulturalne, teatr, BALET, OPERA" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">

</head>

<body>
    <header>
        <?php include 'app/views/shared_navbar.php'; ?>
    </header>
    <main>
        <div class="container">
            <div class="row justify-content-center mt-3">
                <?php include 'app/views/shared_filter_events.php'; ?>
                <div class="col-sm-6 p-3">
                    <h1 class="text-center">Wyszukiwarka koncertów i wydarzeń</h1>
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
                        <div class="alert alert-success" role="alert">
                            Wydarzenie zostało pomyślnie dodane!
                        </div>
                    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error') : ?>
                        <div class="alert alert-danger" role="alert">
                            Wystąpił błąd podczas dodawania wydarzenia.
                        </div>
                    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'login_success') : ?>
                        <div class="alert alert-success" role="alert">
                            Pomyślnie zalogowano!
                        </div>
                    <?php endif; ?>

                    <?php
                    if (isset($_SESSION['error_message'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                        // Usunięcie komunikatu po wyświetleniu
                        unset($_SESSION['error_message']);
                    }
                    if (isset($_SESSION['success_message'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                        // Usunięcie komunikatu po wyświetleniu
                        unset($_SESSION['success_message']);
                    }
                    ?>

                    <h4 class="text-center"> Odkryj serce kultury! &hearts; Zanurz się w bogactwie wydarzeń artystycznych!</h4>
                    <br>
                    <form action="index.php" method="get">
                        <div class="row align-items-center">
                            <div class="col-sm-8">
                                <input type="text" class="form-control mt-2" id="search" name="search" placeholder="Wpisz szukaną frazę">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary w-100 mt-2">Szukaj</button>
                            </div>
                        </div>
                    </form>

                    <!-- Wyniki wyszukiwania -->
                    <?php
                    require_once 'config/database.php';
                    require_once 'app/models/event.php';

                    if (isset($_GET['search'])) {
                        $searchTerm = trim($_GET['search']);
                        if (empty($searchTerm)) {
                            echo '<div class="alert alert-warning my-3" role="alert">Wpisz szukaną frazę.</div>';
                        } else {
                            require_once 'config/database.php';
                            require_once 'app/models/event.php';

                            $database = new Database();
                            $db = $database->getConnection();

                            $event = new Event($db);

                            $results = $event->search($searchTerm);

                            if ($results->rowCount() > 0) {
                                while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['id'];
                                    echo '<div class="card my-4">';
                                    echo '<div class="row g-0">';
                                    echo '<div class="col-md-4">';
                                    if (!empty($row['image_url'])) {
                                        echo '<img src="' . htmlspecialchars($row['image_url']) . '" class="img-fluid rounded-start" alt="Zdjęcie wydarzenia">';
                                    }
                                    echo '</div>';
                                    echo '<div class="col-md-8">';
                                    echo '<div class="card-body">';
                                    echo '<h4 class="card-title">' . htmlspecialchars_decode($row['name']) . '</h4>';
                                    echo '<h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($row['date']) . '</h6>';
                                    echo '<p class="card-text">' . htmlspecialchars_decode($row['description']) . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="card-footer">';
                                    echo 'Wydarzenie dodane przez: ' . htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']) . '</p>';
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'administrator') :
                                        echo "<a href='app/views/view_update_event.php?id=" . $row['id'] . "' class='btn btn-warning m-1'>Edytuj</a>";
                                        echo "<a href='#' data-id='{$row['id']}' class='btn btn-danger delete-btn'>Usuń</a>";
                                    endif;
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="alert alert-warning my-3" role="alert">Nie znaleziono wydarzeń.</div>';
                            }
                        }
                    } else {

                        // Artykuł wyświetla się tylko wtedy, gdy nie ma wyników wyszukiwania.

                        echo '<article class="p-4"> Wydarzenia kulturalne w Polsce obejmują szeroki wachlarz działań, odzwierciedlających bogatą i różnorodną kulturę kraju. W całym kraju odbywają się liczne festiwale muzyczne, które często koncentrują się na konkretnych gatunkach, od jazzu po muzykę elektroniczną, przyciągając zarówno lokalnych, jak i międzynarodowych artystów. Polskie muzea i galerie regularnie organizują wystawy sztuki, prezentując zarówno dzieła współczesne, jak i klasyczne. Teatry i opery oferują bogaty repertuar, od tradycyjnych do nowoczesnych produkcji, podobnie jak festiwale filmowe, które są platformą dla młodych i niezależnych twórców. Wydarzenia literackie, takie jak festiwale książki, promują czytelnictwo, oferując spotkania z autorami i dyskusje panelowe. Tradycyjne polskie rzemiosło i sztuka ludowa są prezentowane na targach i rynkach, gdzie można nabyć unikalne przedmioty. Festiwale historyczne i folklorystyczne celebrują bogatą historię Polski i regionalne tradycje. Koncerty i recitale, od kameralnych występów po duże imprezy na otwartym powietrzu, prezentują różnorodność muzyczną. Festiwale kulinarne z kolei promują polską kuchnię regionalną i międzynarodową. Istnieją również wydarzenia interaktywne i edukacyjne, takie jak warsztaty i kursy, które promują naukę i rozwój osobisty w dziedzinie kultury. Każde z tych wydarzeń oferuje unikalne doświadczenia, umożliwiając zarówno mieszkańcom, jak i odwiedzającym zgłębienie bogactwa kultury i dziedzictwa Polski. </article>';
                    }
                    ?>
                </div>

                <?php include 'app/views/shared_artists.php'; ?>
            </div>
        </div>
    </main>
    <?php include 'app/views/shared_footer.php'; ?>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href.split('?')[0]);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js" integrity="sha256-IW9RTty6djbi3+dyypxajC14pE6ZrP53DLfY9w40Xn4=" crossorigin="anonymous"></script>

    <script>
        // Zapytanie potwierdzające usunięcie wydarzenia
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const eventId = this.getAttribute('data-id');

                // Wyświetlenie okna dialogowego pytającego o potwierdzenie usunięcia
                Swal.fire({
                    title: "Jesteś pewien?",
                    text: "Tej operacji nie można cofnąć.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Tak, usuń wydarzenie",
                    cancelButtonText: "Anuluj"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'app/controllers/event_delete_controller.php?id=' + eventId;
                    }
                });
            });
        });
    </script>
</body>

</html>