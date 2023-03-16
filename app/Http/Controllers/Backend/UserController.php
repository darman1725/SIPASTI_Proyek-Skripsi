<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\{UserRequest, UpdateUserRequest, UpdatePasswordRequest, ProfileRequest};
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(UserRequest $request)
    {
        $attr = $request->validated();
        $attr['password'] = bcrypt($request->password);
        User::create($attr);

        return redirect()->route('users.index')->with('success', __('User created successfully.'));
    }

    public function show(User $user)
    {
        return view('backend.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $attr = $request->validated();

        if (is_null($request->password)) {
            unset($attr['password']);
        } else {
            $attr['password'] = bcrypt($request->password);
        }

        $user->update($attr);

        return redirect()->route('users.index')->with('success', __('User updated successfully.'));
    }

    public function status($id)
    {
        $user = User::find($id);
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();

        return redirect()->route('users.index')->with('success', __('User updated successfully.'));
    }

    public function password($id)
    {
        $user = User::find($id);

        return view('backend.user.password', compact('user'));
    }

    public function passwordUpdate(UpdatePasswordRequest $request, User $user)
    {
        $attr = $request->validated();

        $attr['password'] = bcrypt($request->password);

        $user->update($attr);

        return redirect()->route('users.index')->with('success', __('User updated successfully.'));
    }

    public function profile($id)
    {
        $user = User::find($id);
        $profile = Profile::where('user_id', $user->id)->first();
        return view('backend.user.editProfile', compact('user', 'profile'));
    }

    public function profileUpdate(ProfileRequest $request, $id)
    {
        $attr = $request->validated();
        $profile = Profile::where('user_id', $id)->first();

        if ($request->file('avatar') && $request->file('avatar')->isValid()) {

            $filename = $request->file('avatar')->hashName();

            if (!file_exists($folder = storage_path('app/public/avatar/'))) {
                mkdir($folder, 0777, true);
            }

            if (empty($profile->avatar)) {
                Image::make($request->file('avatar')->getRealPath())->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save(storage_path('app/public/avatar/') . $filename);
            } elseif ($profile->avatar != null && file_exists($oldAvatar = storage_path('app/public/avatar/' .
                $profile->avatar))) {
                unlink($oldAvatar);
                Image::make($request->file('avatar')->getRealPath())->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save(storage_path('app/public/avatar/') . $filename);
            }

            $attr['avatar'] = $filename;
        }

        $user = User::find($id);
        Profile::updateOrCreate(['user_id' => $user->id], $attr);
        return redirect()->route('profile', $user->id)->with('success', __('Profile updated successfully.'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', __('User success move to trash.'));
    }

    public function trash()
    {
        $users = User::onlyTrashed()->paginate(5);
        return view('backend.user.trash', compact('users'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        if ($user->trashed()) {
            $user->restore();
            return redirect()->route('users.trash')->with('success', 'Data successfully restored');
        } else {
            return redirect()->route('users.trash')->with('success', 'Data is not in trash');
        }
    }

    public function deletePermanent($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        if (!$user->trashed()) {
            return redirect()->route('users.trash')->with('success', 'Data is noting trash!');
        } else {
            if (empty($user->profile->avatar)) {
                $user->forceDelete();
            } elseif ($user->profile->avatar != null && file_exists($oldAvatar = storage_path('app/public/avatar/' .
                $user->profile->avatar))) {
                unlink($oldAvatar);
                $user->forceDelete();
            }

            return redirect()->route('users.trash')->with('success', 'Data permanently deleted!');
        }
    }
}