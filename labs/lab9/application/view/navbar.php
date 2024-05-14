<nav class="navbar navbar-expand-sm sticky-top navbar-coca-cola">
    <div class="container-fluid">
        <div class="logo navbar-nav">
            <a class="navbar-brand" href="javascript:switch_to(home_content)">
                <h1>1</h1>
                <h1>oca</h1>
                <h2>Cola</h2>
                <h3>Journey</h3>
                <p>Refreshing the world, one story at a time</p>
            </a>
            <!-- <a class="navbar-brand">Coca Cola Journey</a> -->
        </div>

        <!-- Bootstrap 5: data-bs-toggle data-bs-target -->
        <!-- Reference: https://stackoverflow.com/questions/68931929/why-isnt-collapse-in-bootstrap-5-working-from-the-example -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Using ms-auto instead of ml-auto -->
            <!-- Reference: https://stackoverflow.com/questions/63948287/bootstrap-5-navbar-align-items-right-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:switch_to(home_content)">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" id="navbardrop">
                        Drinks
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($data as $brand): ?>
                            <li>
                                <a class='dropdown-item' href='javascript:switch_to(model_content, <?= htmlspecialchars($brand->id) ?>)'><?= htmlspecialchars($brand->name) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>