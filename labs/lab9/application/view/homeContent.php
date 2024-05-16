<div class='container-fluid dark_1'>
    <section class='main-showcase' style='background-image: url(<?= htmlspecialchars($main_text->image_path) ?>);'>
        <article class='info container text-center'>
            <h2><?= htmlspecialchars($main_text->title); ?></h2>
            <h3><?= htmlspecialchars($main_text->subtitle); ?></h3>
            <p><?= htmlspecialchars($main_text->description); ?></p>
        </article>
    </section>
    <div class='row mt-3'>
        <?php foreach ($cards as $card): ?>
        <div class='col-xl-4 col-12'>
            <div class='card dark_2'>
                <a href='<?= htmlspecialchars($card->render_path) ?>' data-fancybox data-caption='Render Image'>
                    <img class='card-img-top img-fluid img-thumbnail' src='<?= htmlspecialchars($card->image_path)?>'>
                    <script>
                        Fancybox.bind('[data-fancybox]', {
                            // Your custom options
                        });    
                    </script>
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
