<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {

        $loggedId = Auth::id();

        $user = User::find($loggedId);

        if ($user) {
            return view('admin.profile.index', ['user' => $user]);
        }

        return redirect()->route('painel');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $loggedId = Auth::id();
        $user = User::find($loggedId);

        if ($user) {

            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);

            $validator = Validator::make(
                [
                    'name' => $data['name'],
                    'email' => $data['email']
                ],
                [
                    'name' => ['required', 'string', 'max:100'],
                    'email' => ['required', 'string', 'email', 'max:100']
                ]
            );


            $user->name = $data['name'];

            if ($user->email != $data['email']) {
                $hasEmail = User::where('email', $data['email'])->get();

                if (count($hasEmail) === 0) {
                    $user->email = $data['email'];
                } else {
                    $validator->errors()->add('email', __('validation.unique', [
                        'attribute' => 'email'
                    ]));
                }
            }

            if (!empty($data['password'])) {
                if (strlen($data['password']) >= 8) {
                    if ($data['password'] === $data['password_confirmation']) {
                        $user->password = Hash::make($data['password']);
                    } else {
                        $validator->errors()->add('password', __('validation.confirmed', [
                            'attribute' => 'password'
                        ]));
                    }
                } else {
                    $validator->errors()->add('password', __('validation.min.string', [
                        'attribute' => 'password',
                        'min' => 8
                    ]));
                }
            }

            if (count($validator->errors()) > 0) {
                return redirect()->route('profile.edit')->withErrors($validator);
            }

            $user->save();

            return redirect(route('profile.edit'))
                ->with('warning','Informações alteradas com sucesso!');
        }

        return redirect(route('painel'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }
}
