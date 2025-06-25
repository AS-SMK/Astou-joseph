@extends('welcome')

@section('content')

<a href="{{ route('addMedecin') }}" class="btn btn-success">Add</a>

@if(session("message"))
    <div class="alert alert-success">
        {{ session("message") }}
    </div>
@endif

@if(session("messageDelete"))
    <div class="alert alert-danger">
        {{ session("messageDelete") }}
    </div>
@endif

<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Nom</th>
            <th>Spécialité</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Patients</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medecins as $medecin)
            <tr>
                <td>
                    @if($medecin->photo)
                        <img src="{{ asset('storage/' . $medecin->photo) }}" width="90px">
                    @else
                        <img src="{{ asset('storage/images/user.png') }}" width="90px">
                    @endif
                </td>
                <td>{{ $medecin->nom }}</td>
                <td>{{ $medecin->specialite }}</td>
                <td>{{ $medecin->email }}</td>
                <td>{{ $medecin->telephone }}</td>
                <td>{{ $medecin->patients_count ?? 0 }}</td>
                <td>
                   <form action="{{ route('medecins.destroy', $medecin->id) }}" method="POST" style="display:inline;">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <a class="btn btn-primary" href="{{ route('medecins.edit', $medecin->id) }}">Update</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $medecins->links() }}

@endsection
