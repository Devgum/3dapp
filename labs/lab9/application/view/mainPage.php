<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile 3D App - Lab9 2024</title>
    <!-- CSS -->
    <link href="application/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" rel="stylesheet" type="text/css"/>
    <link href="application/css/x3dom.css" rel="stylesheet" type="text/css">
    <link href="application/css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include './application/view/navbar.php'?>
    <div id='content'></div>
    <?php include './application/view/footer.php'?>
    <div class="modal fade" id="contactModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Contact Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p>Zhao, Ruochen</p>
                <p>Email: rz232@sussex.ac.uk</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>
    <!-- Scripts -->
    <!-- Placing scripts at tail of the body can reduce the lag caused by the scripts loading-->
    <script src="application/js/jquery-3.7.1.js"></script>
    <script src="application/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5b09a8cf4e.js" crossorigin="anonymous"></script>
    <script src="application/js/x3dom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="application/js/btn_group_toggle.js"></script>
    <script src="application/js/model_interactions.js"></script>
    <script src="application/js/switch_home_model.js"></script>
</body>
</html>