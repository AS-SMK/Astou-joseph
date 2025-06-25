@extends('welcome')

@section('content')

<a href="{{ route('addPatient') }}" class="btn btn-success">Add</a>

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
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Médecin traitant</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->nom }}</td>
                <td>{{ $patient->date_naissance }}</td>
                <td>{{ $patient->medecin->nom ?? 'N/A' }}</td>
                <td>
                    <form action="{{ route('deletePatient', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <a class="btn btn-primary" href="{{ route('updatePatient', $patient->id) }}">Update</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $patients->links() }}

@endsection
