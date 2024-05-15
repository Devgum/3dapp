<nav class="topnav navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" href="javascript:switch_to(home_content)">
        <h1>1</h1>
        <h1>oca</h1>
        <h2>Cola</h2>
        <h3>Journey</h3>
        <p>Refreshing the world, one story at a time</p>
    </a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto d-flex align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="javascript:switch_to('home_content')">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
                    Drinks
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php foreach ($brands as $brand): ?>
                    <li><a class="dropdown-item" href="javascript:switch_to('model_content', <?= $brand->id ?>)"><?= $brand->display ?></a></li>
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