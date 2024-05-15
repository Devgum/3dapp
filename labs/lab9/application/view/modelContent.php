<div class="container-fluid main_contents dark_1">
    <div class='row'>
        <div class='col-sm-4'>
            <div class='card text-left'>
                <!-- Model Selection -->
                <div class='card-header'>
                    <ul class='nav nav-tabs card-header-tabs'>
                        <?php 
                        $currentBrandId = isset($_GET['brand_id']) ? $_GET['brand_id'] : 1;
                        foreach ($brands as $brand): 
                            $isActive = ($brand->id == $currentBrandId) ? 'active' : '';
                        ?>
                            <li class='nav-item'>
                                <a class='nav-link <?= $isActive ?>' href='javascript:switch_to(model_content, <?= $brand->id ?>)'><?= htmlspecialchars($brand->display) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Model -->
                <div class='card-body model3D'>
                    <x3d width='100%' height='100%'>
                        <scene>
                            <inline url='<?= htmlspecialchars($model->path) ?>'/>
                            <?php
                                $viewpoints = json_decode($model->viewpoints, true) ?: [];
                                foreach($viewpoints as $viewpoint):
                            ?>
                                <Viewpoint id='<?= $viewpoint['id'] ?>'
                                    position='<?= $viewpoint['position'] ?>'
                                    orientation='<?= $viewpoint['orientation'] ?>'
                                    zNear='<?= $viewpoint['zNear'] ?>'
                                    zFar='<?= $viewpoint['zFar'] ?>'
                                    description='<?= $viewpoint['description'] ?>'>
                            <?php endforeach; ?>
                        </scene>
                    </x3d>
                    <div class='card-text'>
                        <p><?= htmlspecialchars($model->description) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-sm-2'>
            <div class='card'>
                <div class='card-title'>
                    Camera Views
                </div>
                <div class='card-text'>
                    These buttons select a range of X3D model viewpoints.
                </div>
                <div class='card-body'>

                    <!-- Cameras -->
                    <div class='btn-group-vertical'>
                        <?php foreach ($viewpoints as $viewpoint): ?>
                            <a id='<?= htmlspecialchars($viewpoint['id']) ?>_btn' class="btn btn-primary btn-responsive" onclick="document.getElementById('<?= htmlspecialchars($viewpoint['id']) ?>').setAttribute('set_bind','true'); toggle_active_btn('<?= htmlspecialchars($viewpoint['id']) ?>_btn')"><?= htmlspecialchars($viewpoint['description']) ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>

        <div class='row'>
            <div class='col-sm-4'>
                <?php foreach ($cards as $card): ?>
                <div class='card'>
                    <div class='card-body'>
                        <div class='card-title'>
                            <h2><?= htmlspecialchars($card->title) ?></h2>
                        </div>
                        <div class='card-text'>
                            <h3><?= htmlspecialchars($card->subtitle) ?></h3>
                        </div>
                        <div>
                            <p><?= htmlspecialchars($card->description) ?></p>
                        </div>
                        <a href="<?= htmlspecialchars($card->link) ?>" class="btn btn-primary">Find out more...</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class='col-sm-8'>
                <div class='card text-left'>
                    <div class='card-header'>Image Gallery</div>
                    <div class='gallery'>
                        <?php
                        include './application/view/gallery.php';

                        foreach ($images as $image):
                        ?>
                            <a href='<?= htmlspecialchars($image) ?>'>
                                <img src='<?= htmlspecialchars($image) ?>' class='card-img-top img-thumbnail'/>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <p class='card-text'>Images rendered in Blender</p>
                </div>
            </div>
        </div>
    </div>
</div>