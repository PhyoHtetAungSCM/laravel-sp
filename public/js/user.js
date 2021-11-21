/** 
 * -----------------------------------------------------
 * Fetch Users
 * -----------------------------------------------------
*/
function fetchUsers(url = '/partials/users') {
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#js-partials-users').innerHTML = html;
        });
}
fetchUsers();

/** 
 * -----------------------------------------------------
 * Search Users
 * -----------------------------------------------------
*/
function search(e) {
    e.preventDefault();

    fetchUsers('/partials/users?search=' + $('#search').val());
}

/** 
 * -----------------------------------------------------
 * Create Users
 * -----------------------------------------------------
*/
function create(e) {
    e.preventDefault();

    $.ajax({
        url: '/users/',
        type: 'POST',
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        data: {
            name: $('#create-name').val(),
            email: $('#create-email').val()
        },
        success: function (data) {
            fetchUsers();
            $('#create-user-modal').modal('hide');
        },
        error: function (response) {
            if(response.status === 500) {
                alert('Something went wrong!!!');
                return;
            }

            $nameErr = response.responseJSON.errors.name;
            $emailErr = response.responseJSON.errors.email;

            if ($nameErr) {
                $('#create-name').addClass('is-invalid');
                $('#create-name-err').html($nameErr[0]);
            }

            if ($emailErr) {
                $('#create-email').addClass('is-invalid');
                $('#create-email-err').html($emailErr[0]);
            }
        }
    });
}

/** 
 * -----------------------------------------------------
 * Create Modal On Hidden
 * -----------------------------------------------------
*/
$('#create-user-modal').on('hidden.bs.modal', function (event) {
    $('#create-name').val('');
    $('#create-email').val('');
    $('#create-name').removeClass('is-invalid');
    $('#create-email').removeClass('is-invalid');
    $('#create-name-err').html('');
    $('#create-email-err').html('');
});

/** 
 * -----------------------------------------------------
 * Edit Modal
 * -----------------------------------------------------
*/
function editModal(el) {
    $('#edit-id').val($(el).attr('data-id'));
    $('#edit-name').val($(el).attr('data-name'));
    $('#edit-email').val($(el).attr('data-email'));
    $('#edit-user-modal').modal('show');
}

/** 
 * -----------------------------------------------------
 * Update Users
 * -----------------------------------------------------
*/
function update(e) {
    e.preventDefault();

    $.ajax({
        url: '/users/' + $('#edit-id').val(),
        type: 'PUT',
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        data: {
            name: $('#edit-name').val(),
            email: $('#edit-email').val()
        },
        success: function () {
            fetchUsers();
            $('#edit-user-modal').modal('hide');
        },
        error: function (response) {
            if(response.status === 500) {
                alert('Something went wrong!!!');
                return;
            }

            $nameErr = response.responseJSON.errors.name;
            $emailErr = response.responseJSON.errors.email;

            if ($nameErr) {
                $('#edit-name').addClass('is-invalid');
                $('#edit-name-err').html($nameErr[0]);
            }

            if ($emailErr) {
                $('#edit-email').addClass('is-invalid');
                $('#edit-email-err').html($emailErr[0]);
            }
        }
    })
}

/** 
 * -----------------------------------------------------
 * Edit Modal On Hidden
 * -----------------------------------------------------
*/
$('#edit-user-modal').on('hidden.bs.modal', function (event) {
    $('#edit-name').removeClass('is-invalid');
    $('#edit-email').removeClass('is-invalid');
    $('#edit-name-err').html('');
    $('#edit-email-err').html('');
});

/** 
 * -----------------------------------------------------
 * Delete Modal
 * -----------------------------------------------------
*/
function deleteModal(el) {
    $('#delete-id').val($(el).attr('data-id'));
    $('#delete-user-modal').modal('show');
}

/** 
 * -----------------------------------------------------
 * Delete Users
 * -----------------------------------------------------
*/
function destroy(e) {
    e.preventDefault();

    $.ajax({
        url: '/users/' + $('#delete-id').val(),
        type: 'DELETE',
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function () {
            fetchUsers();
            $('#delete-user-modal').modal('hide');
        },
        error: function (response) {
            if(response.status === 500) {
                alert('Something went wrong!!!');
                return;
            }
        }
    })
}

/** 
 * -----------------------------------------------------
 * Pagination
 * -----------------------------------------------------
*/
$(document).on('click', '#pagination-wrap a', function (e) {
    e.preventDefault();
    
    fetchUsers(e.target.href);
});