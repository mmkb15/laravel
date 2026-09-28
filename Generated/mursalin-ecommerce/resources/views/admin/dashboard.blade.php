@extends('admin.layouts.app')
@section('title','Dashboard')
@section('content')
<div class="tf-section-2 mb-4"><div><h4>Dashboard</h4><div class="body-text mt-1">Store overview</div></div></div>
<div class="row g-4">
@foreach([['Products',$stats['products'],'icon-shopping-bag'],['Categories',$stats['categories'],'icon-list'],['Customers',$stats['customers'],'icon-user'],['Orders',$stats['orders'],'icon-file-text'],['Pending Orders',$stats['pending'],'icon-clock'],['Completed',$stats['completed'],'icon-check'],['Sales','৳ '.number_format($stats['sales'],2),'icon-dollar-sign']] as $card)
<div class="col-xl-3 col-md-6"><div class="wg-box"><div class="d-flex justify-content-between align-items-center"><div><div class="body-text">{{$card[0]}}</div><h3 class="mt-2">{{$card[1]}}</h3></div><div class="fs-30"><i class="{{$card[2]}}"></i></div></div></div></div>
@endforeach
</div>
<div class="wg-box mt-4"><div class="flex items-center justify-between"><h5>Recent Orders</h5><a href="{{route('admin.orders.index')}}">View all</a></div><div class="table-responsive mt-3"><table class="table table-hover"><thead><tr><th>Order</th><th>Customer</th><th>Total</th><th>Status</th><th></th></tr></thead><tbody>@forelse($recentOrders as $o)<tr><td>{{$o->order_number}}</td><td>{{$o->user->name}}</td><td>৳ {{number_format($o->total_amount,2)}}</td><td><span class="badge bg-secondary">{{$o->status}}</span></td><td><a href="{{route('admin.orders.show',$o)}}">View</a></td></tr>@empty<tr><td colspan="5">No orders yet.</td></tr>@endforelse</tbody></table></div></div>
@endsection
