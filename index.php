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
                    <label>First Name</label>
                    <input type="text" id="firstname" name="firstname">
                    <div class="error" id="firstnameError"></div>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" id="lastname" name="lastname">
                    <div class="error" id="lastnameError"></div>
                </div>
         
         

                <div class="form-group">
                    <label>Class Name</label>
                    <select name="classname" id="classname">
                        <option value="L5SOD">L5SOD</option>
                        <option value="L4SODA">L4SODA</option>
                        <option value="L4SODB">L4SODB</option>
                        <option value="L3SOD">L3SOD</option>
                        <option value="L5NET">L5NET</option>
                        <option value="L4NETA">L4NETA</option>
                        <option value="L4NETB">L4NETB</option>
                    </select>
                    <div class="error" id="classError"></div>
                </div>
                <div class="form-group">
                    <label>Sex</label>
                    <div class="gender-group">
                        <label>Male <input type="radio" name="sex" value="Male"></label>
                        <label>Female <input type="radio" name="sex" value="Female"></label>
                    </div>
                    <div class="error" id="genderError"></div>
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

            const firstname = document.getElementById("firstname").value.trim();
            const lastname = document.getElementById("lastname").value.trim();
            const firstnameError = document.getElementById("firstnameError");
            const lastnameError = document.getElementById("lastnameError");
            if (firstnamename === "") {
                firstnameError.textContent = "First Name is required!";
                isValid = false;
            } else if (!/^[A-Za-z\s]+$/.test(fullname)) {
                firstnameError.textContent = "Only letters and spaces allowed!";
                isValid = false;
            } else {
                firstnameError.textContent = "";
            }

            if (lastname === "") {
                lastnameError.textContent = "Last Name is required!";
                isValid = false;
            } else if (!/^[A-Za-z\s]+$/.test(fullname)) {
                lastnameError.textContent = "Only letters and spaces allowed!";
                isValid = false;
            } else {
                lastnameError.textContent = "";
            }


            const genderError = document.getElementById("genderError");
            const genderSelected = document.querySelector('input[name="sex"]:checked');
            if (!genderSelected) {
                genderError.textContent = "Please select a gender!";
                isValid = false;
            } else {
                genderError.textContent = "";
            }

            const classname = document.getElementById("classname").value;
            const classnameError = document.getElementById("classnameError");
            if (classname === "") {
               classnameError.textContent = "Please select a Classname!";
                isValid = false;
            } else {
            classnameError.textContent = "";
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>

</body>
</html>
