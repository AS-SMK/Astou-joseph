@extends('welcome')

@section('content')

<form action="{{ route($patient->id ? 'updatePatient' : 'savePatient', $patient->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method($patient->id ? 'put' : 'post')

    <label for="">Nom</label>
    <input type="text" name="nom" class="form-control" value="{{ $patient->id ? $patient->nom : old('nom') }}">
    @error('nom')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror

    <label for="">Date de naissance</label>
    <input type="date" name="date_naissance" class="form-control" value="{{ $patient->id ? $patient->date_naissance : old('date_naissance') }}">
    @error('date_naissance')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror

    <label for="">Médecin traitant</label>
    <select name="medecin_id" class="form-control">
        <option value="">-- Choisir un médecin --</option>
        @foreach($medecins as $medecin)
            <option value="{{ $medecin->id }}" @if($patient->medecin_id == $medecin->id) selected @endif>
                {{ $medecin->nom }} ({{ $medecin->specialite }})
            </option>
        @endforeach
    </select>
    @error('medecin_id')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror

    <button type="submit" class="btn btn-success">
        {{ $patient->id ? 'Mettre à jour' : 'Enregistrer' }}
    </button>
</form>

@endsection
