<?php
namespace App\Http\Controllers; use App\Models\Review; use Illuminate\Http\Request;
class ReviewController extends Controller {public function index(){return view('admin.reviews.index',['reviews'=>Review::with(['user','product'])->latest('review_id')->paginate(20)]);}public function destroy(Review $review){$review->delete();return back()->with('success','Review deleted.');}}
