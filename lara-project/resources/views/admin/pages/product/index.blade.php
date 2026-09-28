@extends('admin.layouts.master')


<!-- Title -->
@section('title', 'Products - Manage')

<!-- Content -->
@section('content')

{{-- @php
    print_r($products) 
@endphp --}}
    <!-- Page Header -->
    <x-admin.phead title='Products' subtitle='Manage All Products'>
        <a href= "{{ route('products.create') }}" class="btn-custom btn-custom-secondary btn-quick-action" type="button">
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
            <form action="{{ route('products.index') }}" method="GET" class="d-flex flex-md-nowrap flex-wrap gap-2">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="search" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search products...">
                </div>
                <div class="input-group">
                    <label class="input-group-text"><i class="bi bi-funnel me-1"></i> Category</label>
                    <select class="form-select" id="inputGroupSelect01" name="category_id">
                        <option selected="" disabled>Choose...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label class="input-group-text"><i class="bi bi-funnel me-1"></i> Brand</label>
                    <select class="form-select" id="inputGroupSelect01" name="brand_id">
                        <option selected="" disabled>Choose...</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" @selected(request('brand_id') == $brand->id)>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Action buttons / Filter options -->
                <div class="table-filter-group">
                    <button class="btn-table-action" type="submit">
                        Search <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <a href="{{ route('products.index') }}" class="btn-table-action text-nowrap">
                    <i class="bi bi-arrow-clockwise"></i> Clear Filter
                </a>
            </form>
        </div>

        <!-- Responsive Table Wrapper -->
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row  -->
                    @forelse($products as $item)
                    <tr>
                        <td class="table-order-id">{{ $item->id}}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                    @if ($item->image)
                                        <img src="{{ $item->image }}" alt="" class="rounded-3" width="60" height="60">
                                    @else
                                        <img src="https://placehold.net/product-400x400.png" alt="" class="rounded-3" width="60" height="60">
                                    @endif
                                    <div>
                                        <h5 class="mb-0 fw-normal">{{ $item->name }}</h5>
                                        <p class="mb-0 text-muted">{{ $item->id }}</p>
                                    </div>
                                </div>
                        </td>
                        <td class="table-product-name">{{ $item->brand->name}}</td>
                        <td class="table-product-name">{{ $item->category->name}}</td>
                        <td class="table-product-name">{{ $item->price}}</td>
                        <td class="table-product-name">{{ $item->quantity}}</td>
                        <td class="table-product-name">
                            <span class="badge border {{ $item->active == 1 ? 'border-success text-success' : 'border-danger text-danger'}}">
                                {{ $item->active == 1 ? 'Active' : 'Inactive'}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('products.show',['product'=> $item->id]) }}" class="table-btn-action" title="View details"><i
                                        class="bi bi-eye"></i></a>
                                <a href="{{ route('products.edit',['product' => $item->id]) }}" class="table-btn-action" title="Edit row"><i
                                        class="bi bi-pencil"></i></a>

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
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>

        <!-- Footer Controls / Pagination -->
        {{-- <div class="table-footer-control">
            <span class="table-pagination-info"></span>
            <nav aria-label="Page navigation">  
                {{  $products->links() }}
            </nav>
        </div> --}}


        <!-- Footer Controls / Pagination -->
<!-- Footer Controls / Pagination -->
 <div class="table-footer-control">

    <span class="table-pagination-info">
        Showing {{ $products->firstItem() ?? 0 }}
        to {{ $products->lastItem() ?? 0 }}
        of {{ $products->total() }} entries
    </span>

    @if ($products->hasPages())
        <nav aria-label="Page navigation">
            <ul class="pagination mb-0">

                <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link border-0"
                       href="{{ $products->previousPageUrl() ?? '#' }}"
                       aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>


                @php
                    $current = $products->currentPage();
                    $last = $products->lastPage();

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


    
                @foreach ($pages as $page)

                    @if ($page === '...')

                        <li class="page-item disabled">
                            <span class="page-link border-0">...</span>
                        </li>

                    @else

                        <li class="page-item {{ $current == $page ? 'active' : '' }}">
                            <a class="page-link border-0"
                               href="{{ $products->url($page) }}">
                                {{ $page }}
                            </a>
                        </li>

                    @endif

                @endforeach


                <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link border-0"
                       href="{{ $products->nextPageUrl() ?? '#' }}"
                       aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>

            </ul>
        </nav>
    @endif 


</div>

        
    </div>
@endsection
{{-- 
<x-admin.modal id="modalDelete" title="Delete User">
 <div class="text-center">
     <p class="mt-3">Are you sure you want to delete this user ?</p>
     <span class="fw-bold badge border border-danger text-danger py-2 px-4">Mina</span>

    <form action="{{ route('users.destroy',["id"=> $item->id]) }}" method="POST">
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
</x-admin.modal> --}}

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
            document.querySelector('#modalDelete form').action = `{{ route('products.destroy', ['product' => ':id' ]) }}`.replace(':id', id);

        })
    })
</script>
@endsection
