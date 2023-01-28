<x-admin-master>

    @section('page-level-css')
        <link rel="stylesheet" href="{{ mix('resources/vendor/datatables/dataTables.bootstrap4.min.css') }}" type="text/css">
    @endsection

    @section('content')
        <h1 class="h3 mb-0 text-gray-800">All Users</h1>

        @if (session('user-deleted-message'))
            <div class="alert alert-danger">
                {{ session('user-deleted-message') }}
            </div>
        @endif
        <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Registered on</th>
                    <th>Updated profile date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            <img src="{{ $user->avatar }}" alt="" height="40px">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection

    @section('page-js-bundle')
        @vite('resources/js/datatables-bundle.js')
    @endsection

</x-admin-master>
