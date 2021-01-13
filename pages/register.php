<!-- Page Content -->

<body>

    <section class="formRegister">
        <div class="container " style="height : 80vh;">
            <form method="POST" action="<?php echo baseURL('user/register') ?>">
                <h1>Register</h1>
                <hr>
                <?php
                if (!empty($alert)) {
                ?>
                    <div class="col-sm-12 text-white bg-warning">
                        <p><?php echo $alert; ?></p>
                    </div>
                <?php
                } ?>
                <div style="justify-content: center; align-items: center; height: 100vh;">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Fullname</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputName" name="fullname" placeholder="Fullname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-5">
                            <input type="phone" class="form-control" id="inputPhone" name="phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
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
