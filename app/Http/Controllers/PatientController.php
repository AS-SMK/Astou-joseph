<?php


namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Medecin;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('medecin')->paginate(10);
        return view('patients.patient', compact('patients'));
    }

    public function create()
    {
        $patient = new Patient();
        $medecins = Medecin::all();
        return view('patients.addPatient', compact('patient', 'medecins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'date_naissance' => 'required|date',
            'medecin_id' => 'required|exists:medecins,id',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('message', 'Patient ajouté avec succès.');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $medecins = Medecin::all();
        return view('patients.patient', compact('patient', 'medecins'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'date_naissance' => 'required|date',
            'medecin_id' => 'required|exists:medecins,id',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('patient')->with('message', 'Patient modifié avec succès.');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patient')->with('messageDelete', 'Patient supprimé avec succès.');
    }

    public function show($id)
    {
        $patient = Patient::with('medecin')->findOrFail($id);
        return view('patients.show', compact('patient'));
    }
}