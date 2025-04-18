<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Parking;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{

    public function dashboard()
    {
        $user=Auth::guard('admin')->user()->id;
        dd($user);

        $totalParkings = Parking::count();
        $totalUsers = User::count();
        $totalReservations = Reservation::count();
        $activeReservations = Reservation::where('status', 'active')->count();

        // Données pour le graphique des réservations par jour
        $reservationsByDay = Reservation::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $labels = $reservationsByDay->pluck('date');
        $data = $reservationsByDay->pluck('count');

        return view('admin.dashboard', compact(
            'totalParkings',
            'totalUsers',
            'totalReservations',
            'activeReservations',
            'labels',
            'data'
        ));
    }




    /********************login function */
    public function login (Request $request){
        if ($request->isMethod('post')){
           $data = $request->all();
         //echo "<pre>"; print_r($data);die;

           $rules= [
           'email' => 'required|email|max:255',
           'password' => 'required'
             ];

       $messages=[
           'email.required' => 'email  is required',
           'email.email' => 'valid email  is required',
           'password.required' => 'password is required'
       ];

       $this->validate($request,$rules,$messages);

       if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']
       ])){


              return redirect('admin/dashboard');


      } else{

          return redirect ()->back()->with('error_message','Invalid email or password');
       }

       }
        return view ('admin.login');
     }




            /***********logout fonction************************************************************************* */
            public function logout (){

              Auth::guard('admin')->logout();
              return redirect('admin/login');

           }

        /***********update admin detials fonction*************************** */
        public function updateAdminDetails (Request $request){
          Session::put('page','updatedetail');
          if ($request->isMethod('post')){

              $data = $request->all();
        // echo "<pre>"; print_r($data);die;
              $rules= [
                  'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',

                    ];

                    $messages=[
                      'admin_name.required' => 'name  is required',


                  ];

                    $this->validate($request,$rules,$messages);
                    // upload image admin
                    if ($request->hasFile('admin_image')){

                      $image_tmp=$request->file('admin_image');
                      if($image_tmp->isValid()){
                          //get image extension
                          // create new manager instance with desired driver
                         $manager = new ImageManager(new Driver());
                          $extension=$image_tmp->getClientOriginalExtension();


                          //generate new name image
                          $img=rand(111,99999).'.'.$extension;

                          $imagePath='admin/images/admins/'.$img;


                          //upload image
                         // \Intervention\Image\Facades\Image::make($image_tmp)->save($imagePath);


                           $img= $manager->read($image_tmp);
                     ///$img=$img->resize(370,246);
                           $img->toJpeg(80)->save($imagePath);



                      }
                      elseif (!empty($data ['current_admin_image'])){
                          $img =$data ['current_admin_image'];
                      }else{
                          $img="";
                       }
                    }

              Admin::where('id',Auth::guard('admin')->user()->id)->update(['firstname'=>$data ['admin_name'],'lastname'=>$data ['admin_lastname']]);
              return redirect ()->back()->with('success_message','admin details has updated successfully');
          }
          return view('admin.settings.update_admin_detail');
         }

    /***********update paasword fonction************************************************************************* */

    public function updateAdminPassword (Request $request){
     Session::put('page','update_admin_password');
     if ($request->isMethod('post')){

         $data = $request->all();
          //echo "<pre>"; print_r($data);die;

         if(Hash::check($data ['current_password'],Auth::guard('admin')->user()->password)){

             if($data['confirm_password']==$data ['new_password']){

                 Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>
                 bcrypt($data ['new_password'])]);

                 return redirect ()->back()->with('success_message','password has updated successfully');
             } else{
                 return redirect ()->back()->with('error_message','new password and confim password does not match');
              }
          }  else {
             return redirect ()->back()->with('error_message',' your current password is incorrect');
          }
     }
     $adminDetails =Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();

       return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }
}
