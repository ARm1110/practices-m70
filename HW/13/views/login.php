<?php

use App\core\Application;

$emailError = Application::$app->validation->getFirstError('email');
$passwordError = Application::$app->validation->getFirstError('password');
$settingError = Application::$app->validation->getFirstError('setting');
?>

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="login" >
                                    <div class="form-floating mb-3">
                                        <input class="form-control  <?php echo !empty($emailError) ? 'is-invalid' : '' ?>" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                        <label for="inputEmail">Email address</label>
                                        <div id="invalid-feedback" class="<?php echo !empty($emailError) ? 'invalid-feedback' : '' ?>">
                                            <?php echo $emailError ?? ""; ?>
                                        </div>
                                    </div>
                                    <div class=" form-floating mb-3">
                                        <input class="form-control <?php echo !empty($passwordError) ? 'is-invalid' : '' ?>" id="inputPassword" type="password" name="password" placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                        <div id="invalid-feedback" class="<?php echo !empty($passwordError) ? 'invalid-feedback' : '' ?>">
                                            <?php echo $passwordError ?? ""; ?>
                                        </div>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input <?php echo !empty($settingError) ? 'is-invalid' : '' ?>" id="inputRememberPassword" type="checkbox" name="setting" value="on" />
                                        <label class="form-check-label <?php echo !empty($settingError) ? 'is-invalid' : '' ?>" for="inputRememberPassword">Remember Me</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="passwordForgets">Forgot Password?</a>
                                        <button class="btn btn-primary">Login</button>
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

</div>

<script script type="text/javascript">

</script>