@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>User Details</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('users.index') }}">Users</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Details</li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="mb-14"><span class="body-title">Name:</span> <span class="body-text">{{ $user->name }}</span></div>
            <div class="mb-14"><span class="body-title">Email:</span> <span class="body-text">{{ $user->email }}</span></div>
            <div class="mb-14"><span class="body-title">Role:</span> <span class="body-text">{{ $user->role->name ?? '-' }}</span></div>
            <div class="mb-14"><span class="body-title">Joined:</span> <span class="body-text">{{ $user->created_at->format('d M, Y') }}</span></div>

            <a href="{{ route('users.index') }}" class="tf-button style-1 w208 mt-20">Back</a>
        </div>

    </div>
</div>
@endsection
