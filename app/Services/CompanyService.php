<?php

namespace App\Services;

use App\Models\Vidange;
use App\Models\Voiture;

class CompanyService
{
    public function update($request, $company)
    {
        $validated = $request->validated();
        if ($company->update($validated)) {
            return true;
        }
        return false;
    }
}
