<head>
    <style>
        .navbar-nav .nav-item:hover .nav-link {
            background-color: #e04747;
        } 
        .navbar .nav-item .dropdown-menu .dropdown-item:hover{
            background-color: #e04747;
            color:white;
        }
        @media screen and (min-width: 768px){
            .navbar .nav-item:hover .dropdown-menu {
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
                        
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="student_home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Exam
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><b>Exam</b></li><hr>
                                <li><a class="dropdown-item" href="exam_time_table.php">Time tables</a></li>
                                <li><a class="dropdown-item" href="old_exam_papers.php">Old Papers</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Resources
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <!-- Multi-column layout -->
                                <div class="row">
                                    <!-- First Column -->
                                    <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="dropdown-item"><b>Forms</b></li><hr>
                                        <li><a class="dropdown-item" href="#">Admision Form</a></li>
                                        <li><a class="dropdown-item" href="#">Scolership Form</a></li>
                                        <li><a class="dropdown-item" href="../exam_form.pdf">Exam Form</a></li>
                                        <!-- More items -->
                                    </ul>
                                    </div>
                                    <!-- Second Column -->
                                    <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="dropdown-item"><b>Library</b></li><hr>
                                        <li><a class="dropdown-item" href="#">Learning Material</a></li>
                                        <li><a class="dropdown-item" href="#">Available Books</a></li>
                                        <!-- More items -->
                                    </ul>
                                    </div>
                                    
                                </div>
                            </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="profile.php">Other Activities</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="#">Edit Student Data</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="profile.php">Profile</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>