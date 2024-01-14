<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <?php
                    if(true){
                        ?>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/login">Logg in</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/register">Create an account</a></li>
                        </ul>
                        <?php
                    }else{
                    ?>
                    <ul class="dropdown-menu">
                        <p class="dropdown-item" href="#">Welcome back!</p>
                        <li><a class="dropdown-item" href="#">Account setting</a></li>
                        <li><a class="dropdown-item" href="#">You're orders</a></li>
                        <li><a class="dropdown-item" href="#">Log out</a></li>
                        <?php
                        } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
