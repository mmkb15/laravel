<?php
namespace App\Http\Controllers;
use App\Models\User; use Illuminate\Http\Request;
class UserController extends Controller
{
 public function index(Request $request){ $users=User::when($request->filled('search'),fn($q)=>$q->where('name','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%'))->latest()->paginate(10)->withQueryString(); return view('admin.pages.user.index',compact('users')); }
 public function create(){ return view('admin.pages.user.form',['user'=>new User(),'mode'=>'create']); }
 public function store(Request $request){ $data=$request->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users','password'=>'required|string|min:8','role'=>'required|in:admin,customer','phone'=>'nullable|string|max:50','address'=>'nullable|string']); User::create($data); return redirect()->route('users.index')->with('success','User created successfully.'); }
 public function edit(User $user){ return view('admin.pages.user.form',compact('user')+['mode'=>'edit']); }
 public function update(Request $request,User $user){ $data=$request->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users,email,'.$user->id,'password'=>'nullable|string|min:8','role'=>'required|in:admin,customer','phone'=>'nullable|string|max:50','address'=>'nullable|string']); if(!$data['password']) unset($data['password']); $user->update($data); return redirect()->route('users.index')->with('success','User updated successfully.'); }
 public function destroy(User $user){ if($user->id===auth()->id()) return back()->with('error','You cannot delete your own account.'); $user->delete(); return back()->with('success','User deleted successfully.'); }
 public function profile(){ return view('admin.pages.user.profile',['user'=>auth()->user()]); }
 public function updateProfile(Request $request){ $user=auth()->user(); $data=$request->validate(['name'=>'required|string|max:255','phone'=>'nullable|string|max:50','address'=>'nullable|string','password'=>'nullable|string|min:8']); if(!$data['password']) unset($data['password']); $user->update($data); return back()->with('success','Profile updated successfully.'); }
}
