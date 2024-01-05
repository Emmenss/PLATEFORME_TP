

## Table of Contents

-   [Prerequisites](#prerequisites)
-   [Installation](#installation)
-   [Usage](#usage)
-   [Versions](#versions)
-   [Demo](#demo)
-   [Documentation](#documentation)
-   [Login](#login)
-   [Register](#register)
-   [Forgot Password](#forgot-password)
-   [Reset Password](#reset-password)
-   [User Profile](#my-profile)
-   [Dashboard](#dashboard)
-   [File Structure](#file-structure)
-   [Browser Support](#browser-support)
-   [Reporting Issues](#reporting-issues)
-   [Licensing](#licensing)
-   [Useful Links](#useful-links)
-   [Social Media](#social-media)
-   [Credits](#credits)

## Prerequisites

If you don't already have an Apache local environment with PHP and MySQL, use one of the following links:

-   Windows: https://updivision.com/blog/post/beginner-s-guide-to-setting-up-your-local-development-environment-on-windows
-   Linux & Mac: https://updivision.com/blog/post/guide-what-is-lamp-and-how-to-install-it-on-ubuntu-and-macos

Also, you will need to install Composer: https://getcomposer.org/doc/00-intro.md  
And Laravel: https://laravel.com/docs/10.x

## Installation

1.Unzip the downloaded archive

2.Copy and paste `corporate-dashboard-laravel` folder in your projects folder. Rename the folder to your project's name

3.In your terminal run composer install

4.Copy `.env.example` to `.env` and updated the configurations (mainly the database configuration)

5.In your terminal run `php artisan key:generate`

6.Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables

7.Run `php artisan storage:link` to create the storage symlink (if you are using Vagrant with Homestead for development, remember to ssh into your virtual machine and run the command from there).

## Usage

Register an user or login with data from your database and start testing (make sure to run the migrations and seeders for the credentials to be available).

`admin@corporateui.com` and password `secret`

Besides the dashboard, the auth pages, the billing and tables pages, it has also an edit profile page. All the necessary files are installed out of the box and all the needed routes are added to `routes/web.php`. Keep in mind that all of the features can be viewed once you login using the credentials provided or by registering your own user.


### Login

The login functionality is fully implemented in our theme helping you to start your project in no time. To login into dashboard you just have to add /login in the URL and fill the login form with one of the credentials (user: `admin@corporateui.com` and password: `secret`).

It uses the auth store located in `app/Http/Controllers/Auth/LoginController`.

```
public function store(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $rememberMe = $request->rememberMe ? true : false;

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
```

### Register

The register functionality is fully implemented in our theme helping you to start your project in no time. To register a new user you just have to add `/register` in the URL or click on signup link from login page and fill the register form with user details.

It uses the auth store located in `app/Http/Controllers/Auth/Register`.

```
public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:7|max:255',
            'terms' => 'accepted',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'terms.accepted' => 'You must accept the terms and conditions'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
```

### Forgot password

If an existing user forgot his password he has the possibility of resetting his password.

If a user forgets the account's password it is possible to reset the password. For this the user should click on the `"Recover here"` under the login form.

The `app/Http/Controllers/Auth/ForgotPassword` takes care of sending an email to the user where he can reset the password afterwards.

```
public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
```

### Reset password

The user who forgot the password gets an email on the account's email address. The user can access the reset password page by clicking the button found in the email. The link for resetting the password is available for 60 minutes. The user must add the new password and confirm the password for his password to be updated. The user is redirected to the login page.

The `app/Http/Controllers/Auth/ResetPassword` takes care of reseting the password.

```
public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
```

### My Profile

The profile can be accessed by a logged in user by clicking "**User Profile**" from the sidebar. The user can add information like phone number, location or change name, email and password.

The store used for users form can be found in `app/Http/Controllers/ProfileController`

```
public function update(Request $request)
    {
        if (config('app.is_demo') && in_array(Auth::id(), [1])) {
            return back()->with('error', "You are in a demo version. You are not allowed to change the email for default users.");
        }

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'location' => 'max:255',
            'phone' => 'max:20|min:10',
            'about' => 'max:255',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
        ]);

        $user = User::find(Auth::id());

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
            'phone' => $request->phone,
            'about' => $request->about,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }
```

### Dashboard

You can access the dashboard either by using the "**Dashboard**" link in the left sidebar or by adding **/dashboard** in the url after logging in.

## File Structure

```
.
|-- app
|   |-- Console
|   |   `-- Kernel.php
|   |-- Exceptions
|   |   `-- Handler.php
|   |-- Http
|   |   |-- Controllers
|   |   |   |-- Auth
|   |   |   |   |-- ForgotPasswordController.php
|   |   |   |   |-- LoginController.php
|   |   |   |   |-- RegisterController.php
|   |   |   |   `-- ResetPasswordController.php
|   |   |   |-- Controller.php
|   |   |   |-- ProfileController.php
|   |   |   `-- UserController.php
|   |   |-- Kernel.php
|   |   `-- Middleware
|   |       |-- Authenticate.php
|   |       |-- EncryptCookies.php
|   |       |-- PreventRequestsDuringMaintenance.php
|   |       |-- RedirectIfAuthenticated.php
|   |       |-- TrimStrings.php
|   |       |-- TrustHosts.php
|   |       |-- TrustProxies.php
|   |       |-- ValidateSignature.php
|   |       `-- VerifyCsrfToken.php
|   |-- Models
|   |   `-- User.php
|   |-- Providers
|   |   |-- AppServiceProvider.php
|   |   |-- AuthServiceProvider.php
|   |   |-- BroadcastServiceProvider.php
|   |   |-- EventServiceProvider.php
|   |   `-- RouteServiceProvider.php
|   `-- View
|       `-- Components
|           |-- AppLayout.php
|           |-- GuestLayout.php
|           `-- navbarGuest.php


