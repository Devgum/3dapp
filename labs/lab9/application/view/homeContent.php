<div class='container-fluid mt-5'>
    <section class='main-showcase' style='background-image: url(<?= htmlspecialchars($main_text->image_path) ?>);'>
        <article class='info container'>
            <h2><?= htmlspecialchars($main_text->title); ?></h2>
            <h3><?= htmlspecialchars($main_text->subtitle); ?></h3>
            <p><?= htmlspecialchars($main_text->description); ?></p>
        </article>
    </section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach ($cards as $index => $card): ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index ?>" class="<?= $index == 0 ? 'active' : '' ?>"></li>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($cards as $index => $card): ?>
            <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                <div class='card'>
                    <a href='javascript:switch_to("model_content", <?= htmlspecialchars($card->brand_id) ?>)'>
                        <img class='card-img-top img-fluid img-thumbnail' src='<?= htmlspecialchars($card->image_path) ?>' alt="<?= htmlspecialchars($card->title) ?>">
                    </a>
                    <div class='card-body'>
                        <h2 class="card-title"><?= htmlspecialchars($card->title) ?></h2>
                        <h3 class="card-subtitle"><?= htmlspecialchars($card->subtitle) ?></h3>
                        <p><?= htmlspecialchars($card->description) ?></p>
                        <a href="<?= htmlspecialchars($card->link) ?>" class="btn btn-primary">Find out more...</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
