<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('/') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>

<div class="container">

    <?php print_r($res) ?>

    <div class="row mt-5 mb-2">
        <div class="d-flex justify-content-between">
            <a href="<?php echo base_url('panel/admin') ?>" style="text-decoration:none">
                <button class="btn btn-secondary">
                    Back
                </button>
            </a>
            <button class="btn btn-primary">
                Add New Questions
            </button>
        </div>
    </div>
    <?php 
        if(count($res) == 0){
    ?>
    <div class="h-50 d-flex align-items-center justify-content-center">
        <h5>No Questions Available</h5>
    </div>
    <?php } else { ?>
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="card-title mt-2">1. What is react?</h3>
                    <div class="row mt-2 p-3">
                        <div class="col-6">
                            <h6>Option 1</h6>
                        </div>
                        <div class="col-6">
                            <h6>Option 2</h6>
                        </div>
                        <div class="col-6">
                            <h6>Option 3</h6>
                        </div>
                        <div class="col-6">
                            <h6>Option 4</h6>
                        </div>
                        <div class="col-12">
                            <h6 class="mt-2">Correct ans is : <span style="color: green">option 1</span> </h6>
                        </div>
                    </div>
                    <div class="p-3">
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>