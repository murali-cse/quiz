<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('panel/logout') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>


<div class="h-50 container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <h4 class="pb-3 text-capitalize text-center">Choose Quiz</h4>
            <div class="mb-3 ">
                <label for="batchName" class="form-label">Batch Name</label>
                <input type="text" class="form-control" id="batchName" aria-describedby="batch name" id="batchName">
            </div>
            <select id="selectedTest" class="form-select">
                <option selected>Select Quiz</option>
                <?php foreach($res as $result){ ?>
                <option value='<?php echo $result['id'] ?>'><?php echo $result['testname'] ?></option>
                <?php } ?>
            </select>
            <div class="text-center mt-4">
                <button class="btn btn-primary <?php echo count($res) == 0 ? 'disabled' : '' ?>" onclick="showModal()">
                    Begin Test
                </button>
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
function startTest() {
    let val = $('#selectedTest').find(':selected').val()
    let batchName = $('#batchName').val()

    if (val != "Select Test" && batchName) {
        window.location.href = '<?php echo base_url('panel/quiz/') ?>' + val
    }


}

function showModal() {

    let val = $('#selectedTest').find(':selected').val()
    let batchName = $('#batchName').val()

    if (val != "Select Test" && batchName) {

        localStorage.setItem('batch', batchName)

        let elem = $('#confirmModal')
        let modal = new bootstrap.Modal(elem)
        modal.show()
    }



}
</script>