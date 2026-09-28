@extends('admin.layouts.master')


<!-- Title -->
@section('title', 'Roles - Manage')

<!-- Content -->
@section('content')

{{-- @php
    print_r($roles) 
@endphp --}}
    <!-- Page Header -->
    <x-admin.phead title='Roles' subtitle='Manage All Roles'>
        <a href= "{{ route('roles.create') }}" class="btn-custom btn-custom-secondary btn-quick-action" type="button">
              <i class="bi bi-plus-lg"></i> Add New
        </a>
    </x-admin.phead>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success')  }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-card-custom">
        <!-- Header Controls -->
        <div class="table-header-control">
            <!-- Search bar -->
            <div class="table-search-box">
                <i class="bi bi-search table-search-icon"></i>
                <input type="search" class="table-search-input" placeholder="Search orders or products...">
            </div>
            <!-- Action buttons / Filter options -->
            <div class="table-filter-group">
                <div class="dropdown">
                    <button class="btn-table-action dropdown-toggle" type="button" id="dropdownFilterStatus"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel"></i> Status Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownFilterStatus">
                        <li><a class="dropdown-item" href="#">All Statuses</a></li>
                        <li><a class="dropdown-item" href="#">Paid / Success</a></li>
                        <li><a class="dropdown-item" href="#">Processing</a></li>
                        <li><a class="dropdown-item" href="#">Cancelled / Failed</a></li>
                    </ul>
                </div>
                <button class="btn-table-action" type="button">
                    <i class="bi bi-file-earmark-arrow-down"></i> Export
                </button>
            </div>
        </div>

        <!-- Responsive Table Wrapper -->
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>ID</th>
                        <th>Role</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <!-- Row  -->
                    @foreach($roles as $item)
                    <tr>
                        {{-- <td class="table-order-id">{{ $loop->index + 1 }}</td> --}}
                        <td class="table-order-id">{{ $roles->firstItem() + $loop->index }}</td>
                        <td class="table-order-id">{{ $item->id}}</td>
                        <td class="table-product-name">{{ $item->name}}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                {{-- <a href="{{ route('roles.show',['role'=> $item->id]) }}" class="table-btn-action" title="View details"><i
                                        class="bi bi-eye"></i></a> --}}
                                <a href="{{ route('roles.edit',['role' => $item->id]) }}" class="table-btn-action" title="Edit row"><i
                                        class="bi bi-pencil"></i></a>


                                @if (auth()->user()->role_id == 1)
                                    <button
                                        type="button" 
                                        class="table-btn-action delete" 
                                        title="Delete row"
                                        data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDelete"
                                        >
                                        
                                        <i class="bi bi-trash"></i>
                                    </button>  
                                @endif

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer Controls / Pagination -->
<div class="table-footer-control">

    <span class="table-pagination-info">
        Showing {{ $roles->firstItem() ?? 0 }}
        to {{ $roles->lastItem() ?? 0 }}
        of {{ $roles->total() }} entries
    </span>

    @if ($roles->hasPages())
        <nav aria-label="Page navigation">
            <ul class="pagination mb-0">

                {{-- Previous --}}
                <li class="page-item {{ $roles->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link border-0"
                       href="{{ $roles->previousPageUrl() ?? '#' }}"
                       aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>


                @php
                    $current = $roles->currentPage();
                    $last = $roles->lastPage();

                    $pages = [];

                    // Always show first page
                    $pages[] = 1;

                    if ($current > 4) {
                        $pages[] = '...';
                    }

                    // Pages around current page
                    for ($i = max(2, $current - 2); $i <= min($last - 1, $current + 2); $i++) {
                        $pages[] = $i;
                    }

                    if ($current < $last - 3) {
                        $pages[] = '...';
                    }

                    // Always show last page
                    if ($last > 1) {
                        $pages[] = $last;
                    }
                @endphp


                {{-- Page Numbers --}}
                @foreach ($pages as $page)

                    @if ($page === '...')

                        <li class="page-item disabled">
                            <span class="page-link border-0">...</span>
                        </li>

                    @else

                        <li class="page-item {{ $current == $page ? 'active' : '' }}">
                            <a class="page-link border-0"
                               href="{{ $roles->url($page) }}">
                                {{ $page }}
                            </a>
                        </li>

                    @endif

                @endforeach


                {{-- Next --}}
                <li class="page-item {{ $roles->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link border-0"
                       href="{{ $roles->nextPageUrl() ?? '#' }}"
                       aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>

            </ul>
        </nav>
    @endif

</div>
        <!-- Footer Controls / Pagination -->


        
    </div>
@endsection

<x-admin.modal id="modalDelete" title="Delete Role">
 <div class="text-center">
     <p class="mt-3">Are you sure you want to delete this role ?</p>

    <form action="{{ route('roles.destroy',["role"=> $item->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button
            type="button" 
            class="btn btn-outline-secondary" 
            title="Delete row"
            data-bs-dismiss="modal"
        >
            Cancel
        </button>
        <button
            type="submit" 
            class="btn btn-danger" 
            title="Delete row"
            >
            Delete
            <i class="bi bi-trash"></i>
        </button>
    </form>

 </div>
</x-admin.modal>

<x-admin.modal id="modalDelete" title="Delete User">
        <div class="text-center">
            <i class="bi bi-trash fs-1 text-danger"></i>
            <p class="mt-2">Are you sure you want to delete this user?</p>
            <span class="name fw-bold badge border border-danger text-danger py-2 px-3">Mina</span>
            <hr>
            <form method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-outline-secondary me-1" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
</x-admin.modal>

@section('script')
<script>
    document.querySelectorAll('.delete').forEach(button=> {
        button.addEventListener('click', function (){
            let id      = this.dataset.id,
                name    = this.dataset.name;
            // alert(id);

            document.querySelector('#modalDelete .name').innerText = name;
            document.querySelector('#modalDelete form').action = `{{ route('roles.destroy', ['role' => ':id' ]) }}`.replace(':id', id);

        })
    })
</script>
<script>
    let searchInput = $('.table-search-input');
    searchInput.on('input',function(){
        // console.log(searchInput.val());
        $.ajax({
            url: "{{ route('roles.search') }}",
            type: "GET",
            data: {
                search: $(this).val(),
            },
            success: function(res) {
                console.log(res.data);
                let rows = (res.data);
                let html = '';
                rows.forEach( (item, index) => {
                    html += `
                    <tr>
                        <td class="table-order-id">${index + 1}</td>
                        <td class="table-order-id">${item.id}</td>
                        <td class="table-product-name">${item.name}</td>

                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('roles.edit',['role' => $item->id]) }}" class="table-btn-action" title="Edit row"><i
                                        class="bi bi-pencil"></i></a>


                                @if (auth()->user()->role_id == 1)
                                    <button
                                        type="button" 
                                        class="table-btn-action delete" 
                                        title="Delete row"
                                        data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDelete"
                                        >
                                        
                                        <i class="bi bi-trash"></i>
                                    </button>  
                                @endif

                            </div>
                        </td>

                    </tr>
                    `
                });
                $('#tbody').html(html);
            },
            error: function(error) {
                console.log(error);
            }
        });
    })
</script>

@endsection
