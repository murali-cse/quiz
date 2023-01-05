<div class="container">
    <div style="text-align:center">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <h3>Student Login</h3>
                <div class="form-floating mb-3 mt-4">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Student Id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="*****">
                    <label for="floatingPassword">password</label>
                </div>
                <a href="<?php echo base_url('panel/student') ?>">
                    <button class="btn btn-primary w-50 mb-4 mt-4" type="submit">
                        Login
                    </button>
                </a>
                <h6>Need an account ? <span> <a href="<?php echo base_url('register/student') ?>">Register</a></span>
                </h6>
            </div>
        </div>
    </div>
</div>