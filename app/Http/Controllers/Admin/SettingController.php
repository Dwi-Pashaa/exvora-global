<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        return view("admin.setting.index");
    }

    public function updateAccount(Request $request)
    {
        $userId = Auth::user()->id;

        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email," . $userId,
            "password" => "nullable|min:8|confirmed",
            "password_confirmation" => "nullable|min:8",
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user = User::find($userId);
        $user->update($data);

        return back()->with('success', 'Berhasil menyimpan data.');
    }

    public function companie()
    {
        return view("admin.setting.companie");
    }

    public function updateCompanie(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|string",
            "telp" => "required|string",
            "address" => "required|string",
            "twitter" => "required|string",
            "facebook" => "required|string",
            "instagram" => "required|string",
            "linkedin" => "required|string",
            "image" => "nullable|mimes:png,jpg,jpeg|max:2048",
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('logo/'), $fileName);

            $data['image'] = 'logo/' . $fileName;
        }

        Company::updateOrCreate(
            ['id' => $request->id ?? 1],
            $data
        );

        return back()->with('success', 'Berhasil menyimpan data.');
    }

    public function seo()
    {
        return view("admin.setting.seo");
    }
}
