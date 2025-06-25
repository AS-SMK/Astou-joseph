@extends('welcome')

@section('content')

<form action="{{ route($medecin->id ? 'medecins.update' : 'medecins.store', $medecin->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method($medecin->id ? 'put' : 'post')

    <label for="">Photo</label>
    <input type="file" name="photo" class="form-control">
    @if($medecin->photo)
        <img src="{{ asset('storage/' . $medecin->photo) }}" alt="Photo" width="100" class="my-2">
    @endif

    <label for="">Nom</label>
    <input type="text" name="nom" class="form-control" value="{{ $medecin->id ? $medecin->nom : old('nom') }}">
    @error('nom')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror

    <label for="">Spécialité</label>
    <input type="text" name="specialite" class="form-control" value="{{ $medecin->id ? $medecin->specialite : old('specialite') }}">
    @error('specialite')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror

    <label for="">Email</label>
    <input type="email" name="email" class="form-control" value="{{ $medecin->id ? $medecin->email : old('email') }}">
    @error('email')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror

    <label for="">Téléphone</label>
    <input type="text" name="telephone" class="form-control" value="{{ $medecin->id ? $medecin->telephone : old('telephone') }}">
    @error('telephone')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror

    <button type="submit" class="btn btn-success">
        {{ $medecin->id ? 'Mettre à jour' : 'Enregistrer' }}
    </button>
</form>

@endsection
