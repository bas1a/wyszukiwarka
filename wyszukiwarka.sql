-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sty 17, 2024 at 12:31 PM
-- Wersja serwera: 10.6.16-MariaDB-cll-lve
-- Wersja PHP: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srv40917_wyszukiwarka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `location`, `date`, `description`, `type`, `image_url`, `user_id`) VALUES
(2, 'Skyfall - Edytowany', 'Helios Posnania', '2024-01-26', '&quot;Skyfall&quot; to jeden z najwspanialszych filmów o przygodach najsłynniejszego agenta wszech czasów. Bond, James Bond - to nazwisko zna każdy. Tym razem na próbę zostaje wystawiona lojalność Bonda (Daniel Craig) wobec M (Judi Dench), gdy cyber-terroryści powiązani z jej przeszłością atakują siedzibę MI6. Agent 007 podąża śladem tajemniczego i bezwzględnego Silvy (Javier Bardem) - geniusza zbrodni - którego nic nie powstrzyma przed wprowadzeniem w życie zbrodniczego planu zemsty.', 'kino', 'https://fwcdn.pl/fpo/12/44/451244/7494882.5.jpg', 20),
(3, 'Musical Metro w Teatrze Studio Buffo', 'TAURON Arena Kraków', '2024-02-09', 'Legendarny musical &quot;Metro&quot; to wizytówka repertuaru Studia Buffo. Na scenie widzimy pasję i entuzjazm, taniec i śpiew, jakich nie znał polski teatr. Jest tam miłość, szaleństwo i młodość. I to wszystko sprawia, że granica między teatrem a rzeczywistością staje się płynna, a akcja spektaklu zdaje się wykraczać daleko poza teatralne foyer, a czas staje się wyłącznie funkcją wyobraźni.\r\n\r\n \r\n\r\n&quot;METRO&quot; - gdzieś między fikcją a rzeczywistością. Uliczni grajkowie, śpiewacy i tancerze wystawiają na podziemnych peronach metra spektakl dla pasażerów. Jego twórcą i animatorem jest Jan, dla którego metro jest domem, a underground - sposobem na życie. Spektakl budzi sensację, a młodzi artyści otrzymują propozycję pracy w komercyjnym teatrze. To opowieść o marzeniach i rozczarowaniach, o pasji i zdradzie, o młodzieńczych ideałach i władzy pieniądza, a przede wszystkim to historia romantycznej miłości.', 'teatr', 'https://studiobuffo.com.pl/upload/gallery/1427810691551aa9837a9eb.jpeg', 21),
(4, 'Szybcy i Wściekli 7', 'Kinepolis Poznań', '2024-03-01', 'Akcja &quot;Szybkich i wściekłych 7&quot; rozpoczyna się mniej więcej rok po tym jak zespół Doma (Diesel) i Briana (Walker) powraca do Stanów po ułaskawieniu. Starają się być prawowitymi obywatelami i członkami rodzin, co po latach na wysokich obrotach nie do końca im wychodzi. Dom z całych sił stara się ponownie zacząć życie z Letty (Rodriguez), podczas gdy Brianowi z trudem przychodzi dostosowanie do funkcjonowania na spokojnych przedmieściach z Mią (Brewster) i ich synem. Z kolei Tej (Bridges) i Roman (Gibson) korzystają z życia, bawiąc się i podrywając dziewczyny. Wszystko wydawałoby się wracać do normalności, gdyby nie fakt pojawienia się brytyjskiego zabójcy, który z zimną krwią realizuje swój plan i ma rachunki do wyrównania.', 'kino', 'https://fwcdn.pl/fpo/82/51/678251/7673836.5.jpg', 20),
(5, 'Narodowy Balet Gruzji Sukhishvili', 'ICE Kraków Congress Centre', '2024-02-25', 'Ich występ obejrzało ponad 90 mln widzów. Każdego roku czekają na nich w różnych krajach świata. Nazywają ich huraganem na scenie, duchem widowiska, unikalnym fenomenem, ósmym cudem świata!\r\n\r\nTak potrafią tylko ONI! Poczuj moc pozytywnych emocji! 100 tancerzy i 2500 kostiumów. Niesamowita orkiestra i unikatowe instrumenty muzyczne. Mają wpływ na światową modę, kręcą o nich filmy i piszą książki. Ich taniec rzuca wyzwanie prawom grawitacji. To widowisko zapamiętasz na zawsze!\r\n\r\nBalet Sukhishvili bilety na niesamowite widowisko!', 'balet', 'https://biletyna.pl/file/get/id/71504/w/260', 21),
(6, 'Open&#039;er Festival 2024', 'Gdynia, Lotnisko Gdynia - Kosakowo', '2024-06-15', '21 Savage na Open’erze! Jeden z najważniejszych graczy światowego rapu ostatnich lat wystąpi po raz pierwszy w Polsce! Widzimy się 5 lipca na Orange Main Stage.\r\nIce Spice na Open’erze! Stop playin with’ em Riot! „Księżniczka drillu” z Bronxu wystąpi 5 lipca na Orange Main Stage.\r\nCzas na kolejną odsłonę Alter Stage! Do line-upu dołączają L&#039;Impératrice – czołówka francuskiej muzycznej awangardy z tanecznym vibem, wirtuozerskim basem i świetnymi melodiami, a także Sofia Kourtesis (live act) – wyjątkowa producentka i DJ-ka, której album “Madres” jest jedną z najlepiej ocenianych płyt elektronicznych tego roku (m.in. tytuł Best New Music od Pitchforka).\r\nClaptone na taneczne zamknięcie piątkowej Tent Stage! Specjalizujący się w obłędnych house’owych setach DJ i producent wjedzie na Open’era 5 lipca.\r\n Two Feet zagra na Tent Stage już 6 lipca! Jego sensualne podejście do muzyki i połączenie rockowego songwritingu z głębokim basem zdobyło już 2 miliardy streamów w samym Spotify! Autor takich kawałków jak „I Feel Like I’m Drowning” i „Go F*ck Yourself”.', 'koncert', 'https://www.ebilet.pl/media/cms/media/a5ngaqxl/opener_2024_552x736_ebilet-95416abd-8dc1-4b54-8b8f-4ad47fdb68ef.webp', 21),
(7, 'Dziadek do orzechów', 'Poznań', '2024-02-02', 'Dziadek do orzechów – balet-feeria w 2 aktach, 3 obrazach z apoteozą, zrealizowany po raz pierwszy w petersburskim Teatrze Maryjskim. Libretto: Marius Petipa według opowiadania Dziadek do orzechów E.T.A. Hoffmanna we francuskiej wersji Alexandre’a Dumasa Muzyka: Piotr Czajkowski', 'balet', 'https://operakameralna.pl/wp-content/uploads/2022/03/Dziadek-do-orzechow-1160x1640.jpg', 20),
(8, 'Katie Melua', 'Łódź', '2024-02-21', 'Katie Melua sprawnie łączy w swoich piosenkach wpływy muzyki pop, folku, bluesa i jazzowego wokalu. Jej brzmienie porównuje się do stylistyki utworów Nory Jones czy Diany Krall.', 'koncert', 'https://jazzforum.com.pl/images/uploads/news/45342/4_katie_melua_call_off_the_search.jpeg', 21),
(9, 'Kroke', 'Kraków', '2024-04-26', 'Swoją muzyką zachwycają nas już od 28 lat! Wszystko zawdzięczają swoim talentom i pracy, ale kto wie jak potoczyłaby się ich kariera gdyby nie nazwiska w rodzaju: Steven Spielberg, Peter Gabriel, Nigel Kennedy, David Lynch...', 'koncert', 'https://image.ceneostatic.pl/data/products/3395743/i-kroke-live-at-the-pit.jpg', 21),
(10, 'Macy Gray', 'Gdańsk', '2024-05-31', 'Jedna z największych gwiazd neo soul, wokalistka o bardzo charakterystycznym, chrypliwym, i ciepłym głosie. Zadebiutowała w 1999 roku albumem „On How Life Is”, z którego pochodzi m.in. przebojowy utwór „I Try”.', 'koncert', 'https://people.com/thmb/lyGzQg7sZLomT4Lmjlj1g8-Bsd4=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():focal(607x519:609x521):format(webp)/macy-gray-2000-39825e28a5d84e5ca4b2051a5f985768.jpg', 21),
(11, 'Pat Metheny', 'Warszawa', '2024-09-20', 'Jeden z najbardziej rozpoznawalnych muzyków jazzowych świata. Nieprzerwanie od 1976 roku wydaje kolejne albumy, solowe, w projekcie Pat Metheny Group oraz w towarzystwie innych artystów (m.in. Brad Mehldau, Herbie Hancock, David Bowie, Steve Reich, Ornette Coleman, Jim Hall, Milton Nascimento).', 'koncert', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Steve_Rodby_and_Pat_Metheny.jpg/1280px-Steve_Rodby_and_Pat_Metheny.jpg', 21),
(12, 'Jak Zabłocki na mydle - spektakl komediowy', 'Poznań', '2024-04-19', 'Jak wyjść bez szwanku ze zderzenia odmiennych potrzeb, ze stłuczki dwóch światów – kobiecego i męskiego? Jak wyślizgnąć się spod walca utartych schematów? Małżeństwo z długim stażem (Joanna Trzepiecińska i Tomasz Dedek) decyduje się na radykalny krok – zamianę ról!', 'teatr', 'https://adria-art.pl/storage/23805/A4_Jak-zab%C5%82ocki-na-mydle.jpg', 21),
(13, 'Prawda - komedia w reżyserii Wojciecha Malajkata', 'Wrocław', '2024-05-18', 'Czy prawda zawsze wychodzi na jaw, a może każdy ma własną? I czy kłamstwa rzeczywiście mają krótkie nogi? Odpowiedzi na to pytania dostarczy najnowsza komedia „Prawda” w reżyserii Wojciecha Malajkata.', 'teatr', 'https://biletyna.pl/file/get/id/97987', 20),
(14, 'Kolacja dla głupca', 'Poznań', '2024-06-14', 'Kolacja dla głupca to hit teatralny, od lat grany na deskach wielu światowych teatrów! To znakomita gra aktorska, wartka, zabawna akcja i zaskakujący finał.', 'teatr', 'https://biletyna.pl/file/get/id/83542', 20),
(15, 'Szalone nożyczki', 'Warszawa', '2025-10-09', '&quot;Szalone nożyczki&quot; to interaktywna zabawa z widownią, która razem ze scenicznymi bohaterami prowadzi śledztwo i szuka odpowiedzi na pytanie: kto zabił Izabelę Czerny, wybitną pianistkę, mieszkającą tuż nad salonem fryzjerskim?', 'teatr', 'https://www.ebilet.pl/media/cms/media/32vhkiop/szalone-no%C5%BCyczki-_1080x1080-aa4b609e-edf6-421e-ac5a-e25434f645a8.webp', 21),
(16, 'Jezioro Łabędzie', 'Poznań', '2024-05-04', '&quot;Jezioro Łabędzie&quot; to wyjątkowy spektakl baletowy, wspaniale wykonany przez renomowany Królewski Balet Klasyczny pod dyrekcją Marcin Rolczyńskiego. Ta klasyczna produkcja, stworzona przez Piotra Czajkowskiego, jest jednym z najbardziej znanych i ukochanych baletów na całym świecie.', 'balet', 'https://api.culture.pl/sites/default/files/styles/420_auto/public/users/alegierska/jezioro.jpg?itok=8btuLzYv', 21),
(17, 'TANGO', 'Warszawa', '2024-01-28', 'Zapraszamy na niezapomnianą podróż do magicznego świata argentyńskiego tanga! Marcos Ayala i Paola Camacho razem z Tango Company z Argentyny, przeniosą Was w czasie i przestrzeni podczas wyjątkowego koncertu &quot;Tango in the Shadows&quot;', 'balet', 'https://salsasiempre.pl/wp-content/uploads/2023/06/czym-charakteryzuje-sie-tango-argentynskie-img.jpg', 21),
(18, 'Bohemian Rhapsody', 'Cinema City ', '2024-04-24', 'Bohemian Rhapsody – amerykańsko-brytyjski film biograficzny z 2018 roku w reżyserii Bryana Singera opowiadający historię brytyjskiego zespołu rockowego Queen, skupiający się głównie na frontmanie i wokaliście grupy – Freddiem Mercurym.', 'kino', 'https://fwcdn.pl/fpo/92/01/619201/7863180.3.jpg', 21),
(19, 'Diuna', 'Poznań', '2024-02-02', 'Film &quot;Diuna&quot; opowiada historię niezwykłej, pełnej przygód i emocji podróży Paula Atreidesa. Temu genialnemu i utalentowanemu młodemu człowiekowi pisane jest wspaniałe przeznaczenie, którego on sam nie jest w stanie pojąć.', 'kino', 'https://m.media-amazon.com/images/M/MV5BMDQ0NjgyN2YtNWViNS00YjA3LTkxNDktYzFkZTExZGMxZDkxXkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_FMjpg_UX1000_.jpg', 21),
(20, 'Joker', 'PoznaN', '2024-02-10', 'Joker – amerykański dramat psychologiczny na podstawie serii komiksów o postaci o tym samym imieniu wydawnictwa DC Comics, w reżyserii Todda Phillipsa, który napisał scenariusz wspólnie ze Scottem Silverem.', 'kino', 'https://fwcdn.pl/fpo/01/67/810167/7905225.3.jpg', 20),
(21, 'Don Juan ', 'Teatr Wielki w Poznaniu ', '2024-02-10', 'Jedna z najbardziej zniewalających postaci kultury zachodniej – Don Juan – nadal inspiruje twórców. O przyczynę donżuanizmu pytają pisarze, twórcy filmowi i choreografowie. Czy w naszej zseksualizowanej rzeczywistość i przy wszechobecnej pornografii zachowania w typie uwodziciela z Sewilli jeszcze szokują? Gdzie ukrywa się miłość, czułość i zrozumienie? Opowieść o Don Juanie – inspirująca powstanie wielu dzieł sztuki – nadal potrafi zaskakiwać.', 'opera', 'https://s.inyourpocket.com/gallery/272140.jpg', 21),
(22, 'Don Kichot', 'Teatr Wielki w Poznaniu ', '2024-02-11', 'Temperament, wdzięk, wirtuozeria oraz potężna dawka komizmu – baletowa wersja przygód szlachetnego rycerza z La Manchy od dawna urzeka miłośników tańca. Ten oparty na znakomitym literackim pierwowzorze spektakl w choreografii Michala Štípy przenosi nas do słonecznej Hiszpanii, gdzie piękna Kitri i zakochany w niej Basilio napotykają zbłąkanego rycerza, któremu towarzyszy nieodłączny giermek.', 'opera', 'https://taniecpolska.pl/wp-content/uploads/2022/02/don_kichot_pasek-1.jpg', 20),
(23, 'Otello', 'Warszawa', '2024-03-09', 'Bitewne zwycięstwa, miłość podwładnych, ukochana żona – los jest łaskawy dla Otella. Jednak szczęśliwe chwile przemijają niepostrzeżenie, gdy umysłem bohatera zaczyna rządzić podejrzliwość, a sercem – zazdrość. Nękające Otella pytanie o wierność pięknej Desdemony spycha go w otchłań zwątpienia i prowadzi do zagłady.', 'opera', 'https://galeriaplakatu.com.pl/3774-large_default/4508-otello-verdi-polish-opera-poster.jpg', 21),
(24, 'Rigoletto', 'Warszawa', '2024-04-12', '„Przekleństwo!” („La maledizione!”) – ostatnie słowo Rigoletta, dworskiego błazna i czułego ojca, którego flirt z władzą kończy strata ukochanej córki – najlepiej streszcza fabułę hitu Verdiego. Choć krytycy powątpiewali w powodzenie kompozycji, zrywającej ze sztywnym kanonem tworzenia, sam Verdi był przekonany, że „Rigoletto” jest jego najlepszą operą, w której walory muzyczne współgrają w pełni z dramatycznym przebiegiem akcji.', 'opera', 'https://m.media-amazon.com/images/I/61sNoVd9QiL._AC_UF1000,1000_QL80_.jpg', 21);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `registration_date`, `role`) VALUES
(20, 'pawel@gmail.com', '$2y$10$5n7RZfNhjIWHnZf8rrUJ/eK.AhMBUd4mSOLlP3wo/k4.vniT9qki.', 'Paweł', 'Staniul', '2024-01-17 08:18:18', 'guest'),
(21, 'basia@gmail.com', '$2y$10$EhJvquMc395KAd7C/zkw2eIvC0OBSYYBKX6WOW93gaTouw.2kVO6W', 'Barbara', 'Sławińska', '2024-01-17 10:26:50', 'administrator'),
(22, 'b.slaw@wp.pl', '$2y$10$nXzsj2ZMi7ri4hKbJnNlquOCFKuk69xdoFQfoxJppfMt5JjF46w3O', 'Basia', 'SLa', '2024-01-17 11:26:10', 'guest');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
