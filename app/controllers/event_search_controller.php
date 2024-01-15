<?php
require_once '../../config/database.php';
require_once '../models/event.php';

$database = new Database();
$db = $database->getConnection();

$event = new Events($db);
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

$results = $event->search($searchTerm);
?>

<div class="col-md-6 px-3">
    <?php while ($row = $results->fetch(PDO::FETCH_ASSOC)) : ?>
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
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($row['date']); ?></h6 <p class="card-text"><?php echo htmlspecialchars_decode($row['description']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>