<h1>Role Manage Page</h1>

@php

@endphp


<pre>
    {{-- {{ print_r($roles) }} --}}
</pre>

<table class="table" border=1 cellspaceing=3 >
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created Date</th>
            <th>Update Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id}}</td>
                <td>{{ $role->name}}</td>
                <td>{{ $role->created_at}}</td>
                <td>{{ $role->updated_at}}</td>
            </tr>
        @endforeach

    </tbody>
</table>