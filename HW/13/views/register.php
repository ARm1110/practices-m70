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
                                  <form method="POST" name="registerForm" action="" >
                                      <div class="row mb-3">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3 mb-md-0">
                                                  <input class="form-control "id="inputFirstName" name="firstName" type="text" placeholder="Enter your first name" />
                                                  <label for="inputFirstName">First name</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating">
                                                  <input class="form-control" id="inputLastName" type="text" name="lastName" placeholder=" Enter your last name" />
                                                  <label for="inputLastName">Last name</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="input-group mb-3">
                                              <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                              <select class="form-select" id="inputGroupSelect01" name="role">
                                                  <option disabled>Role...</option>
                                                  <option value="Doctor">Doctor</option>
                                                  <option value="Management">Management</option>
                                                  <option value="Users" selected>Users</option>
                                              </select>
                                          </div>

                                      </div>
                                      <div class="form-floating mb-3">
                                          <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                          <label for="inputEmail">Email address</label>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3 mb-md-0">
                                                  <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" />
                                                  <label for="inputPassword">Password</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3 mb-md-0">
                                                  <input class="form-control" id="inputPasswordConfirm" type="password" name="confirmPassword" placeholder="Confirm password" />
                                                  <label for="inputPasswordConfirm">Confirm Password</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-4 mb-0">
                                          <div class="d-grid"><input type="submit" name="submit" value="Create Account" class="btn btn-primary btn-block"></div>
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
