<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

       /**********update users status******************* */
       public function UpdateUserStatus (Request $request){
        if($request->ajax()){
            $data=$request->all();
       if($data['status']=="Active")
        {
         $status=0;
        }else{
         $status=1;
        }
          User::where('id',$data['user_id'])->update(['status'=>$status]);
      return response ()->json(['status'=>$status,'user_id'=>$data['user_id']]);
    }

    }
       /*********************delete */

       public function delete ($id){


        User::where('id',$id)->delete();

         $message="User has been deleted successfully";

         return redirect('admin/users')->with('success_message', $message);
    }
}
