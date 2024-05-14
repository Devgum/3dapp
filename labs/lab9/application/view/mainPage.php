<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile 3D App - Lab9 2024</title>
    <!-- CSS -->
    <link href="application/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" rel="stylesheet"/>
    <link href="application/css/x3dom.css">
    <link href="application/css/custom.css" rel="stylesheet">
</head>
<body>
    <?php include './application/view/navbar.php'?>
    <div id='content' class="container-fluid mt-5">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div id="main_3d_image">
                    <div id="main_text" class="col-xs-12 col-sm-4">
                        <div id="title_home"></div>
                        <div id="subtitle_home"></div>
                        <div id="description_home"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="card">
              <a href="javascript:swap('coke')">
                <img class="card-img-top img-fluid img-thumbnail" src="assets/images/coca_cola.jpg" alt="Coca Cola">
              </a>
              <div class="card-body">
                <div id="title_left" class="card-title"></div>
                <div id="subtitle_left" class="card-text"></div>
                <div id="description_left" class="card-text"></div>
                <a href="https://www.coca-cola.com/gb/en/brands/coca-cola-original-taste" class="btn btn-primary">Find out more...</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <a href="javascript:swap('sprite')">
                <img class="card-img-top img-fluid img-thumbnail" src="assets/images/sprite.jpg" alt="Sprite">
              </a>
              <div class="card-body">
                <div id="title_centre" class="card-title"></div>
                <div id="subtitle_centre" class="card-text"></div>
                <div id="description_centre" class="card-text"></div>
                <a href="https://www.coca-cola.com/gb/en/brands/sprite" class="btn btn-primary">Find out more...</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <a href="javascript:swap('pepper')">
                <img class="card-img-top img-fluid img-thumbnail" src="assets/images/dr_pepper.jpg" alt="Dr Pepper">
              </a>
              <div class="card-body">
                <div id="title_right" class="card-title"></div>
                <div id="subtitle_right" class="card-text"></div>
                <div id="description_right" class="card-text"></div>
                <a href="https://www.coca-cola.com/gb/en/brands/dr-pepper" class="btn btn-primary">Find out more...</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include './application/view/footer.php'?>
<!-- Scripts -->
<!-- Placing scripts at tail of the body can reduce the lag caused by the scripts loading-->
<script src="application/js/jquery-3.7.1.js"></script>
<script src="application/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/5b09a8cf4e.js" crossorigin="anonymous"></script>
<script src="application/js/x3dom-full.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="application/js/custom.js"></script>
</body>
</html>