
    <style>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg Nav-bar" style="z-index:100;background-color: #e04747;">
        <div class="container-fluid">
            <div>
                <img src="../Logo.png" alt="" style="width:50px; height:50px;">
            </div>
            <!-- <a class="navbar-brand text-primary" href="#">Dr.BR.Ambedkar polytechnic college Gwalior</a> -->
            <button class="navbar-toggler bg-gradient" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../home"><span class="text-white"><b>Home</b></span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-white"><b>login as</b></span>
                        </a>
                        <ul class="dropdown-menu" style="background-color: #fdc4c3;">
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