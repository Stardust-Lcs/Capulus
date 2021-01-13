<!-- Page Content -->

<body>
    <section class="formLogin">
        <div class="container" style="height: 80vh;">
            <form method="POST" action="<?php echo baseURL('user/login'); ?>">
                <h1>Login</h1>
                <hr>
                <?php
                if (!empty($alert)) {
                ?>
                    <div class="col-sm-12 text-white bg-warning">
                        <p><?php echo $alert; ?></p>
                    </div>
                <?php
                } ?>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
                <div class="container signin">
                    <p>Dont have the account? <a href="register">Register</a>.</p>
                </div>
            </form>
        </div>
    </section>

</body>
