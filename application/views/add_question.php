<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <a href="<?php echo base_url('/') ?>">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>
    </div>
</nav>

<div class="dashboard-background">
    <div class="container h-100 ">
        <div class="p-4"></div>
        <div class="welcome-card p-5">
            <div class="row ">
                <div class="d-flex justify-content-between">
                    <h4>Add Question</h4>
                    <a href="<?php echo base_url('panel/questions/'.$id) ?>" style="text-decoration:none">
                        <button class="btn btn-secondary">
                            Back
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="<?php echo base_url("panel/insertqest/$id") ?>" method="post">
                        <div class="form-floating mb-3 mt-4">
                            <input type="text" class="form-control" id="floatingQuestion" name="question"
                                placeholder="question">
                            <label for="floatingQuestion">Question</label>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingAnswer" placeholder="answer">
                                    <label for="floatingAnswer">Answer</label>
                                </div>
                                <input type="text" id="answers" name="answers" class="d-none">
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-success w-100 btn-lg mt-1" onclick="addAnswer()">
                                    Add
                                </button>
                            </div>
                            <div id="showans" class="row">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="mb-2">Correct Answer</label>
                                <select id="correct_ans" class="form-select" aria-label="Default select example"
                                    name="correctans">
                                    <option selected>Select answer</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary w-25 mb-4 mt-4" type="submit">
                                Add Question
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var answers = []

function addAnswer() {
    let ans = document.getElementById('floatingAnswer')
    let store = document.getElementById('answers')

    answers.push(ans.value)

    ans.value = ''

    store.value = JSON.stringify(answers)

    $('#showans').empty()

    $('#correct_ans').empty()
    $('#correct_ans').append('<option selected>Select Answer</option>')


    answers.map(v => {
        $('#showans').append(
            '<div class="col-3">' +
            '<p>' + v + '</p>' +
            '</div>'
        )
        $('#correct_ans').append(
            `<option value="${v}"> ${v} </option>`
        )
    })




}
</script>