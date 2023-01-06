<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('/') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>

<div class="container">
    <div class="row mt-5 mb-2">
        <div class="d-flex justify-content-between">
            <a href="<?php echo base_url('panel/admin') ?>" style="text-decoration:none">
                <button class="btn btn-secondary">
                    Back
                </button>
            </a>
            <a href="<?php echo base_url("panel/add_question/$id") ?>">
                <button class="btn btn-primary">
                    Add New Questions
                </button>
            </a>

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
        <?php 
            foreach($res as $result => $index ){
        ?>
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="card-title mt-2"><?php echo (int)($result+1).". ".$res[$result]['question'] ?></h3>
                    <div class="row mt-2 p-3">
                        <?php 

                            $options = json_decode($res[$result]['options']);
                            foreach($options as $option){ 
                        ?>
                        <div class="col-6">
                            <h6><?php echo $option ?></h6>
                        </div>
                        <?php } ?>
                        <div class="col-12">
                            <h6 class="mt-2">Correct ans is : <span
                                    style="color: green"><?php echo $res[$result]['correctans'] ?></span> </h6>
                        </div>
                    </div>
                    <!-- <div class="p-3">
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Remove</button>
                    </div> -->
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>