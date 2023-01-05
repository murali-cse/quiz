<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Test</span>
        <a href="<?php echo base_url('/') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>

<div class="container">
    <div class="row mt-5 mb-2">
        <div class="d-flex justify-content-between">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>
                <h4>1. What is react ?</h4>
                <div class='row mt-4'>
                    <?php 
                        $options = ['option1', 'option2', 'option3', 'option4'];
                        foreach($options as $option=>$index){
                    ?>
                    <div class="col-lg-3 col-md-3  mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault<?php echo $option ?>">
                            <label class="form-check-label" for="flexRadioDefault<?php echo $option ?>">
                                <?php echo $options[$option] ?>
                            </label>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button class="btn btn-primary w-25 ">
                SUBMIT
            </button>
        </div>
    </div>
</div>