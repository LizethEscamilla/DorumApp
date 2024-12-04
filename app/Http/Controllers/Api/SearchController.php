<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $donors = collect(); // Lista vacía por defecto

        
        if ($request->has('text') && !empty($request->get('text'))) {
            $searchText = strtolower($request->get('text')); 

            
            $bloodTypePattern = '/^(A|B|AB|O)[\+\-]$/i';

        
            if (preg_match($bloodTypePattern, $searchText)) {
                $donors = Donor::whereRaw('LOWER(tipo_sangre) LIKE ?', ['%' . $searchText . '%'])->get();
            } elseif (is_numeric($searchText)) {
                
                $donors = Donor::where('id', $searchText)
                    
                    ->get();
            } else {
               
                $donors = Donor::whereRaw('LOWER(name) LIKE ?', ['%' . $searchText . '%'])
                    
                    ->get();
            }
        } else {
           
            $donors = Donor::all();
        }

        
        if ($request->wantsJson()) {
            return $donors->count()
                ? response()->json($donors)
                : response()->json(['error' => 'Sin resultados, ingrese otros campos para la búsqueda.'], 404);
        }

        return view('index', compact('donors'));
    }
}
