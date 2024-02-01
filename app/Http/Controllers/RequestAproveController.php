<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestAprove;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use ModelNotFoundException;

class RequestAproveController extends Controller
{
    public function view($id)
    {

        $user = User::findOrFail($id);
        // if ($user->role == 1) {
        //     return redirect()->back()->with('fail', 'You are already a vendor.');
        // }
        // $existingRequest = RequestAprove::where('user_id', $id)->first();
        // if ($existingRequest) {
        //     return redirect()->back()->with('fail', 'Your request is already sent. Please wait for approval.');
        // }
        RequestAprove::create([
            'user_id' => $id,
        ]);
        return redirect()->route('user.index')->with('success', 'Your request has been sent to Super Admin for approval.');
    }



    public function approve($id)
    {

        try {
            $user = User::findOrFail($id);
            if ($user->role == 1) {
                return redirect()->back()->with('fail', 'already a vendor.');
            } else {
                $user->role = 1;
                $user->update();
            }
            return redirect()->route('home')->with('success', 'Request has been approved, and user now a vendor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'An error occurred while processing your request. Error: ' . $e->getMessage());
        }
    }


    public function cancelRequest($id)
    {
        try {
            $user = User::findOrFail($id);
            $existingRequest = RequestAprove::where('user_id', $id)->first();
            if ($existingRequest) {
                $existingRequest->delete();
                return redirect()->route('user.index')->with('success', 'Your request has been canceled.');
            }
            return redirect()->route('user.index')->with('fail', 'No pending request found.');

        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('fail', 'An error occurred while processing your request. Error: ' . $e->getMessage());
        }
    }

}








//////////////////First Function/////////////////////


// class RequestAproveController extends Controller
// {
//     public function view($id)
//     {
//         $validate = Validator::make( 
//             ['user_id' => $id],
//             ['user_id' => 'required | unique:request_aproves']
//         );
//         if ($validate->fails()) {
//             return redirect()->back()->with('fail' , 'Your request is already send wait for approvel');
//         }else{
//             RequestAprove::create([
//                 'user_id' => $id,
//             ]);
//             return redirect()->route('home')->with('success' , 'Your request has been  sent to Super Admin for approval');
//         }
//     }
// }