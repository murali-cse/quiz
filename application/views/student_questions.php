<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Test</span>
        <a href="<?php echo base_url('panel/logout') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>

<div class='solo-background'>
    <div class="container h-100 ">
        <div class="row pt-5 mb-2">
            <div class="d-flex justify-content-between">
            </div>
        </div>
        <div class="row welcome-card p-5">
            <form action="<?php echo base_url('panel/student_ans/'.$id) ?>" method="post" id="questform">
                <?php foreach($res as $result => $index ){ ?>
                <div class="col-12 mb-5">
                    <div>
                        <h4><?php echo (int)($result+1).". ".$res[$result]['question'] ?></h4>
                        <div class='row mt-3'>
                            <?php 
                                $options = json_decode($res[$result]['options']);
                                foreach($options as $option=>$index){
                            ?>
                            <div class="col-lg-3 col-md-3  mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        name="<?php echo $res[$result]['id'] ?>"
                                        id="flexRadioDefault<?php echo $option."-".$result ?>"
                                        value="<?php echo $options[$option] ?>">
                                    <label class="form-check-label" for="flexRadioDefault<?php echo $option ?>">
                                        <?php echo $options[$option] ?>
                                    </label>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-primary w-25">
                        SUBMIT
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- confirm modal -->
<div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Warning</h5>
            </div>
            <div class="modal-body">
                Are you sure? Do you want to complete the test?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="submit()">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    window.history.pushState({}, '', '<?php echo base_url('panel/student') ?>')

    $('#questform').on('submit', function(e) {
        e.preventDefault();
        showModal();
        // this.submit();
    })
})

function showModal() {
    var elem = document.getElementById("confirmModal")
    let modal = new bootstrap.Modal(elem)
    modal.show()
}

function submit() {
    var elem = document.getElementById("confirmModal")
    let modal = bootstrap.Modal.getInstance(elem)
    modal.hide()
    $('#questform').off('submit');
    $('#questform').submit();
}
</script>