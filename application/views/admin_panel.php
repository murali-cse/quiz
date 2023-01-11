<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('panel/logout') ?>" style="text-decoration:none">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>
<div class="dashboard-background">
    <div class="container">
        <div class="p-2 h-100">
            <div class="row mb-3 mt-5">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary" onclick="openTeamModal()">
                        Team Quiz
                    </button>
                    <button type="button" class="btn btn-warning" onclick="showModal()">
                        Add New Test
                    </button>
                </div>
            </div>

            <!-- quiz modal -->
            <div class="modal fade" id="teamModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Continue..</h5>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure, Do you want to create Quiz?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <a href="<?php echo base_url('panel/select_questions') ?>" style="text-decoration: none">
                                <button type="button" class="btn btn-primary">Yes</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="<?php echo base_url('panel/add_test') ?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add New Test</h5>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="newTestName" class="form-label">Test Name</label>
                                    <input type="text" class="form-control" id="newTestName" name="testname"
                                        aria-describedby="newtesthelp">
                                    <div id="newtesthelp" class="form-text"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="newTeacherName" class="form-label">Teacher Name</label>
                                    <input type="text" class="form-control" id="newTeacherName" name="teachername"
                                        aria-describedby="newteacherhelp">
                                    <div id="newteacherhelp" class="form-text"></div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Test Modal -->
            <div class="modal fade" id="editTestModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="<?php echo base_url('panel/edit_test') ?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Test</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editTestname" class="form-label">Test Name</label>
                                    <input type="text" class="form-control" id="editTestname" name="testname"
                                        aria-describedby="newtesthelp">
                                    <div id="newtesthelp" class="form-text"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="editTeachername" class="form-label">Teacher Name</label>
                                    <input type="text" class="form-control" id="editTeachername" name="teachername"
                                        aria-describedby="newteacherhelp">
                                    <div id="newteacherhelp" class="form-text"></div>
                                </div>
                                <input type="text" id="test_id" name="test_id" style="display:none">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive welcome-card">
                <table class="table table-bordered" id="adminTable">
                    <thead>
                        <th class="w-25 text-center">Test Name</th>
                        <th class="w-25 text-center">Teacher Name</th>
                        <th class="w-25 text-center">Actions</th>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($res as $result){
                    ?>
                        <tr>
                            <td class="text-center align-middle text-capitalize"><?php echo $result['testname'] ?></td>
                            <td class="text-center align-middle text-capitalize"><?php echo $result['teachername'] ?>
                            </td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url('panel/questions/'.$result['id']) ?>"
                                        style="text-decoration:none">
                                        <button class="btn btn-primary"> View </button>
                                    </a>
                                    <button class="btn btn-secondary"
                                        onclick="editTestModal('<?php echo $result['id'] ?>','<?php echo $result['testname'] ?>', '<?php echo $result['teachername']?>')">
                                        Edit </button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
function openTeamModal() {
    var elem = document.getElementById('teamModal')
    let modal = new bootstrap.Modal(elem)
    modal.show()
}

function showModal() {
    var elem = document.getElementById("staticBackdrop")
    let modal = new bootstrap.Modal(elem)
    modal.show()
}

function editTestModal(id, test, teacher) {

    console.log(test)
    console.log(teacher)
    console.log(id)

    let testname = document.getElementById("editTestname")
    let teachername = document.getElementById("editTeachername")
    let tid = document.getElementById("test_id")

    testname.value = test
    teachername.value = teacher
    tid.value = id

    let elem = document.getElementById('editTestModal')
    let modal = new bootstrap.Modal(elem)
    modal.show()
}

function closeModal() {
    var elem = document.getElementById("staticBackdrop")
    let modal = bootstrap.Modal.getInstance(elem)
    modal.hide()
}
</script>