<?php

namespace App\Http\Controllers;
use App\Services\SaveImageService; // Assurez-vous d'importer la classe SaveImageService

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    protected $saveImageService;

    public function __construct(SaveImageService $saveImageService)
    {
        $this->saveImageService = $saveImageService;
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $pageTitle = 'Modifier Profile';
        return view('admin.profile.edit',compact('pageTitle'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validate the incoming request
        $validatedData = $request->validated();
    
        // Check if an image was uploaded
        if ($request->hasFile('profile_image')) {
            // Get the uploaded file
            $image = $request->file('profile_image');
    
            // Generate a unique filename
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    
            // Move the uploaded file to a storage directory
            $image->storeAs('public/profile-images/', $filename);
    
            // Update user's profile with the new image filename
            $user = Auth::user();
            $user->profile_image = $filename;
            $user->save();
        }
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile image updated successfully.');
    }
    
    /**
     * Delete the user's account.
     */
    public function displayProfileImage()
{
    // Get the authenticated user
    $user = Auth::user();

    // Check if the user has a profile image
    if ($user->profile_image) {
        // Get the full path to the profile image
        $imagePath = storage_path('public/profile-images/' . $user->profile_image);

        // Check if the image file exists
        if (file_exists($imagePath)) {
            // Return the image content with appropriate headers
            return response()->file($imagePath);
        }
    }

    // Return a default image or placeholder if no profile image is found
    $defaultImagePath = public_path('default-profile-image.jpg');
    return response()->file($defaultImagePath);
}
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

        return Redirect::to('/');
    }

    public function editPassword(Request $request): View
    {
        $pageTitle = 'Modifier Mot De Passe';
        return view('admin.profile.edit-password',compact('pageTitle'));
    }
}
