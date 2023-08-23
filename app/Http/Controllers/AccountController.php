<?php

namespace App\Http\Controllers;

// use App\Models\Account;
use App\Models\Account;

use App\Models\usersses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Lấy danh sách tất cả các tài khoản.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser()
    {
        $accounts = usersses::all();

        return response()->json($accounts, 200);
    }

    /**
     * Tạo một tài khoản mới.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function CreatAcount(Request $request)
{
    $account = new usersses();
    $account->lastname = $request->input('lastname');
    $account->firstname = $request->input('firstname');
    $account->email = $request->input('email');
    $account->phone = $request->input('phone');
    $account->password = Hash::make($request->input('password'));
    $account->save();

    return response()->json([
        'message' => 'Account created successfully',
        'account' => $account,
    ], 201);
}

/**
 * Đăng nhập với email và mật khẩu.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\JsonResponse
 */
// public function login(Request $request)
// {
//     $email = $request->input('email');
//     $password = $request->input('password');

//     $account = usersses::where('email', $email)->first();
    
//     if (!$account || !Hash::check($password, $account->password)) {
//         return response()->json([
//             'message' => 'Invalid email or password',
//         ], 401);
//     }
//     $token = $account->createToken('API Token')->plainTextToken;
    
//     // Get the associated User model
//     $user = $account->user;
    
//     // Access the user's properties, e.g., user ID
//     $user_id = $user->id;
//     if($account->role){
//         return response()->json([
//             'message' => 'Login admin successfully',
//             'token' => $token,
//             'user_id' => $user_id,
//             'role'=>1
//         ]);
//     }

//     return response()->json([
//         'message' => 'Login successfully',
//         'token' => $token,
//         'user_id' => $user_id,
//         'role'=>0
//     ]);
// }
// /**
//  * Đăng xuất.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @return \Illuminate\Http\JsonResponse
//  */
// public function Logout(Request $request)
// {
//     $account = $request->user();
//     $account->tokens()->delete();

//     return response()->json([
//         'message' => 'Logged out successfully',
//     ]);
// }

    /**
     * Hiển thị thông tin của tài khoản dựa trên email.
     *
     * @param  string  $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($email)
    {
        $account = usersses::where('email', $email)->first();

        if (!$account) {
            return response()->json([
                'message' => 'Account not found',
            ], 404);
        }

        return response()->json([
            'id_users' => $account->id_users,
            'email' => $account->email,
        ]);
    }
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
    
        $account = usersses::where('email', $email)->first();
    
        return response()->json([
            'exists' => $account ? true : false,
        ]);
    }
    

}
// http_proxy
// php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"