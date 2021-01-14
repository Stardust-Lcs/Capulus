<!-- Page Content -->

<body>

    <section class="formRegister">
        <div class="container " style="height : 80vh;">
            <form method="POST" enctype="multipart/form-data" action="<?php echo baseURL('cafe/register') ?>">
                <h1>Register Cafe</h1>
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
                        <label for="inputName" class="col-sm-2 col-form-label">Cafe's Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Cafe's Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" id="inputPhoto" name="photo" placeholder="Photo">
                        </div>
                    </div>
                    <hr>
                    <p>By creating cafe you agree to our <a href="terms">Terms & Privacy</a>.</p>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>

    </section>


</body>

</body>
