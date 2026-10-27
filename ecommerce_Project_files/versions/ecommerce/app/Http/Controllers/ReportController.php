<?php
namespace App\Http\Controllers;
use App\Models\{Order,Product};
class ReportController extends Controller
{
 public function index(){ $sales=Order::whereIn('status',['processing','shipped','delivered'])->sum('total'); $orders=Order::count(); $delivered=Order::where('status','delivered')->count(); $lowStock=Product::where('stock','<=',5)->count(); $monthly=Order::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(total) as total, COUNT(*) as orders")->whereIn('status',['processing','shipped','delivered'])->groupBy('month')->orderBy('month','desc')->take(12)->get(); return view('admin.pages.report.index',compact('sales','orders','delivered','lowStock','monthly')); }
}
