<?php
session_start();
// Sprawdzanie, czy są błędy logowania do wyświetlenia
$email_err = $password_err = $login_err = "";

if (isset($_SESSION['login_err'])) {
    $login_err = $_SESSION['login_err'];
    unset($_SESSION['login_err']);
}

if (isset($_SESSION['email_err'])) {
    $email_err = $_SESSION['email_err'];
    unset($_SESSION['email_err']);
}

if (isset($_SESSION['password_err'])) {
    $password_err = $_SESSION['password_err'];
    unset($_SESSION['password_err']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wyszukiwarka kulturalna</title>

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
        <div class="container">
            <div class="row justify-content-center">
                <?php include 'shared_filter_events.php'; ?>
                <div class="col-sm-6 px-3">
                    <h1 class="text-center">Zaloguj się</h1>
                    <div class="card my-5">
                        <div class="card-body">
                            <h3 class="card-title text-center">Formularz logowania</h3>
                            <?php
                            // Wyświetlenie komunikatu o błędzie logowania
                            if (!empty($login_err)) {
                                echo '<div class="alert alert-danger">' . $login_err . '</div>';
                            }
                            ?>

                            <!-- Formularz logowania użytkownika -->
                            <form action="../controllers/user_login_controller.php" method="post">
                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="">
                                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Hasło</label>
                                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="submit" class="btn btn-primary w-100" value="Zaloguj się">
                                </div>
                                <p class="text-center">Nie masz konta? <a href="view_register.php">Zarejestruj się!</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include 'shared_artists.php'; ?>
            </div>
        </div>
    </main>
    <?php include 'shared_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>