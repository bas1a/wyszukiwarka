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
        <h1 class="text-center">Dodaj nowe Wydarzenie</h1>
    </header>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php include 'shared_filter_events.php'; ?>
                <div class="col-sm-6 px-3">
                    <form action="../controllers/event_add_controller.php" method="post">
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Miejsce</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Data</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Opis</label>
                            <textarea name="description" class="form-control" required rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Link do zdjęcia</label>
                            <input type="text" name="image_url" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Typ</label>
                            <select name="type" class="form-control" required>
                                <option value="">Wybierz typ wydarzenia</option>
                                <option value="Koncert">Koncert</option>
                                <option value="Teatr">Teatr</option>
                                <option value="Balet">Balet</option>
                                <option value="Opera">Opera</option>
                                <option value="Kino">Kino</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2 w-100"> Dodaj wydarzenie</button>
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