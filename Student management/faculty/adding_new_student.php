<?php
    session_start();
    if(!(isset($_SESSION['id']) && $_SESSION['user'] == 'faculty')){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Student</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body class="bg-success-subtle">
    <h1 class="text-center"><u>Add Student</u></h1><br>
    <div>

        <form class="row g-3 ms-5 me-5 mt-3 mb-5 border border-4 border-black fw-semibold">
            <div class="col-md-6">
              <label for="S_Name" class="form-label">Student Name</label>
              <input type="text" class="form-control" id="S_Name">
            </div>
            <div class="col-md-6">
              <label for="G_Name" class="form-label">Guardian Name</label>
              <input type="text" class="form-control" id="G_Name">
            </div>
            <div class="col-md-4">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" placeholder="Enter email">
              </div>
              <div class="col-md-4">
                <label for="Mobile" class="form-label">Mobile number</label>
                <input type="tel" class="form-control" id="Mobile">
              </div>
              <div class="col-md-4">
                <label for="G_Mobile" class="form-label">Guardian Mobile number</label>
                <input type="tel" class="form-control" id="Mobile">
              </div>
              <div class="col-md-4">
                <label for="DOB" class="form-label">DOB</label>
                <input type="date" class="form-control" id="Email">
              </div>
              <div class="col-md-4">
                <label for="Gender" class="form-label">Gender</label>
                <select id="inputState" class="form-select">
                  <option selected>Choose...</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="Blood_Group" class="form-label">Blood Group</label>
                <select id="Blood_Group" class="form-select">
                  <option selected>Choose...</option>
                  <option>A+</option>
                  <option>A-</option>
                  <option>B+</option>
                  <option>B-</option>
                  <option>AB+</option>
                  <option>AB-</option>
                  <option>O+</option>
                  <option>O-</option>
                </select>
              </div>
              <div class="col-12">
                  <label for="Address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="Address" placeholder="Enter address">
             </div>
             <div class="col-md-6">
               <label for="Branch" class="form-label">Branch</label>
               <select id="Branch" class="form-select">
                 <option selected>Choose...</option>
                 <option>Computer Science & Engineering(CSE)</option>
                 <option>Information Technology(IT)</option>
                 <option>Electrical Engineering(EE)</option>
                 <option>Mechanical Engieering(ME)</option>
                 <option>Civel Engineering(CE)</option>
                 <option>Hotel Management(HMCT)</option>
                 <option>Textile Engineering(TE)</option>
               </select>
             </div>
             <div class="col-md-6">
                <label for="Branch" class="form-label">Session</label>
                <select id="Branch" class="form-select">
                  <option selected>Choose...</option>
                  <option>2021-2024</option>
                  <option>2022-2025</option>
                  <option>2023-2026</option>
                  <option>2024-2027</option>
                  <option>2025-2028</option>
                  <option>2026-2029</option>
                  <option>2027-2030</option>
                  <option>2028-2031</option>
                  <option>2029-2032</option>
                  <option>2030-2033</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="Username" class="form-label">Roll number</label>
                <input type="text" class="form-control" id="Username">
              </div>
              <div class="col-md-6">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password">
              </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto mb-3 mt-3">Add Student</button>
            </div>
          </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    >
    </script>
  </body>
</html>
