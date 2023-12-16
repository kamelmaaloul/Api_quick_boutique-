<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /*
    * cretae new User
    * @var array $data
    *@return User
    */
    
    public function create(array $data) :User
    {
        $user = new User();
        $user->fill($data);
        $user->save();

        return $user;        
    }

    public function update(int|User $user, array $data):User 
    {
        if(!($user instanceof User)){
            $user = User::findOrFail($user);
        }
        $user->fill($data);
        $user->save();
        
        return $user;
        
    }

    public function delete(int|User $user):bool
     {
        if(!($user instanceof User)){
            $user = User::findOrFail($user);
        }
        $user->delete();
        return true;

        
    }

    public function register(array $data):array
     {
        $user = $this->create($data);
        $token = $user->createToken('API_TOKEN')->plainTextToken;

        return compact('user','token');
               
    }

    public function login(array $data):bool
     {
        $isLogin = Auth::attempt($data);
        if($isLogin){
            $user = User::where('email',$data['email'])->first();
            $token = $user->createToken('API_TOKEN')->plainTextToken;

            return compact('user','token');

        }

        return false;
               
    }

    public function logout():bool
     {
    /**
    *@var User $user
    */
    $user = auth()->user();
    $user->tokens()->delete();
    return true;
               
    }

}
