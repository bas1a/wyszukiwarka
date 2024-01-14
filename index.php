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
        <h1 class="text-center">Wyszukiwarka koncertów i wydarzeń</h1>
    </header>
    <main>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <?php include 'app/views/shared_filter_events.php'; ?>
                <div class="col-sm-6 p-3">
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
                        <div class="alert alert-success" role="alert">
                            Wydarzenie zostało pomyślnie dodane!
                        </div>
                    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error') : ?>
                        <div class="alert alert-danger" role="alert">
                            Wystąpił błąd podczas dodawania wydarzenia.
                        </div>
                    <?php endif; ?>

                    <h4 class="text-center"> Odkryj serce kultury! &hearts; Zanurz się w bogactwie wydarzeń artystycznych!</h4>
                    <br>
                    <form action="app/controllers/event_search_controller.php" method="get">
                        <div class="row align-items-center">
                            <div class="col-sm-8">
                                <input type="text" class="form-control mt-2" id="search" name="search" placeholder="Wpisz szukaną frazę">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary w-100 mt-2">Szukaj</button>
                            </div>
                        </div>
                    </form>
                    <article class="p-4"> Wydarzenia kulturalne w Polsce obejmują szeroki wachlarz działań, odzwierciedlających bogatą i różnorodną kulturę kraju. W całym kraju odbywają się liczne festiwale muzyczne, które często koncentrują się na konkretnych gatunkach, od jazzu po muzykę elektroniczną, przyciągając zarówno lokalnych, jak i międzynarodowych artystów. Polskie muzea i galerie regularnie organizują wystawy sztuki, prezentując zarówno dzieła współczesne, jak i klasyczne. Teatry i opery oferują bogaty repertuar, od tradycyjnych do nowoczesnych produkcji, podobnie jak festiwale filmowe, które są platformą dla młodych i niezależnych twórców. Wydarzenia literackie, takie jak festiwale książki, promują czytelnictwo, oferując spotkania z autorami i dyskusje panelowe. Tradycyjne polskie rzemiosło i sztuka ludowa są prezentowane na targach i rynkach, gdzie można nabyć unikalne przedmioty. Festiwale historyczne i folklorystyczne celebrują bogatą historię Polski i regionalne tradycje. Koncerty i recitale, od kameralnych występów po duże imprezy na otwartym powietrzu, prezentują różnorodność muzyczną. Festiwale kulinarne z kolei promują polską kuchnię regionalną i międzynarodową. Istnieją również wydarzenia interaktywne i edukacyjne, takie jak warsztaty i kursy, które promują naukę i rozwój osobisty w dziedzinie kultury. Każde z tych wydarzeń oferuje unikalne doświadczenia, umożliwiając zarówno mieszkańcom, jak i odwiedzającym zgłębienie bogactwa kultury i dziedzictwa Polski. </article>
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

</body>

</html>