<div class="container">
    <div style="text-align:center">
        <div class="row h-100 justify-content-center align-items-center">

            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6">
                <h3>Student Registeration</h3>
                <form action="<?php echo base_url('register/student_register') ?>" method="post">
                    <div class="row mt-3">
                        <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputFirstName"
                                    placeholder="first name" name="fname">
                                <label for="floatingInputFirstName">First Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputLastName"
                                    placeholder="last name" name="lname">
                                <label for="floatingInputLastName">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="student id"
                            name="studentid">
                        <label for="floatingInput">Student Id</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="*****"
                            name="password">
                        <label for="floatingPassword">password</label>
                    </div>
                    <button class="btn btn-primary w-50 mb-4 mt-4" type="submit">
                        Register
                    </button>
                </form>
                <h6>Already have an account ? <span> <a href="<?php echo base_url('login/student') ?>">Login</a></span>
                </h6>
            </div>
        </div>
    </div>
</div>