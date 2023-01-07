<div class="container">
    <div class="row">
        <div class="col-12 mt-5 text-center">
            <h4>Thanks for attending the Quiz</h4>
            <h1 class="mt-3">THE WINNER IS <span id="winner"></span> TEAM</h1>
            <a href="<?php echo base_url('panel/admin') ?>" style="text-decoration: none">
                <button class="btn btn-primary mt-3">Back To Home</button>
            </a>
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
        $('#winner').text(data.winner)
    })
})
</script>