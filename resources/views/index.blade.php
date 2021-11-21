<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="_token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />

    <title>Laravel SPA</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <button class="btn btn-primary" data-toggle="modal" data-target="#create-user-modal">Create</button>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" name="search" id="search" placeholder="Search..." />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" onclick="search(event)">Search</button>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3" id="js-partials-users">

            </div>
            <!-- .col-12 -->
        </div>
    </div>

    <!-- Create User Modal-->
    <div class="modal fade" id="create-user-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="create-name" autocomplete="off" />
                            <div class="invalid-feedback" id="create-name-err"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="create-email"
                                autocomplete="off" />
                            <div class="invalid-feedback" id="create-email-err"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="create(event)">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Create User Modal-->

    <!-- Edit User Modal-->
    <div class="modal fade" id="edit-user-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="edit-name" autocomplete="off" />
                            <div class="invalid-feedback" id="edit-name-err"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="edit-email" autocomplete="off" />
                            <div class="invalid-feedback" id="edit-email-err"></div>
                        </div>
                        <input type="hidden" id="edit-id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="update(event)">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Edit User Modal-->

    <!-- Delete User Modal-->
    <div class="modal fade" id="delete-user-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete a user?</p>
                    <input type="hidden" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="destroy(event)">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Delete User Modal-->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="/js/user.js"></script>
</body>

</html>