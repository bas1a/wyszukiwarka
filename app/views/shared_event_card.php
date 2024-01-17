<div class="col-sm-6 px-3">
    <?php while ($row = $events->fetch(PDO::FETCH_ASSOC)) : ?>
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <?php if (!empty($row['image_url'])) : ?>
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="img-fluid rounded-start" alt="Zdjęcie wydarzenia">
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo htmlspecialchars_decode($row['name']); ?></h4>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($row['date']); ?></h6>
                        <p class="card-text"><?php echo htmlspecialchars_decode($row['description']); ?></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p>Wydarzenie dodane przez: <?php echo htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']); ?></p>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>
                    <a href='view_update_event.php?id=<?php echo $row['id']; ?>' class='btn btn-warning m-1'>Edytuj</a>
                    <a href='#' data-id='<?php echo $row['id']; ?>' class='btn btn-danger delete-btn'>Usuń</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

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
                    window.location.href = '../controllers/event_delete_controller.php?id=' + eventId;
                }
            });
        });
    });
</script>