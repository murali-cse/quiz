<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('panel/logout') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>


<div class="gq-background">
    <div class="container d-flex justify-content-center align-items-center" style="height:100%">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 welcome-card p-4">
                <form action="<?= base_url('game/add_game') ?>" method="post">
                    <h4 class="pb-3 text-capitalize text-center">Choose Quiz</h4>
                    <div class="mb-3 ">
                        <label for="classCode" class="form-label">Class Code</label>
                        <input type="text" class="form-control" id="classCode" aria-describedby="batch name"
                            name="classCode" required>
                    </div>
                    <select id="selectedTest" class="form-select mb-3" name="quiz" style="width:30rem">
                        <option selected>Select Quiz</option>
                        <?php foreach($res as $result){ ?>
                        <option value='<?php echo $result['id'] ?>'><?php echo $result['testname'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="mb-3">
                        <label for="batchName" class="form-label">Player One Id</label>
                        <input type="text" class="form-control" aria-describedby="player one id" name="playerOne"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="batchName" class="form-label">Player Two Id</label>
                        <input type="text" class="form-control" id="playerTwo" aria-describedby="player two id"
                            name="playerTwo" required>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary <?php echo count($res) == 0 ? 'disabled' : '' ?>">
                            Create a Session
                        </button>
                        <a href="<?= base_url('panel') ?>" class="btn btn-primary">Back</a>
                    </div>
                </form>
            </div>
            <?php 
                if($this->session->flashdata('message') === 'success' ){
            ?>
            <div role="alert" class="alert alert-success">
                New Session Added
            </div>
            <?php } else if($this->session->flashdata('message')=== 'already_exists') { ?>
            <div role="alert" class="alert alert-success">
                Class code already exists
            </div>
            <?php } else { ?>
            <div role="alert"
                class="alert alert-success <?php echo $this->session->flashdata('message') === 'error' ? 'd-block' : 'd-none' ?>">
                Something went wrong. Please try again later.
            </div>
            <?php } ?>
        </div>
    </div>
</div>



<script>
// $(document).ready(function() {

//     let loser = {
//         a: 0,
//         b: 0
//     }


//     localStorage.setItem('loser', JSON.stringify(loser))

//     console.log('on start')

// })

// function startTest() {
//     let val = $('#selectedTest').find(':selected').val()
//     let batchName = $('#batchName').val()

//     if (val != "Select Quiz" && batchName) {
//         window.location.href = '<?php echo base_url('panel/quiz/') ?>' + val
//     }


// }
</script>