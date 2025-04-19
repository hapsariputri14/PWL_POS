<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;

class UserProfileController extends Controller
{
    public function index()
    {
        $activeMenu = 'profile';
        $breadcrumb = (object) [
            'title' => 'Profil Pengguna',
            'list' => ['Home', 'Profil']
        ];

        $user = Auth::user();
        
        return view('profile.index', [
            'activeMenu' => $activeMenu,
            'breadcrumb' => $breadcrumb,
            'user' => $user
        ]);
    }

    public function updatePhoto(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $user = Auth::user();
            $userId = $user->user_id;

            // Hapus foto lama jika ada
            if ($user->photo && Storage::disk('public')->exists('profile_photos/' . $user->photo)) {
                Storage::disk('public')->delete('profile_photos/' . $user->photo);
            }

            // Upload foto baru
            $photo = $request->file('photo');
            $photoName = 'user_' . $userId . '_' . time() . '.' . $photo->getClientOriginalExtension();
            
            // Simpan foto ke storage
            $photo->storeAs('profile_photos', $photoName, 'public');

            // Update data user
            $userModel = UserModel::find($userId);
            $userModel->photo = $photoName;
            $userModel->save();

            return response()->json([
                'status' => true,
                'message' => 'Foto profil berhasil diperbarui',
                'photo_url' => asset('storage/profile_photos/' . $photoName)
            ]);
        }
        
        return redirect('/');
    }
}
