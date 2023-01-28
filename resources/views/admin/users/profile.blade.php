<x-admin-master>

    @section('content')
        <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
        <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='mb-4'>
                <img class="img-profile rounded-circle" src="{{ $user->avatar }}" height="50px" width="50px">
            </div>

            <div class="form-group">
                <input type="file" class="form-control-file" name="avatar">
            </div>

            <div class="form-group">
                <label for="username" class="col-form-label">{{ __('Username') }}</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                    name="username" autofocus placeholder="Enter username" value={{ $user->username }}>

                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    autofocus placeholder="Enter name" value={{ $user->name }}>

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label">{{ __('Email') }}</label>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                    name="email" placeholder="Enter email" value={{ $user->email }}>

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                    class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="password" value="">

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="confirm_password" class="col-form-label">{{ __('Confirm Password') }}</label>
                <input id="confirm_password" type="password"
                    class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="confirm_password"
                    value="">

                @error('confirm_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type='submit' class="btn btn-primary">
                {{ __('Submit') }}
            </button>
        </form>
    @endsection

</x-admin-master>
