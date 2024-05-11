<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Models\User;
use App\Services\SaveImageService;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    protected $saveImageService;

    public function __construct(SaveImageService $saveImageService)
    {
        $this->saveImageService = $saveImageService;
    }
    public function index()
    {
        $types = Type::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Types';
        return view('admin.type.index', compact('types', 'pageTitle'));
    }

    public function add()
    {
        $pageTitle = 'Ajouter Type De Voiture';
        return view('admin.type.add', compact('pageTitle'));
    }

    public function store(TypeRequest $request)
    {
        // The data has already been validated by TypeRequest
        $validatedData = $request->validated();
        $company = auth()->user()->company->name;

        // Check if an image file is provided in the request
        if ($request->hasFile('image')) {
            // Use SaveImageService to upload the image. Specify 'types' as the directory and an empty string for the document type
            $imagePath = $this->saveImageService->uploadImage($request, 'image',$company ,'types', '');

            // If the image was successfully uploaded, add its path to the validated data
            if ($imagePath) {
                $validatedData['image'] = $imagePath; // Update the image path in the validated data
            }
        }
        $validatedData['company_id'] = auth()->user()->company_id;
        // Create the new Type with the validated data
        if (Type::create($validatedData)) {
            // Redirect to the 'type.index' route with a success notification
            return redirect()->route('type.index')->with('notify', [['success', 'Type ajoutée avec succès']]);
        }
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id); // Retrieve the type or fail with a 404 error
        $pageTitle = 'Modifier Type De Voiture';
        return view('admin.type.edit', compact('type', 'pageTitle'));
    }

    public function update(TypeRequest $request, $id)
    {
        $validatedData = $request->validated();
        $company = auth()->user()->company->name;

        // Find the Type instance by ID
        $type = Type::findOrFail($id);

        if ($request->hasFile('image')) {
            // Use SaveImageService to upload the image. Specify 'types' as the directory and an empty string for the document type
            $imagePath = $this->saveImageService->uploadImage($request, 'image', $company , 'types', '');

            // If the image was successfully uploaded, update the image path in the validated data
            if ($imagePath) {
                $validatedData['image'] = $imagePath;
            }
        }

        // Update the Type with the validated data
        if ($type->update($validatedData)) {
            return redirect()->route('type.index')->with('notify', [['success', 'Type modifié avec succès']]);
        }
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        if ($type->delete()) {
            return redirect()->route('type.index')->with('notify', [['success', 'Type supprimée avec succès']]);
        }
    }
}
