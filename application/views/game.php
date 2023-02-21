<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('panel/logout') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>

<div class="gq-background">
    <div class="container">
        <div class="row welcome-card h-100 p-5">
            <?php   
                foreach($res as $index=>$value){
            ?>
            <div class="col-8 mb-5" id="<?= $index ?>">
                <h6 class="mb-1"><?= $index+1 ?>. Question</h6>
                <h3 class="mb-5"><?= $value['question'] ?></h3>
                <h6>Options</h6>

                <div class="row">
                    <?php
                            $options = json_decode($value['options']);
                            foreach($options as $option){
                        ?>
                    <div class="col-3">
                        <input type="radio" class="btn-check" name="answer<?= $currentques ?>"
                            id="primary-outlined<?php echo md5($value['question'].$index.$option) ?>"
                            value="<?php echo $option ?>" autocomplete="off">
                        <label class="btn btn-outline-success w-100"
                            for="primary-outlined<?php echo md5($value['question'].$index.$option) ?>"><?php echo $option ?></label>
                    </div>
                    <?php  } ?>
                </div>
                <div class="mt-5">
                </div>
                <input type="text" id="batch" name="batch" style="display:none">
                <div class="mt-3">

                    <h4><?= $winner == 0 ? $playerOne : $playerTwo ?> Turns</h4><br>
                    <?php 
                        if($winner == 0){
                            if($playerOne == $studentid){
                    ?>
                    <button type="button" id="submitbtn" class="btn btn-primary"
                        onclick="checkAns('<?= $value['correctans'] ?>')">Submit</button>
                    <?php }
                        }
                        else {
                            if($playerTwo == $studentid){ 
                    ?>
                    <button type="button" id="submitbtn" class="btn btn-primary"
                        onclick="checkAns('<?= $value['correctans'] ?>')">Submit</button>

                    <?php }
                            }
                    ?>

                </div>
            </div>
            <?php } ?>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Player One</th>
                                <th>Player Two</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $playerOneScore ?? 0 ?></td>
                                    <td><?= $playerTwoScore ?? 0 ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-6">
                                Goal : <?= $a_goal ?>
                            </div>
                            <div class="col-6">
                                Goal : <?= $b_goal ?>
                            </div>
                        </div>
                    </div>
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
                    <h4>Toss winner is <span id="tossWinner"></span> </h4>
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

<?= $playerOneScore ?>

<script>
$(document).ready(function() {
    localStorage.removeItem('turns');
    localStorage.setItem('turns', 0)

    setInterval(() => {
        location.reload()
    }, 5000);

    localStorage.setItem('currentId', 0)

    let questionsCount = "<?= count($res) ?>"

    let currentques = '<?= $currentques ?>'

    for (let i = 0; i < Number(questionsCount); i++) {
        if (i != currentques) {
            $('#' + i).hide()
        }
    }

})

$(function() {
    $('#tossWinner').text('<?= $winner == 0 ? $playerOne : $playerTwo ?>')

    let elem = $('#tose')
    let modal = new bootstrap.Modal(elem)

    let questionsCount = "<?= count($res) ?>"
    let currentques = '<?= $currentques ?>'

    if (questionsCount > currentques) {
        // modal.show()
    }

    localStorage.setItem('playerOne', "<?= $playerOne ?>")
    localStorage.setItem('playerTwo', "<?= $playerTwo ?>")

})

function wrongAnswer() {
    let elem = $('#wrongans')
    let modal = new bootstrap.Modal(elem)
    modal.show()
}

function reduceScore(testid, batch, team) {

    var params = {
        testid: testid,
        batch: batch,
        team: team
    }

    $.get('<?php echo base_url('panel/reduce') ?>', params)
}

function checkAns(ans) {

    let val = $("input[name='answer<?= $currentques ?>']:checked").val()

    if (val == ans) {
        let data = {
            winner: '<?= $winner ?>',
            classCode: '<?= $classCode ?>'
        }

        $.post('<?php echo base_url('game/update') ?>', data, function(data, status) {
            location.reload()
        })
    } else {

        let data = {
            loser: '<?= $winner ?>',
            classCode: '<?= $classCode ?>'
        }

        $.post('<?php echo base_url('game/reduce') ?>', data, function(data, status) {
            location.reload()
        })
    }

}
</script>