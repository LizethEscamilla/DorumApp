<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Support\Facades\File;
use PDF;


class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donors=Donor::all();
        return view('index', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar'); 
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            
            $donor = new Donor();
            $donor->name = $request->input('name');
            $donor->fecha_nacimiento = $request->input('fecha_nacimiento');
            $donor->tipo_sangre = $request->input('tipo_sangre');
            $donor->genero = $request->input('genero');
            $donor->historial_medico = $request->input('historial_medico');
            $donor->avatar = $name;
            $donor->save();
    
            return 'Guardado';

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Donor $donor)
    {
        return view('show', compact('donor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donor $donor)
    {
        return view ('edit', compact('donor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donor $donor) 
    {
        $donor->fill($request->except('avatar'));
    
        if ($request->hasFile('avatar')) {
            // Eliminar la imagen anterior si existe
            $file_path = public_path('images/'.$donor->avatar);
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
    
            // Guardar la nueva imagen
            $file = $request->file('avatar'); 
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
    
            // Actualizar el nombre del archivo en el modelo
            $donor->avatar = $name;
        }
    
        $donor->save();
        return redirect('donors/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donor = Donor::find($id);
        if ($donor->delete($id))
        {
            $file_path = public_path('images/'.$donor->avatar);
            if (File::exists($file_path)){
                File::delete($file_path);
                echo 'File deleted successfully.';
            } else {
                echo 'File does not exist.';
            }

            return redirect('donors/');
    }
        else
            return 'El '.$id. "No se pudo borrar";
        
        }
        public function generatePDF()
        {
            $donors = Donor::get();

        
            $data = [
                'date' => date('d/m/Y'),
                'donors' => $donors 
            ]; 
                  
            $pdf = PDF::loadView('myPDF', $data);
               
            return $pdf->download('listado.pdf');
        }
}
    
