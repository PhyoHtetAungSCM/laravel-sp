<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ ($users->currentpage()-1) * $users->perpage() + $loop->index + 1 }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('Y-m-d') }}</td>
            <td>
                <div class="actions">
                    <button class="btn btn-success" data-id={{ $user->id }} data-name={{ $user->name }}
                        data-email={{ $user->email }} onclick="editModal(this)" >
                        Edit
                    </button>
                    <button class="btn btn-danger ml-2" data-id={{ $user->id }} onclick="deleteModal(this)">
                        Delete
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
<div id="pagination-wrap">
    {{ $users->appends(request()->query())->links() }}
</div>