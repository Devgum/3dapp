<div class='container-fluid mt-5'>
    <div class='row'>
        <div class='col-xs-12 col-sm-12'>
            <div class='main-3d-image'>
                <div class='col-xs-12 col-sm-4'>
                    <h2><?= htmlspecialchars($main_text->title); ?></h2>
                    <h3><?= htmlspecialchars($main_text->subtitle); ?></h3>
                    <p><?= htmlspecialchars($main_text->description); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <?php foreach ($cards as $card): ?>
        <div class='col-sm-4'>
            <div class='card'>
                <a href='javascript:switch_to(model_content, <?= htmlspecialchars($card->brand_id) ?>)'>
                    <img class='card-img-top img-fluid img-thumbnail' src='<?= htmlspecialchars($card->image_path)?>'>
                </a>
                <div class='card-body'>
                    <div class="card-title"></div>
                    <div class="card-text"></div>
                    <div class="card-text"></div>
                    <a href="<?= htmlspecialchars($card->link) ?>" class="btn btn-primary">Find out more...</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>