<div class="container-fluid mt-5 main_contents">
    <div class='row'>
        <div class='col-sm-10'>
            <div class='card text-left'>
                <div class='card-header'>
                    <ul class='nav nav-tabs card-header-tabs'>
                        <?php foreach ($brands as $brand): ?>
                            <li class='nav-item'>
                                <a class='nav-link active' href='javascript:switch_to(model_content, <?= htmlspecialchars($brand->id) ?>'><?= htmlspecialchars($brand->name) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class=''>
                    <x3d width='100%' height='100%'>
                        <scene>
                            <inline url='<?= htmlspecialchars($model->path) ?>'/>
                        </scene>
                        <!-- Viewpoints -->
                    </x3d>
                    <script>
                        x3dom.reload();
                    </script>
                </div>
                
            </div>
        </div>
    </div>
</div>