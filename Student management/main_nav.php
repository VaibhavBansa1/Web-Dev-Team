<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="z-index:100;background-color: #2c73ab;">
        <div class="container" style="background-color: #2c73ab;">
            <!-- <a class="navbar-brand text-primary" href="#">Dr.BR.Ambedkar polytechnic college Gwalior</a> -->
            <button class="navbar-toggler bg-primary bg-gradient" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../home">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            login as
                        </a>
                        <ul class="dropdown-menu" style="background-color: #99d2e5;">
                            <li><a class="dropdown-item" href="../student/">Student</a></li>
                            <li><a class="dropdown-item" href="../faculty/">Faculty</a></li>
                            <li><a class="dropdown-item" href="../admin/">Admin</a></li>
                        </ul>
                    </li>
                    <?php
                    session_status();
                    if(isset($_SESSION['id'])) {
                        include('logout_btn.php');
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>