<div class="container-fluid mt-5 main_contents">
    <div class='row'>
        <div class='col-sm-10'>
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
                <div class='model3D'>
                    <x3d width='100%' height='100%'>
                        <scene>
                            <inline url='<?= htmlspecialchars($model->path) ?>'/>
                            <?php
                                $viewpoints = json_decode($model->viewpoints, true) ?: [];
                                foreach($viewpoints as $viewpoint):
                            ?>
                                <Viewpoint id='<?= $viewpoints['id'] ?>'
                                    position='<?= $viewpoints['position'] ?>'
                                    orientation='<?= $viewpoints['orientation'] ?>'
                                    zNear='<?= $viewpoints['zNear'] ?>'
                                    zFar='<?= $viewpoints['zFar'] ?>'
                                    description='<?= $viewpoints['description'] ?>'>
                            <?php endforeach; ?>
                        </scene>
                    </x3d>
                </div>

                <div class='card-body'>
                    <div class='card-text'>
                        <p><?= htmlspecialchars($model->description) ?></p>
                    </div>
                    <div class='card-title'>
                        Camera Views
                    </div>
                    <div class='card-text'>
                        These buttons select a range of X3D model viewpoints.
                    </div>
                    <!-- Cameras -->
                    <div class='btn-group'>
                        <?php foreach ($viewpoints as $viewpoint): ?>
                            <a class="btn btn-primary btn-responsive camera-font" onclick="document.getElementById('<?= htmlspecialchars($viewpoint['id']) ?>').setAttribute('set_bind','true');"><?= htmlspecialchars($viewpoint['description']) ?></a>
                        <?php endforeach ?>?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery -->                
        <div class='col-sm-2'>
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