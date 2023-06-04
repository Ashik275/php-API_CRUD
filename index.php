<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP REST API</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-------------Modal Start------------->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal">
                    <div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="sname">
                            <input type="hidden" class="form-control" id="sid">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="semail">
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="update()">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------Modal End------------->
    <div class="container">
        <div class="container d-flex justify-content-between" style="background-color: purple;">
            <h2 class="text-white fw-bold ms-2">PHP REST API</h2>
            <div>
                <label class="text-white fw-bold">Search:</label>
                <input type="text" name="Search" id="search" onkeyup="search()" class="my-2">
            </div>
        </div>
        <div class="container d-flex justify-content-between my-2" style="background-color:palevioletred">
            <div class="my-2">
                <label for="">Name:</label>
                <input type="text" name="Search" id="name">
            </div>
            <div class="my-2">
                <label for="">Email:</label>
                <input type="text" name="Search" id="email">
            </div>
            <div class="my-2">
                <button type="button" class="button-1" onclick="insert()">Save</button>
            </div>
        </div>
        <div class="msg" style="display:none"></div>
        <table class="table" id="OppexampleData">
            <thead class="bg-danger">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id='load-table'>

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="myscript.js"></script>
</body>

</html>