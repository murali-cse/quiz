<div class="gq-background">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-12 mt-5 text-center welcome-card p-5">
                <h4>Thanks for attending the Quiz</h4>
                <h1 class="mt-3" id="q_draw"></h1>
                <h1 class="mt-3" id="qwinner">THE WINNER IS <span id="winner"></span> TEAM</h1>
                <a href="<?php echo base_url('panel/admin') ?>" style="text-decoration: none">
                    <button class="btn btn-primary mt-3">Back To Home</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {

    window.history.pushState({}, '', '<?php echo base_url('panel/admin') ?>')

    let batch = localStorage.getItem('batch');
    let testid = localStorage.getItem('testid');

    let data = {
        batch: batch,
        testid: testid
    }

    $.post('<?php echo base_url('panel/get_result') ?>', data, function(data, status) {
        data = JSON.parse(data);

        if (data.winner == 'draw') {
            $('#q_draw').show()
            $('#q_draw').text("THE MATCH IS DRAW")
            $('#qwinner').hide()
        } else {
            $('qwinner').show()
            $('#winner').text(data.winner)
            $('#q_draw').hide()

        }
    })
})
</script>