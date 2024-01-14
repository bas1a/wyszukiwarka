<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wyszukiwarka kulturalna</title>

    <meta name="description" content="KONCETRY, TEATR, BALET, OPERA" /> <!-- możesz wydłużyć ten opis -->
    <meta name="keywords" content="wyszukiwarka koncertów, koncerty, wydarzenia kulturalne, teatr, BALET, OPERA" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">

</head>

<body>
    <div class="container mt-4">
        <header>
            <h1 class="text-center">Wyszukiwarka koncertów i wydarzeń</h1>
            <div class="icons">
                <a href="app/views/balets_view.php" class="btn btn-light m-3">Profil użytkownika</a>
                <a href="app/views/concerts_view.php" class="btn"><i class="bi bi-music-note-beamed"></i></a>
                <a href="app/views/cinemas_view.php" class="btn"><i class="bi bi-film"></i></a>
                <a href="app/views/operas_view.php" class="btn"><i class="bi bi-gem"></i></a>
                <a href="app/views/theatres_view.php" class="btn"><i class="bi bi-tv"></i></i>
                </a>
                <a href="app/views/balets_view.php" class="btn"><i class="bi bi-person-arms-up"></i></a>
            </div>
        </header>
        <main>
            <div class="row justify-content-center mt-5">
                <div class="col-sm-3 p-2 filters">
                    <p>Filtruj wydarzenia</p>
                    <button type="button" class="btn btn-light m-1 w-100">Koncerty</button>
                    <button type="button" class="btn btn-light m-1 w-100">Teatr</button>
                    <button type="button" class="btn btn-light m-1 w-100">Balet</button>
                    <button type="button" class="btn btn-light m-1 w-100">Opera</button>
                </div>
                <div class="col-sm-6 p-3">
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

                <div class="col-sm-3 p-2 artists">
                    <h2 class="text-center">Top artyści</h2>
                    <a href="app/views/artist1_view.php" class="btn"><img src="public/images/lianne.jpg" class="w-75" alt="Artist 1"></a>
                    <a href="app/views/artist2_view.php" class="btn"><img src="public/images/tom misch.jpg" class="w-75" alt="Artist 2"></a>
                    <a href="app/views/artist2_view.php" class="btn"><img src="public/images/justin.jpg" class="w-75" alt="Artist 1"></a>
                    <a href="app/views/artist2_view.php" class="btn"><img src="public/images/zak abel.jpg" class="w-75" alt="Artist 1"></a>
                    <a href="app/views/artist2_view.php" class="btn"><img src="public/images/lauryn.jpg" class="w-75" alt="Artist 1"></a>
                    <a href="app/views/artist1_view.php" class="btn"><img src="public/images/honne.jpg" class="w-75" alt="Artist 1"></a>
                </div>
            </div>
        </main>
        <footer>
            <p>Projekt i wykonanie Barbara Sławińska &copy; 2024</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>