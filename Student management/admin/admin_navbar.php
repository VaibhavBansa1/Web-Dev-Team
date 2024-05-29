<head>
    <style>
        

        /* for changing the background color of navbar-item on hover */
        .navbar-nav .nav-item:hover .nav-link {
            background-color: #e04747;
        } 
        .navbar .nav-item .dropdown-menu .dropdown-item:hover{
            background-color: #e04747;
            color:white;
        }
        @media screen and (min-width: 768px){

            .navbar .dropdown:hover .dropdown-menu {
                display: block;
            }
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin_home.php">Home</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="admin_home.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Student
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="students_detail.php">Students Data</a></li>
                            <li><a class="dropdown-item" href="adding_new_student.php">Add Student</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        </li>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Faculty
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="faculty_detail.php">Faculty Data</a></li>
                            <li><a class="dropdown-item" href="adding_new_faculty.php">Add Faculty</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="students_detail.php">Students Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adding_new_student.php">Add Student</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="faculty_detail.php">Faculty Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adding_new_faculty.php">Add Faculty</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="./preset.php">Presets</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </div>
</body>