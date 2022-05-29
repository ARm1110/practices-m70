 <?php

    use App\core\Application;

    $firstNameError = Application::$app->validation->getFirstError('firstName');
    $lastNameError = Application::$app->validation->getFirstError('lastName');
    $emailError = Application::$app->validation->getFirstError('email');
    $passwordError = Application::$app->validation->getFirstError('password');
    $confirmPassword = Application::$app->validation->getFirstError('confirmPassword');
    $roleError = Application::$app->validation->getFirstError('role');
    ?>




 <div id="layoutAuthentication">
     <div id="layoutAuthentication_content">
         <main>
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-lg-7">
                         <div class="card shadow-lg border-0 rounded-lg mt-5">
                             <div class="card-header">
                                 <h3 class="text-center font-weight-light my-4">Create Account</h3>
                             </div>
                             <div class="card-body">
                                 <form method="POST" name="registerForm" action="" onsubmit="return validateForm()">
                                     <div class="row mb-3">
                                         <div class="col-md-6">
                                             <div class="form-floating mb-3 mb-md-0">
                                                 <input class="form-control <?php echo !empty($firstNameError) ? 'is-invalid' : '' ?>  " id="inputFirstName" name="firstName" type="text" placeholder="Enter your first name" onkeypress=" ValidateFirstName();" />
                                                 <label for="inputFirstName">First name</label>
                                                 <div id="validate_firstName" class="<?php echo !empty($firstNameError) ? 'invalid-feedback' : '' ?>">
                                                     <?php echo $firstNameError ?? ""; ?>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input class="form-control <?php echo !empty($lastNameError) ? 'is-invalid' : '' ?>  " id="inputLastName" type="text" name="lastName" onkeypress=" ValidateLastName();" placeholder=" Enter your last name" />
                                                 <label for="inputLastName">Last name</label>
                                                 <div id="validate_lastName" class="<?php echo !empty($lastNameError) ? 'invalid-feedback' : '' ?>">
                                                     <?php echo $lastNameError ?? ""; ?>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="input-group mb-3">
                                             <label class="input-group-text" for="inputGroupSelect01">Role</label>
                                             <select class="form-select <?php echo !empty($roleError) ? 'is-invalid' : '' ?>" id="inputGroupSelect01" name="role">
                                                 <option value="Role">Role...</option>
                                                 <option value="doctor">Doctor</option>
                                                 <option value="management">Management</option>
                                                 <option value="Users">Users</option>
                                             </select>
                                             <div id="invalid-feedback" class="<?php echo !empty($roleError) ? 'invalid-feedback' : '' ?> ">
                                                 <?php echo $roleError ?? ""; ?>
                                             </div>
                                         </div>

                                     </div>
                                     <div class="form-floating mb-3">
                                         <input class="form-control <?php echo !empty($emailError) ? 'is-invalid' : '' ?>  " id="inputEmail" type="email" name="email" placeholder="name@example.com" onkeypress="ValidateEmail(this);" />
                                         <label for="inputEmail">Email address</label>
                                         <div id="invalid-email" class="<?php echo !empty($emailError) ? 'invalid-feedback' : '' ?>">
                                             <?php echo $emailError ?? ""; ?>
                                         </div>
                                     </div>
                                     <div class="row mb-3">
                                         <div class="col-md-6">
                                             <div class="form-floating mb-3 mb-md-0">
                                                 <input class="form-control <?php echo !empty($passwordError) ? 'is-invalid' : '' ?>" id="inputPassword" name="password" onkeypress="ValidatePassword1(this);" type="password" placeholder="Create a password" />
                                                 <label for="inputPassword">Password</label>
                                                 <div id="invalid-pass1" class="<?php echo !empty($passwordError) ? 'invalid-feedback' : '' ?>">
                                                     <?php echo $passwordError ?? ""; ?>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating mb-3 mb-md-0">
                                                 <input class="form-control <?php echo !empty($confirmPassword) ? 'is-invalid' : '' ?>" id="inputPasswordConfirm" onkeypress="ValidatePassword2(this);" type="password" name="confirmPassword" placeholder="Confirm password" />
                                                 <label for="inputPasswordConfirm">Confirm Password</label>
                                                 <div id="invalid-pass2" class="<?php echo !empty($confirmPassword) ? 'invalid-feedback' : '' ?>">
                                                     <?php echo $confirmPassword ?? ""; ?>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="mt-4 mb-0">
                                         <div class="d-grid"><input type="submit" name="submit" id="submit" value="Create Account" class="btn btn-primary btn-block"></div>
                                     </div>
                                 </form>
                             </div>
                             <div class="card-footer text-center py-3">
                                 <div class="small"><a href="/login">Have an account? Go to login</a></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </main>
     </div>

 </div>

 <script>
     function ValidateEmail(inputEmail) {
         var inputEmails = document.getElementById("inputEmail").value;
         if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(inputEmails)) {
             document.getElementById("inputEmail").classList.remove("is-invalid");
             document.getElementById("inputEmail").classList.add("is-valid");

             document.getElementById("invalid-email").classList.remove("invalid-feedback");
             document.getElementById("invalid-email").classList.add("valid-feedback");
             document.getElementById("invalid-email").innerHTML = "Look Good";
         } else {
             document.getElementById("inputEmail").classList.add("is-invalid");

             document.getElementById("invalid-email").classList.add("invalid-feedback");
             document.getElementById("invalid-email").innerHTML = "Please choose a valid email.";
         }

     }

     function ValidateLastName(inputLastName) {
         var inputLastName = document.getElementById("inputLastName").value;
         if (/^[a-z]{3,32}$/.test(inputLastName)) {
             document.getElementById("inputLastName").classList.remove("is-invalid");
             document.getElementById("inputLastName").classList.add("is-valid");

             document.getElementById("validate_lastName").classList.remove("invalid-feedback");
             document.getElementById("validate_lastName").classList.add("valid-feedback");
             document.getElementById("validate_lastName").innerHTML = "Look Good";
         } else {
             document.getElementById("inputLastName").classList.add("is-invalid");

             document.getElementById("validate_lastName").classList.add("invalid-feedback");
             document.getElementById("validate_lastName").innerHTML = "Please choose a Last name.";
         }
     }

     function ValidateFirstName(inputFirstName) {
         var inputFirstName = document.getElementById("inputFirstName").value;
         if (/^[a-z]{3,32}$/.test(inputFirstName)) {
             document.getElementById("inputFirstName").classList.remove("is-invalid");
             document.getElementById("inputFirstName").classList.add("is-valid");

             document.getElementById("validate_firstName").classList.remove("invalid-feedback");
             document.getElementById("validate_firstName").classList.add("valid-feedback");
             document.getElementById("validate_firstName").innerHTML = "Look Good";
         } else {
             document.getElementById("inputFirstName").classList.add("is-invalid");

             document.getElementById("validate_firstName").classList.add("invalid-feedback");
             document.getElementById("validate_firstName").innerHTML = "Please choose a First name.";
         }
     }

     function ValidatePassword1(inputPassword) {
         var inputPassword = document.getElementById("inputPassword").value;;
         if (/^[A-Za-z\d]{8,}$/.test(inputPassword)) {
             document.getElementById("inputPassword").classList.remove("is-invalid");
             document.getElementById("inputPassword").classList.add("is-valid");

             document.getElementById("invalid-pass1").classList.remove("invalid-feedback");
             document.getElementById("invalid-pass1").classList.add("valid-feedback");
             document.getElementById("invalid-pass1").innerHTML = "strong password";
         } else {
             document.getElementById("inputPassword").classList.add("is-invalid");

             document.getElementById("invalid-pass1").classList.add("invalid-feedback");
             document.getElementById("invalid-pass1").innerHTML = "very poor";
         }
     }

     function ValidatePassword2(inputPasswordConfirm) {
         var inputPasswordConfirm = document.getElementById("inputPasswordConfirm").value;
         var inputPassword = document.getElementById("inputPassword").value;
         if (/^[A-Za-z\d]{8,}$/.test(inputPasswordConfirm)) {
             document.getElementById("inputPasswordConfirm").classList.remove("is-invalid");
             document.getElementById("inputPasswordConfirm").classList.add("is-valid");


             document.getElementById("invalid-pass2").classList.remove("invalid-feedback");
             document.getElementById("invalid-pass2").classList.add("valid-feedback");
             document.getElementById("invalid-pass2").innerHTML = "strong password";
         } else {
             document.getElementById("inputPasswordConfirm").classList.add("is-invalid");

             document.getElementById("invalid-pass2").classList.add("invalid-feedback");
             document.getElementById("invalid-pass2").innerHTML = "very poor";
         }
         if (inputPasswordConfirm == inputPassword) {

             document.getElementById("inputPasswordConfirm").classList.remove("is-invalid");
             document.getElementById("inputPasswordConfirm").classList.add("is-valid");

             document.getElementById("invalid-pass2").classList.remove("invalid-feedback");
             document.getElementById("invalid-pass2").classList.add("valid-feedback");
             document.getElementById("invalid-pass2").innerHTML = "Password Match";
         } else {
             document.getElementById("inputPasswordConfirm").classList.remove("is-valid");
             document.getElementById("inputPasswordConfirm").classList.add("is-invalid");

             document.getElementById("invalid-pass2").classList.add("invalid-feedback");
             document.getElementById("invalid-pass2").innerHTML = "Password Not Match";


         }
     }
     

 </script>