<div class="container-fluid main_contents dark_1">
    <div class='row'>
        <div class='col-xl-5 col-md-12 mb-5'>
            <div class='card text-left dark_2'>
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
                    <x3d width='100%' height='100%' id='x3d_content'>
                        <scene>
                            <inline namespaceName="model" mapDEFToID="true" url='<?= htmlspecialchars($model->path) ?>'/>
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

        <div class='col-xl-7 col-md-12'>
            <div class='row'>
                <div class='col-xl-12'>
                    <div class='card text-center dark_2'>
                        <div class='card-header'>
                            <h3>Image Gallery</h3>
                        </div>
                        <div class='gallery'>
                            <?php
                            include './application/view/gallery.php';

                            foreach ($images as $image):
                            ?>
                                <a href='<?= htmlspecialchars($image) ?>'>
                                    <img src='<?= htmlspecialchars($image) ?>' class='card-img-top gallery img-thumbnail'/>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <p class='card-text'>Images rendered in Blender</p>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-xl-12 mt-5'>
                    <div class='card text-center dark_2'>
                        <div class='card-header'>
                            <h3>Camera Views</h3>
                        </div>
                        <div class='card-text'>
                            <p>These buttons select a range of X3D model viewpoints.</p>
                        </div>
                        <div class='card-body btn-group'>
                            <?php foreach ($viewpoints as $viewpoint): ?>
                                <a id='<?= htmlspecialchars($viewpoint['id']) ?>_btn' class="btn btn-primary btn-responsive" onclick="document.getElementById('<?= htmlspecialchars($viewpoint['id']) ?>').setAttribute('set_bind','true'); toggle_active_btn('<?= htmlspecialchars($viewpoint['id']) ?>_btn')"><?= htmlspecialchars($viewpoint['description']) ?></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-6 mt-5'>
                        <div class="card text-center dark_2">
                            <div class="card-header">
                                <h3>Animation Options</h3>
                            </div>
                            <div class="card-text">
                                <p>These buttons select a range of X3D animation options</p>
                            </div>
                            <div class='card-body btn-group'>
                                <a id='rotx_btn' href="#" class="btn btn-primary btn-responsive" onclick="animate('x');toggle_active_btn('rotx_btn');">RotX</a>
                                <a id='rotx_btn' href="#" class="btn btn-primary btn-responsive" onclick="animate('x');toggle_active_btn('rotx_btn');">RotY</a>
                                <a id='rotx_btn' href="#" class="btn btn-primary btn-responsive" onclick="animate('x');toggle_active_btn('rotx_btn');">RotZ</a>
                                <a id='stop_btn' href="#" class="btn btn-primary btn-responsive" onclick="stop();toggle_active_btn('stop_btn');">Stop</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-xl-6 mt-5 mb-5'>
                        <div class="card text-center dark_2">
                            <div class="card-header">
                                <h3>Light Options</h3>
                            </div>
                            <div class="card-text">
                                <p>These buttons select a range of X3D light options</p>
                            </div>
                            <div class='card-body btn-group'>
                                <a id='omnilight_btn' class="btn btn-primary btn-responsive" href="#" onclick="omniLight();toggle_active_btn('omnilight_btn');">Onmi On/Off</a>
                                <a id='headlight_btn' class="btn btn-primary btn-responsive" href="#" onclick="headLight();toggle_active_btn('headlight_btn');">Headlight On/Off</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-xl-12'>
        <?php foreach ($cards as $card): ?>
            <div class='card dark_2'>
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
    </div>
</div>