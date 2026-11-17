<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    public function allGifts(){
        $gifts=$this->getAllGifts();

        return view('gifts.allgifts', compact('gifts'));
    }

    public function addGifts(){
        $users = $this->getAllUsers();

        return view('gifts.addgift', compact('users'));
    }

    private function getAllUsers(){
        $users = User::select('id','name')->get();

        return $users;
    }

    public function storeGifts(Request $request){
        $request->validate([
            'name' => 'max:50|string|required',
            'expected_value' => 'required|numeric',
            'spent_value' => 'nullable|numeric',
            'user_id' =>'required'
        ]);

        Gift::insert([
            'name' => $request->name,
            'expected_value' => $request->expected_value,
            'spent_value' => $request->spent_value,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('gifts.all')->with('message', 'Prenda adicionada com sucesso!');
    }

    public function editGifts(int $id){
        $giftInfo = Gift::where('id', $id)->select('id','name','expected_value','spent_value','user_id')->first();
        $users = $this->getAllUsers();

        return view('gifts.editgift', compact('giftInfo', 'users'));
    }

    public function updateGift(Request $request){
        $request->validate([
            'name' => 'max:50|string|required',
            'expected_value' => 'required|numeric',
            'spent_value' => 'nullable|numeric',
            'user_id' =>'required'
        ]);

        Gift::where('id', $request->id)->update([
            'name' => $request->name,
            'expected_value' => $request->expected_value,
            'spent_value' => $request->spent_value,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('gifts.all')->with('message', 'Prenda actualizada com sucesso!');
    }

    public function deleteGifts(int $id){
        Gift::where('id', $id)->delete();

        return back();
    }

    protected function getAllGifts(){
        $gifts= Gift::join('users', 'gifts.user_id','=' ,'users.id')
        ->select('gifts.id', 'gifts.name', 'gifts.expected_value', 'gifts.spent_value','users.name as user_name')
        ->get();

        return $gifts;
    }
}