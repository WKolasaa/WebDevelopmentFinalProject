<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Shop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">Products</a>
                </li>
            </ul>

            <!-- Content to be conditionally rendered -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Content to be conditionally rendered -->
                        <ul id="loggedOutContent" class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="/login">Log in</a></li>
                            <li class="nav-item"><a class="nav-link" href="/register">Create an account</a></li>
                        </ul>

                        <ul id="loggedInContent" class="navbar-nav" style="display: none;">
                            <li class="nav-item"><span class="nav-link">Welcome back!</span></li>
                            <li class="nav-item"><a class="nav-link" href="#">Account setting</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Your orders</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Log out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Include Bootstrap JS dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.min.js"></script>

<script>
    fetch('/connectionSPToJS.php')
        .then(response => response.json())
        .then(data => {
            const isLoggedIn = data.isLoggedIn;

            // Conditional rendering
            const loggedOutContent = document.getElementById('loggedOutContent');
            const loggedInContent = document.getElementById('loggedInContent');

            if (isLoggedIn) {
                loggedOutContent.style.display = 'none'; // Hide the logged-out content
                loggedInContent.style.display = 'block'; // Show the logged-in content
            } else {
                loggedOutContent.style.display = 'block'; // Show the logged-out content
                loggedInContent.style.display = 'none'; // Hide the logged-in content
            }
        })
        .catch(error => console.error('Error fetching login status:', error));
</script>


