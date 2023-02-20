<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('panel/logout') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>


<div class="gq-background">
    <div class="container d-flex justify-content-center align-items-center" style="height:80%">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 welcome-card p-5">
                <form action="" method="post">
                    <h4 class="pb-3 text-capitalize text-center">Choose Quiz</h4>
                    <div class="mb-3 ">
                        <label for="classCode" class="form-label">Class Code</label>
                        <input type="text" class="form-control" id="classCode" aria-describedby="batch name"
                            name="classCode">
                    </div>
                    <select id="selectedTest" class="form-select mb-3" name="quiz">
                        <option selected>Select Quiz</option>
                        <?php foreach($res as $result){ ?>
                        <option value='<?php echo $result['id'] ?>'><?php echo $result['testname'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="mb-3">
                        <label for="batchName" class="form-label">Player One Id</label>
                        <input type="text" class="form-control" id="batchName" aria-describedby="batch name"
                            id="batchName">
                    </div>
                    <div class="mb-3">
                        <label for="batchName" class="form-label">Player Two Id</label>
                        <input type="text" class="form-control" id="batchName" aria-describedby="batch name"
                            id="batchName">
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary <?php echo count($res) == 0 ? 'disabled' : '' ?>">
                            Create a Session
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- confirm modal -->
<div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirm</h5>
            </div>
            <div class="modal-body">
                Are you sure you want start the quiz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="startTest()">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    let loser = {
        a: 0,
        b: 0
    }


    localStorage.setItem('loser', JSON.stringify(loser))

    console.log('on start')

})

function startTest() {
    let val = $('#selectedTest').find(':selected').val()
    let batchName = $('#batchName').val()

    if (val != "Select Quiz" && batchName) {
        window.location.href = '<?php echo base_url('panel/quiz/') ?>' + val
    }


}

function showModal() {

    let val = $('#selectedTest').find(':selected').val()
    let batchName = $('#batchName').val()

    if (val != "Select Quiz" && batchName) {

        localStorage.setItem('batch', batchName)

        let elem = $('#confirmModal')
        let modal = new bootstrap.Modal(elem)
        modal.show()
    }



}
</script>