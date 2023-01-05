<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <button class="btn btn-outline-success" type="submit">Logout</button>
    </div>
</nav>

<div class="h-50 container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <h4 class="pb-3">Welcome Lokki !</h4>
            <select class="form-select">
                <option selected>Select Test</option>
                <option value="test1">Test 1</option>
                <option value="test2">Test 2</option>
            </select>
            <div class="text-center mt-4">
                <a href="<?php echo base_url('panel/student_test/1') ?>">
                    <button class="btn btn-primary">Begin Test</button>
                </a>
            </div>
        </div>
    </div>
</div>