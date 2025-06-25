<?php


namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedecinController extends Controller
{
    public function index()
    {
        $medecins = Medecin::with('patients')->paginate(10);
        return view('medecin.medecin', compact('medecins'));
    }

    public function create()
    {
        $medecin = new Medecin();
        return view('medecin.addMedecin', compact('medecin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
            'email' => 'required|email|unique:medecins',
            'telephone' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $medecin = new Medecin();
        $medecin->nom = $request->nom;
        $medecin->specialite = $request->specialite;
        $medecin->email = $request->email;
        $medecin->telephone = $request->telephone;
        $medecin->photo = $photoPath;
        $medecin->save();

        return redirect()->route('medecins')->with('success', 'Médecin ajouté avec succès');
    }

    public function edit($id)
    {
        $medecin = Medecin::findOrFail($id);
        return view('medecin.addMedecin', compact('medecin'));
    }

    public function update(Request $request, $id)
    {
        $medecin = Medecin::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
            'email' => 'required|email|unique:medecins,email,' . $medecin->id,
            'telephone' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $medecin->nom = $request->nom;
        $medecin->specialite = $request->specialite;
        $medecin->email = $request->email;
        $medecin->telephone = $request->telephone;

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne image si elle existe
            if ($medecin->photo && Storage::disk('public')->exists($medecin->photo)) {
                Storage::disk('public')->delete($medecin->photo);
            }
            $medecin->photo = $request->file('photo')->store('photos', 'public');
        }

        $medecin->save();

        return redirect()->route('medecins')->with('success', 'Médecin modifié avec succès');
    }

    public function destroy($id)
    {
        $medecin = Medecin::findOrFail($id);
        if ($medecin->photo && Storage::disk('public')->exists($medecin->photo)) {
            Storage::disk('public')->delete($medecin->photo);
        }

        $medecin->delete();

        return redirect()->route('medecins')->with('success', 'Médecin supprimé avec succès');
    }
}