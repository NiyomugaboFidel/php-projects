<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - GS Kagugu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">GS Kagugu</div>
        <ul class="nav-links">
            <li><a href="index.php">Register</a></li>
            <li><a href="view_students.php">View Students</a></li>
          
        </ul>
    </nav>

   <main class="container">
   <div class="container2">
        <div class="form-container">
            <div class="form-header">Register here!</div>
            <form action="register.php" method="POST" id="registrationForm">
                <div class="form-group">
                    <label>Full Names</label>
                    <input type="text" id="fullname" name="fullname">
                    <div class="error" id="nameError"></div>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="gender-group">
                        <label>Male <input type="radio" name="gender" value="Male"></label>
                        <label>Female <input type="radio" name="gender" value="Female"></label>
                    </div>
                    <div class="error" id="genderError"></div>
                </div>

                <div class="form-group">
                    <label>Combination</label>
                    <select name="combination" id="combination">
                        <option value="Computer Science">Computer Science</option>
                        <option value="MPG">MPG</option>
                        <option value="PCB">PCB</option>
                        <option value="MCB">MCB</option>
                        <option value="HEG">HEG</option>
                        <option value="LKK">LKK</option>
                        <option value="MEC">MEC</option>
                    </select>
                    <div class="error" id="combinationError"></div>
                </div>

                <div class="form-group btn">
                    <label></label>
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>

   </main>

 
    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            let isValid = true;

            const fullname = document.getElementById("fullname").value.trim();
            const nameError = document.getElementById("nameError");
            if (fullname === "") {
                nameError.textContent = "Full Name is required!";
                isValid = false;
            } else if (!/^[A-Za-z\s]+$/.test(fullname)) {
                nameError.textContent = "Only letters and spaces allowed!";
                isValid = false;
            } else {
                nameError.textContent = "";
            }

            const genderError = document.getElementById("genderError");
            const genderSelected = document.querySelector('input[name="gender"]:checked');
            if (!genderSelected) {
                genderError.textContent = "Please select a gender!";
                isValid = false;
            } else {
                genderError.textContent = "";
            }

            const combination = document.getElementById("combination").value;
            const combinationError = document.getElementById("combinationError");
            if (combination === "") {
                combinationError.textContent = "Please select a combination!";
                isValid = false;
            } else {
                combinationError.textContent = "";
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>

</body>
</html>
