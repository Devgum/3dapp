<div class='container-fluid mt-5'>
    <section class='main-showcase' style='background-image: url(<?= htmlspecialchars($main_text->image_path) ?>);'>
        <article class='info'>
            <h2><?= htmlspecialchars($main_text->title); ?></h2>
            <h3><?= htmlspecialchars($main_text->subtitle); ?></h3>
            <p><?= htmlspecialchars($main_text->description); ?></p>
        </article>
    </section>
    <div class='row'>
        <?php foreach ($cards as $card): ?>
        <div class='col-sm-4'>
            <div class='card'>
                <a href='javascript:switch_to(model_content, <?= htmlspecialchars($card->brand_id) ?>)'>
                    <img class='card-img-top img-fluid img-thumbnail' src='<?= htmlspecialchars($card->image_path)?>'>
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
</div>
