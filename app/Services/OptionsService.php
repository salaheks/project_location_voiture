<?php

namespace App\Services;

use App\Models\OptionSupplimentaire;

class OptionsService
{
    public function getOptions()
    {
        $options = OptionSupplimentaire::where('company_id', auth()->user()->company_id)->get();;
        $pageTitle = 'Options supplémentaire';
        return ['options' => $options, 'pageTitle' => $pageTitle];
    }

    public function storeOption($request)
    {
        $validated = $request->validated();
        $validated['company_id'] = auth()->user()->company_id;
        $option = new OptionSupplimentaire($validated);
        if ($option->save()) {
            return true;
        }

        return false;
    }

    public function updteOption($request,$option)
    {
        $validatedData = $request->validated();
        if ($option->update($validatedData)) {
            return true;
        }
        return false;
    }

    public function destroyOption($option){
        $option = OptionSupplimentaire::findOrFail($option->id);
        if ($option->delete()) {
            return true;
        } else {
            return false;
        }
    }
}
