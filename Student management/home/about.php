<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Logo.png" type="image/x-icon">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>-->
    
    <!--<div class="container-fluid text-center">
        <h1>About "STUDENT MANAGEMENT"</h1>
        <p>Welcome to "STUDENT MANAGEMENT", where college tasks get easier. Our website helps administrators, teachers, and students with their daily work.</p>
    </div>
    <div class="container-fluid text-center">
        <h1>What We Can Do</h1>
        <ul>Admin Control: Admins can easily manage teachers and students' information like adding, editing, or removing them.</ul>

        <ul>Faculty Tools: Teachers can handle student info too, like adding, editing, or removing them.</ul>

        <ul>Student Resources: Students can find helpful stuff like old test papers, timetables, and exam schedules.</ul>

        <ul>Forms and Docs: Admins and teachers can upload forms and docs for students to use.</ul>
    </div>
    <div class="container-fluid text-center">
        <h1>Why Pick Us</h1>
        <ul>Easy to Use: Our site is simple and easy to understand, so you can get things done quickly.</ul>
        <ul>Safe and Secure: We keep your info safe and follow all the rules to protect your privacy.</ul>
        <ul>Made for You: Whether your school is big or small, our website can be adjusted to fit your needs.</ul>
    </div>
    <div class="container-fluid text-center">
        <h1>Start Today</h1>
        <p>Join us and make college life simpler. Whether you're a teacher or a student, we've got what you need. Sign up now and see for yourself!</p>
    </div>
    <div class="container-fluid text-center">
        <h1></h1>
        <p></p>
    </div>
    <div class="container-fluid text-center">
        <h1></h1>
        <p></p>
    </div>
    
</body>

</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Logo.png" type="image/x-icon">

    <title>About Us - College Student Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* li{
            font-size:1.2rem;
        } */
        .box-shadow{
            box-shadow: inset -6px -5px #0c0c0c, -5px -5px 2px 5px #e04747;
        }
    </style>
</head>
<body>
<?php
    include '../main_nav.php';
    ?>
    <div class="border border-dark me-5 ms-5 mt-5 mb-5 box-shadow">
    <div class="container mt-5">
        <header class="text-center mb-4">
            <h1><u>About Us</u></h1>
        </header>
        <main>
            <section class="pt-5">
                <h2><u>Project Description</u></h2>
                <h3 class="pt-3">Title: College Student Management System</h3>
                <p class="fs-4 pt-2"><strong>Overview:</strong></p>
                <p class="fs-5">The College Student Management System is a web application designed to enhance the administrative and academic management within a college. The system provides distinct functionalities for three types of users: Admin, Faculty, and Student. The Admin has full control over managing faculty and students, the Faculty can manage student records, and the Students can access various academic resources.</p>
            </section>
            <hr>
            <section class="pt-5">
                <h2><u>Features</u></h2>
                <h3 class="pt-3">1. Admin Panel:</h3>
                <ul class="fs-5">
                    <li>Perform CRUD operations (Create, Read, Update, Delete) on Faculty members.</li>
                    <li>Perform CRUD operations on Student records.</li>
                    <li>Upload and manage important forms and documents.</li>
                </ul>
                <h3>2. Faculty Panel:</h3>
                <ul class="fs-5">
                    <li>Perform CRUD operations on Student records.</li>
                    <li>Upload and manage academic timetables, and exam schedules.</li>
                </ul>
                <h3>3. Student Panel:</h3>
                <ul class="fs-5">
                    <li>Access previous year question papers.</li>
                    <li>View academic timetables and exam schedules.</li>
                    <li>Access and download forms and documents uploaded by Admin and Faculty.</li>
                </ul>
            </section>
            <hr>
            <section class="pt-5">
                <h2><u>Team Contributions</u></h2>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <h3>Aman - Frontend Designing</h3>
                    </div>
                    <div class="col-md-6">
                        <h3>Sivam - Backend Development and Planning</h3>
                    </div>
                </div>
                <div class="row pt-3">
                    

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Raj Shivhare - Hosting on AWS Cloud</h3>
                        <ul class="fs-5">
                            <li>Deployed the application on AWS Cloud for reliable and scalable access.</li>
                            <li>Managed server configurations to ensure secure and efficient hosting.</li>
                            <li>Utilized various cloud services to optimize performance and reliability.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3>Vaibhav Bansal - Backend Development and Database Management</h3>
                        <ul class="fs-5">
                            <li>Collaborated on backend development alongside Sivam.</li>
                            <li>Designed and managed the database schema using MySQL.</li>
                            <li>Ensured efficient data handling, storage, and retrieval.</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Keshav Rajpoot - Frontend Development and Database Management</h3>
                        <ul class="fs-5">
                            <li>Assisted in frontend design and development, ensuring consistency and functionality.</li>
                            <li>Collaborated on database management and integration.</li>
                            <li>Linked frontend and backend services to ensure smooth data operations.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <hr>
            <section class="pt-5">
                <h2><u>Technologies Used</u></h2>
                <ul class="pt-3 fs-5">
                    <li><strong>Frontend:</strong> HTML, CSS, JavaScript, Bootstrap</li>
                    <li><strong>Backend:</strong> PHP</li>
                    <li><strong>Database:</strong> MySQL</li>
                    <li><strong>Hosting:</strong> AWS Cloud</li>
                </ul>
            </section>
        </main>
    </div>
    </div>
        <?php
            include "../footer.php";
        ?>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>