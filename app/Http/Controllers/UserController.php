<?php
namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loadAllUsers()
    {
        $all_users = User::all();
        return view('users', compact('all_users'));
    }

    public function loadAddUserForm()
    {
        return view('add-user');
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'ticket_type' => 'required|in:dewasa,anak-anak',
            'ticket_quantity' => 'required|integer|min:1',
            'visit_date' => 'required|date|after_or_equal:today',
        ]);

        try {
            $ticket_price = $request->ticket_type === 'dewasa' ? 15000 : 5000;
            $total_price = $ticket_price * $request->ticket_quantity;
            $new_user = new User();
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->ticket_type = $request->ticket_type;
            $new_user->ticket_quantity = $request->ticket_quantity;
            $new_user->total_price = $total_price;
            $new_user->purchase_date = now();
            $new_user->visit_date = $request->visit_date;
            $new_user->save();

            return redirect('/tiket')->with('success', 'Tiket berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect('/add/user')->with('fail', $e->getMessage());
        }
    }


    
    public function deleteUser($id)
    {
        try {
            User::where('id', $id)->delete();
            return redirect('/users')->with('success', 'Tiket berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/users')->with('fail', $e->getMessage());
        }
    }
}





