<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('panel/logout') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>

<?php 
    $name = $this->session->firstname." ".$this->session->lastname;
?>
<div class="welcome-background">
    <div class="container d-flex justify-content-center align-items-center" style="height:90%">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 welcome-card p-5">
                <h4 class="pb-3 text-capitalize text-center">Welcome <?php echo $name; ?></h4>
            </div>
            <div class="col-lg-6 col-mg-12 mb-4">
                <div style="border: 1px solid grey;padding: 3rem">
                    <h6 class="pb-3  text-center">Play as a Individual</h6>
                    <select id="selectedTest" class="form-select">
                        <option selected>Select Test</option>
                        <?php foreach($res as $result){ ?>
                        <option value='<?php echo $result['id'] ?>'><?php echo $result['testname'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary <?php echo count($res) == 0 ? 'disabled' : '' ?>"
                            onclick="startTest()">
                            Begin Test
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div style="border: 1px solid grey;padding: 3rem">
                    <h6 class="pb-3 text-center">Join a Class</h6>
                    <input type="text" class="form-control" id="quizClassCode" aria-describedby="quizClassCode"
                        placeholder="Class Code">
                    <div class="text-center mt-4">
                        <button class="btn btn-primary <?php echo count($res) == 0 ? 'disabled' : '' ?>"
                            onclick="startTest()">
                            Begin Test
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin:5rem"></div>
</div>

<script>
function startTest() {
    let val = $('#selectedTest').find(':selected').val()
    if (val != "Select Test") {
        window.location.href = '<?php echo base_url('panel/student_test/') ?>' + val
    }
}
</script>