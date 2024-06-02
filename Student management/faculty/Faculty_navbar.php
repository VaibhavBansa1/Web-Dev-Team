<head>
    <style>
        /* for changing the background color of navbar-item on hover */
        .navbar-nav .nav-item:hover .nav-link {
            background-color: #e04747;
        }

        .navbar .nav-item .dropdown-menu .dropdown-item:hover {
            background-color: #e04747;
            color: white;
        }

        @media screen and (min-width: 768px) {

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
                            <a class="nav-link active" aria-current="page" href="../faculty/Faculty_home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../faculty/students_detail.php">Students Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../faculty/adding_new_student.php">Add Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Links
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <!-- Multi-column layout -->
                                <div class="row">
                                    <!-- First Column -->
                                    <div class="col-md-7">
                                        <ul class="list-unstyled">
                                            <li class="dropdown-item"><b>Exam</b></li>
                                            <hr>
                                            <li><a class="dropdown-item" href="../student/exam_time_table.php">Exam Time Tables</a>
                                            </li>
                                            <li><a class="dropdown-item" href="../student/old_exam_papers.php">RGPV DIploma
                                                    Papers</a></li>
                                            <!-- More items -->
                                        </ul>
                                    </div>
                                    <!-- Second Column -->
                                    <div class="col-md-5">
                                        <ul class="list-unstyled">
                                            <li class="dropdown-item"><b>Extra</b></li>
                                            <hr>
                                            <li><a class="dropdown-item" href="../student/time_table.php">Time Table</a></li>
                                            <!-- More items -->
                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Resources
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <!-- Multi-column layout -->
                                <div class="row">
                                    <!-- First Column -->
                                    <ul class="list-unstyled">
                                        <li class="dropdown-item"><b>Forms</b></li>
                                        <hr>
                                        <li><a class="dropdown-item" href="../exam_form.pdf" target="_blank">Exam
                                                Form</a></li>
                                        <li><a class="dropdown-item"
                                                href="https://www.polygwalior.ac.in/file/prov_addmision.pdf"
                                                target="_blank">Provisional Admission Form</a></li>
                                        <li><a class="dropdown-item"
                                                href="https://www.polygwalior.ac.in/file/diploma_application.pdf"
                                                target="_blank">Application to get Diploma</a></li>
                                        <li><a class="dropdown-item"
                                                href="https://www.polygwalior.ac.in/file/challan_college.pdf"
                                                target="_blank">Challan for College Fees</a></li>
                                        <li><a class="dropdown-item"
                                                href="https://www.polygwalior.ac.in/file/TC_Form.pdf"
                                                target="_blank">Application to get Transfer Certificate (T.C.)</a></li>
                                        <!-- More items -->
                                    </ul>
                                    <!-- Second Column -->
                                    <!-- <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li class="dropdown-item"><b>Library</b></li>
                                            <hr>
                                            <li><a class="dropdown-item" href="#">Learning Material</a></li>
                                            <li><a class="dropdown-item" href="#">Available Books</a></li>
                                            More items
                                        </ul>
                                    </div> -->

                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../file_upload/index.php">Upload PYQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../faculty/profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>