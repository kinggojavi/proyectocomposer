<?php
namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    	public function index()
	{
	        $cases = Case::all();
	        return view('cases.index', compact('cases'));
	}

	public function show($id)
	{
	        $case = Case::findOrFail($id);
	        return view('cases.show', compact('case'));
	}

	        
	public function store(Request $request)
	{
		$validatedData = $request->validate([
		'id_municipality' => 'required|integer',
		'age' => 'required|integer',
		'id_gender' => 'required|integer',
		'id_type_contagion' => 'required|integer',
		'id_status' => 'required|integer',
		'date_symptom' => 'required|date',
		'date_death' => 'nullable|date',
		'date_diagnosis' => 'required|date',
		'date_recovery' => 'nullable|date',
		], [
		'id_municipality.required' => 'El campo Municipality es obligatorio.',
		'age.required' => 'El campo Age es obligatorio.',
		'id_gender.required' => 'El campo Gender es obligatorio.',
		'id_type_contagion.required' => 'El campo Type of Contagion es obligatorio.',
		'id_status.required' => 'El campo Status es obligatorio.',
		'date_symptom.required' => 'El campo Date of Symptom es obligatorio.',
		'date_symptom.date' => 'El campo Date of Symptom debe ser una fecha válida.',
		'date_death.date' => 'El campo Date of Death debe ser una fecha válida.',
		'date_diagnosis.required' => 'El campo Date of Diagnosis es obligatorio.',
		'date_diagnosis.date' => 'El campo Date of Diagnosis debe ser una fecha válida.',
		'date_recovery.date' => 'El campo Date of Recovery debe ser una fecha válida.',
		]);
		$case = Case::create($validatedData);
		return redirect('/cases')->with('success', 'Caso creado correctamente.');
	}


	public function update(Request $request, $id)
	{
		$validatedData = $request->validate([
		'id_municipality' => 'required|integer',
		'age' => 'required|integer',
		'id_gender' => 'required|integer',
		'id_type_contagion' => 'required|integer',
		'id_status' => 'required|integer',
		'date_symptom' => 'required|date',
		'date_death' => 'nullable|date',
	 	'date_diagnosis' => 'required|date',
		'date_recovery' => 'nullable|date',
		], [
		'id_municipality.required' => 'El campo Municipality es obligatorio.',
		'age.required' => 'El campo Age es obligatorio.',
		'id_gender.required' => 'El campo Gender es obligatorio.',
		'id_type_contagion.required' => 'El campo Type of Contagion es obligatorio.',
		'id_status.required' => 'El campo Status es obligatorio.',
		'date_symptom.required' => 'El campo Date of Symptom es obligatorio.',
		'date_symptom.date' => 'El campo Date of Symptom debe ser una fecha válida.',
		'date_death.date' => 'El campo Date of Death debe ser una fecha válida.',
		'date_diagnosis.required' => 'El campo Date of Diagnosis es obligatorio.',
		'date_diagnosis.date' => 'El campo Date of Diagnosis debe ser una fecha válida.',
		'date_recovery.date' => 'El campo Date of Recovery debe ser una fecha válida.',
		]);
		$case = Case::findOrFail($id);
		$case->update($validatedData);
		return redirect('/cases')->with('success', 'Caso actualizado correctamente.');
	}



       	public function destroy($id)
  	{
		$case = Case::findOrFail($id);
		$case->delete();
		return redirect('/cases')->with('success', 'Caso eliminado correctamente.');
       	}
}

