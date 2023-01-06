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

            <h3><?php echo $res['question'] ?></h3>
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
                <button class="btn btn-primary mt-3">Next Question</button>
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

<script>

</script>