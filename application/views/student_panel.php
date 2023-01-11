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
    <div class="container d-flex justify-content-center align-items-center" style="height:95%">
        <div class="row ">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 welcome-card p-5">
                <h4 class="pb-3 text-capitalize">Welcome <?php echo $name; ?></h4>
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
    </div>
</div>

<script>
function startTest() {
    let val = $('#selectedTest').find(':selected').val()
    if (val != "Select Test") {
        window.location.href = '<?php echo base_url('panel/student_test/') ?>' + val
    }
}
</script>