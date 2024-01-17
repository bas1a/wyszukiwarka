<nav class="navbar navbar-expand-lg  bg-light fixed-top">
    <div class="container-fluid">
        <a class="btn btn-warning m-1 mx-3" href="/wyszukiwarka/index.php"><i class="bi bi-house-door"></i> Wyszukiwarka</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) : ?>
                    <li class="nav-item">
                        <a class="btn btn-primary m-1 mx-3" href="/wyszukiwarka/app/views/view_login.php"><i class="bi bi-person-check"></i> Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success m-1 mx-3" href="/wyszukiwarka/app/views/view_register.php"><i class="bi bi-person-add"></i> Zarejestruj się, aby dodać nowe wydarzenie!</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="/wyszukiwarka/app/views/view_add_event.php" class="btn btn-success m-1"><i class="bi bi-plus-square"></i> Dodaj nowe wydarzenie</a>
                    </li>
                <?php endif; ?>
            </ul>
            <span class="nav-item m-1">
                <?php
                // Sprawdzenie czy użytkownik jest zalogowany
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                    // Przypisanie zmiennej $firstName wartości z sesji lub domyślnej wartości
                    $firstName = $_SESSION['first_name'] ?? 'Gość';
                    $role = $_SESSION['role'] ?? 'nieokreślona rola';

                    // Tłumaczenie roli na język polski
                    switch ($role) {
                        case 'administrator':
                            $translatedRole = 'Administrator';
                            break;
                        case 'guest':
                            $translatedRole = 'Gość';
                            break;
                        default:
                            $translatedRole = 'nieokreślona rola';
                    }

                    // Wyświetlenie powitania
                    echo "Witaj <strong>" . htmlspecialchars($firstName) . "</strong>! Jesteś zalogowany/a jako <strong>" . htmlspecialchars($translatedRole) . "</strong>.";
                }
                ?>
            </span>
            <span class="nav-item m-1">
                <?php
                // Wyświetlenie przycisku wylogowania jeśli użytkownik jest zalogowany
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                    echo '<a class="btn btn-dark m-1" href="/wyszukiwarka/app/controllers/user_logout_controller.php">Wyloguj się</a>';
                }
                ?>
            </span>
        </div>
    </div>
</nav>