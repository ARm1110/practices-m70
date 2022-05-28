<?php
if (
    isset($_GET["token"]) && isset($_GET["email"]) && isset($_GET['role'])
) {
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
                                    <form method="POST" action="reset-pass">
                                        <div class=" form-floating mb-3">
                                            <input class="form-control " id="inputPassword" type="password" name="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>

                                        </div>
                                        <div class=" form-floating mb-3">
                                            <input class="form-control " id="confirmPassword" type="password" name="confirmPassword" placeholder="confirmPassword" />
                                            <label for="confirmPassword">Password Confirm</label>

                                        </div>
                                        <input type="hidden" name="role" value="<?php echo $_GET['role']; ?>" />
                                        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" />
                                        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>" />
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary">send me</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
<?php } else { ?>
    <div class="position-absolute top-0 mt-5 start-50 translate-middle">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p><strong> Access denied :(</strong></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php } ?>