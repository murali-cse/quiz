<div class="container">
    <div style="text-align:center">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <h3>Student Login</h3>
                <form action="<?php echo base_url('register/student_login') ?>" method="post">
                    <div class="form-floating mb-3 mt-4">
                        <input type="text" class="form-control" id="floatingInput" placeholder="studentid"
                            name="studentid">
                        <label for="floatingInput">Student Id</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="*****"
                            name="password">
                        <label for="floatingPassword">password</label>
                    </div>
                    <div class="alert alert-danger" role="alert"
                        style="display:<?php echo $this->session->flashdata('error') ? 'block' : 'none'?>">
                        <?php 
                            echo $this->session->flashdata('message');
                        ?>
                    </div>
                    <button class="btn btn-primary w-50 mb-4 mt-4" type="submit">
                        Login
                    </button>
                </form>

                <h6>Need an account ? <span> <a href="<?php echo base_url('register/student') ?>">Register</a></span>
                </h6>
            </div>
        </div>
    </div>
</div>