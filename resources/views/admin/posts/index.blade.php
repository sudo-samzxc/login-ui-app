<x-admin-master>
    @section('page-level-css')
        <link rel="stylesheet" href="{{ mix('resources/vendor/datatables/dataTables.bootstrap4.min.css') }}" type="text/css">
    @endsection

    @section('content')
        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">All Posts</h1>
        <br />
        @if (session('post-deleted-message'))
            <div class="alert alert-danger">
                {{ //Session::get('message')
                    session('post-deleted-message') }}
            </div>
        @elseif (session('post-created-message'))
            <div class="alert alert-info">
                {{ session('post-created-message') }}
            </div>
        @elseif (session('post-updated-message'))
            <div class="alert alert-success">
                {{ session('post-updated-message') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Owner</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->user->name }}</td>
                                    <td>
                                        <a href="{{ route('post.edit', $post->id) }}">{{ $post->title }}</a>
                                    </td>
                                    <td>
                                        <img height="40px" src="{{ $post->post_image }}">
                                    </td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                    <td>
                                        @can('view', $post)
                                            <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @section('page-js-bundle')
        @vite('resources/js/datatables-bundle.js')
    @endsection
</x-admin-master>
