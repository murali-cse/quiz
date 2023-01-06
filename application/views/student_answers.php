<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Test</span>
        <a href="<?php echo base_url('panel/logout') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>

<div class="container">
    <div class="row mt-5 mb-2">
        <div class="text-center">
            <h4>Result is</h4>
            <div class="mt-4">
                <h5>Correct answer : <?php echo $correct_ans; ?></h5>
                <h5>Incorrect answer : <?php echo $incorrect_ans; ?></h5>
            </div>
            <a href="<?php echo base_url('panel/student') ?>">
                <button class="btn btn-primary mt-3">Go to Home</button>
            </a>
        </div>
    </div>
</div>
<script>
$(function() {
    window.history.pushState({}, '', 'student')
})
</script>