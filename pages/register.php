<!-- Page Content -->

<body>

    <section class="formRegister">
        <div class="container " style="height : 80vh;">
            <form method="POST" action="<?php echo baseURL('user/register') ?>">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <div style="justify-content: center; align-items: center; height: 100vh;">
                    <div class="form-group row">
                        <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="fullname" id="inputName3" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhone3" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="username" id="inputPhone3" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <hr>
                    <p>By creating an account you agree to our <a href="terms">Terms & Privacy</a>.</p>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <div class="container signin">
                        <p>Already have an account? <a href="login">Sign in</a>.</p>
                    </div>
                </div>
            </form>
        </div>
        </div>

    </section>


</body>

</body>