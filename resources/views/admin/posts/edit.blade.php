<x-admin-master>

    @section('content')
        <h1 class="h3 mb-0 text-gray-800">Edit Post</h1>
        <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title" class="col-form-label">{{ __('Title') }}</label>
                <input id="title" type="text" class="form-control" name="title" autofocus placeholder="Enter title"
                    value={{ $post->title }}>
            </div>

            <div class="form-group">
                <div>
                    <img src="{{ $post->post_image }}" alt="" height="100px">
                </div>
                <label for="post_image" class="col-form-label">{{ __('File') }}</label>
                <input id="post_image" type="file" class="form-control-file" name="post_image">
            </div>

            <div class="form-group">
                <textarea id="body" class="form-control" name="body" cols="30" rows="20">{{ $post->body }}</textarea>
            </div>

            <button type='submit' class="btn btn-primary">
                {{ __('Submit') }}
            </button>
        </form>
    @endsection

</x-admin-master>
