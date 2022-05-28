<?php

use App\core\Application;

$emailError = Application::$app->validation->getFirstError('email');
$roleError = Application::$app->validation->getFirstError('setting');
?>


<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                            </div>
                            <div class="card-body">
                                <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                                <form action="/passwordForgets" method="POST">
                                    <div class="form-floating mb-3">
                                        <input class="form-control  <?php echo !empty($emailError) ? 'is-invalid' : '' ?>" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                        <label for="inputEmail">Email address</label>
                                        <div id="invalid-feedback" class="<?php echo !empty($emailError) ? 'invalid-feedback' : '' ?>">
                                            <?php echo $emailError ?? ""; ?>
                                        </div>
                                    </div>
                                    <select class="form-select <?php echo !empty($roleError) ? 'is-invalid' : '' ?>" id="inputGroupSelect01" name="role">
                                        <option value="Role">Role...</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="management">Management</option>
                                        <option value="Users">Users</option>
                                    </select>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="/login">Return to login</a>
                                        <input class="btn btn-primary" type="submit" value="Reset Password">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="/register">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>