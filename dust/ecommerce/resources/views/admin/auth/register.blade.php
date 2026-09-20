<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    {{-- তোমার admin.layouts.master যেই CSS files link করে, সেগুলো এখানেও link করে দাও। --}}
</head>
<body>
    <div class="login-wrap" style="max-width:420px;margin:80px auto;">
        <div class="login-content wg-box">
            <h3 class="mb-30">Register</h3>

            @if ($errors->any())
                <div class="alert alert-danger mb-14">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="form-group mb-14">
                    <label class="body-title mb-10">Name <span class="tf-color-1">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="form-group mb-14">
                    <label class="body-title mb-10">Email <span class="tf-color-1">*</span></label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group mb-14">
                    <label class="body-title mb-10">Role</label>
                    <select class="form-control" name="role_id">
                        <option value="">-- Select Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-14">
                    <label class="body-title mb-10">Password <span class="tf-color-1">*</span></label>
                    <input class="form-control" type="password" name="password" required>
                </div>
                <div class="form-group mb-20">
                    <label class="body-title mb-10">Confirm Password <span class="tf-color-1">*</span></label>
                    <input class="form-control" type="password" name="password_confirmation" required>
                </div>
                <button type="submit" class="tf-button w-full">Register</button>
            </form>

            <p class="mt-14 body-text">Already have an account? <a class="tf-color" href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</body>
</html>