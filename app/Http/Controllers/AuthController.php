<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;
use App\Models\LevelModel;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function login()
    {
        // Cek apakah user sudah login
        if(Auth::check()){ 
            // Jika sudah login, redirect ke halaman home
            return redirect('/');
        }
        // Jika belum login, tampilkan halaman login
        return view('auth.login');
    }

    /**
     * Memproses request login
     */
    public function postlogin(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:20',
            'password' => 'required|min:6|max:20'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            if($request->ajax() || $request->wantsJson()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            return redirect('login')->withErrors($validator)->withInput();
        }

        // Ambil kredensial dari request
        $credentials = $request->only('username', 'password');

        // Coba login
        if (Auth::attempt($credentials)) {
            // Regenerate session setelah login berhasil (security best practice)
            $request->session()->regenerate();

            if($request->ajax() || $request->wantsJson()){
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
            
            // Redirect ke halaman home jika berhasil
            return redirect()->intended('/');
        }

        // Jika login gagal
        if($request->ajax() || $request->wantsJson()){
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal',
                'msgField' => ['username' => ['Username atau password salah']]
            ]);
        }
        
        // Redirect kembali ke halaman login dengan pesan error
        return redirect('login')
            ->withErrors(['username' => 'Username atau password salah'])
            ->withInput($request->except('password'));
    }

        /**
     * Proses logout
     */
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();
        
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        
        // Redirect ke halaman login
        return redirect('login')->with('success', 'Anda berhasil logout');
    }

    /**
     * Menampilkan halaman register
     */
    public function register()
    {
        // Cek apakah user sudah login
        if(Auth::check()){ 
            // Jika sudah login, redirect ke halaman home
            return redirect('/');
        }

        // Ambil data level untuk dropdown
        $levels = LevelModel::all();
        
        // Jika belum login, tampilkan halaman register
        return view('auth.register', compact('levels'));
    }

    /**
     * Memproses request register
     */
    public function postregister(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:20|unique:m_user,username',
            'nama' => 'required|min:4|max:100',
            'password' => 'required|min:6|max:20|confirmed',
            'level_id' => 'required|exists:m_level,level_id'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            if($request->ajax() || $request->wantsJson()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            return redirect('register')->withErrors($validator)->withInput($request->except('password', 'password_confirmation'));
        }

        // Buat user baru
        $user = new UserModel();
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;
        $user->save();

        // Redirect ke halaman login dengan pesan sukses
        if($request->ajax() || $request->wantsJson()){
            return response()->json([
                'status' => true,
                'message' => 'Registrasi Berhasil',
                'redirect' => url('login')
            ]);
        }

        return redirect('login')->with('success', 'Registrasi berhasil, silahkan login');
    }
}
