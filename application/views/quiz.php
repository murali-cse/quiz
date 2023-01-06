<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('panel/logout') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>

<div class="container">
    <div class="row mt-5">
        <div class="col-8">
            <h6 class="mb-1"><?php echo ($current_quest+1) ?>. Question</h6>
            <h3 class="mb-5"><?php echo $res['question'] ?></h3>
            <h6>Options</h6>
            <form action="<?php echo base_url("panel/quiz/$id/$current_quest") ?>" method="post">
                <div class="row">
                    <?php
                        $options = json_decode($res['options']);
                        foreach($options as $option){
                    ?>
                    <div class="col-3">
                        <input type="radio" class="btn-check" name="answer" id="primary-outlined<?php echo $option ?>"
                            value="<?php echo $option ?>" autocomplete="off">
                        <label class="btn btn-outline-success w-100"
                            for="primary-outlined<?php echo $option ?>"><?php echo $option ?></label>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-5">
                    <h6 id="turns">Team <?php echo $this->session->userdata('winner') ?> Turns...</h6>
                </div>
                <div class="d-flex gap-3 mt-3">
                    <button type="button" class="btn btn-primary" onclick="checkAnswer()">Submit</button>
                    <button class="btn btn-success">Next Question</button>
                </div>
            </form>

        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Q No</th>
                            <th>A</th>
                            <th>B</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tose" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo base_url('panel/add_test') ?>" method="post">
                <div class="modal-body text-center">
                    <iframe src="https://embed.lottiefiles.com/animation/129053" class="h-100"></iframe>
                    <h4>Toss winner is <?php echo $this->session->userdata('winner'); ?></h4>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Wrong Ans Modal -->
<div class="modal fade" id="wrongans" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <iframe src="https://embed.lottiefiles.com/animation/96556"></iframe>
                <h4>Wrong Answer</h4>
            </div>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {

    let elem = $('#tose')
    let modal = new bootstrap.Modal(elem)
    modal.show()

})

function wrongAnswer() {
    let elem = $('#wrongans')
    let modal = new bootstrap.Modal(elem)
    modal.show()
}

function checkAnswer() {
    let val = $(':radio:checked').val();

    let data = {
        testid: '<?php echo $res['testid'] ?>',
        id: '<?php echo $res['id'] ?>',
        ans: val
    }

    $.post('<?php echo base_url('panel/check_answer') ?>', data, function(data, status) {
        if (data == 0) {
            $('#turns').text('<?php echo "Team ".$_SESSION['winner']." turns..." ?>')
            wrongAnswer();
        }
    })
}
</script>