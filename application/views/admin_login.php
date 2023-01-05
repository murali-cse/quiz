<div class="container">
    <div style="text-align:center">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <h3>Admin Login</h3>
                <form action="<?php echo base_url('register/admin_login') ?>" method="post">
                    <div class="form-floating mb-3 mt-4">
                        <input type="email" class="form-control" id="floatingInput" name="email"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="pass"
                            placeholder="*****">
                        <label for="floatingPassword">password</label>
                    </div>
                    <div class="alert alert-danger" role="alert"
                        style="display:<?php echo $this->session->flashdata('login_alert')== true ? 'block' : 'none' ?>">
                        <?php echo $this->session->flashdata('adminlogin') ?>
                    </div>
                    <button class="btn btn-primary w-50 mb-4 mt-4" type="submit">
                        Login
                    </button>
                </form>

                <h6>Need an account ? <span> <a href="<?php echo base_url('register/admin') ?>">Register</a></span>
                </h6>
            </div>
        </div>
    </div>
</div>