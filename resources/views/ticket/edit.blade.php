@extends('layouts.main')
@section('home')
    <div class="container mt-5">
        <h1 class="text-center">Ajouter un ticket</h1>
        <div class="text-center">
            <a href="/tickets"><button type="submit" href="tickets" class="col-6 btn btn-success">Annuler, retourner à l'accueil</button></a>
        </div>
        <form method="post" action="{{ route('ticket.store') }}" class="mt-5">
            @csrf
            <input type="hidden" name="id" value="{{$ticket->id}}">
            <div class="form-group">
                <label for="InputEnseigne">Enseigne</label>
                <input type="text" class="@error('store') is-invalid @enderror form-control" value="{{$ticket->store ?? old('store')}}" id="store" name="store" aria-describedby="emailHelp" placeholder="Entrer le nom de l'enseigne">
            </div>
            <div class="form-group">
                <label for="InputDescription">Description</label>
                <input is-invalid type="text" class="@error('description') is-invalid @enderror form-control"  value="{{$ticket->description ?? old('description')}}" id="description" name="description" placeholder="Description">
            </div>
            <div class="form-group">
                <label for="InputPrice">Montant</label>
                <input is-invalid type="text" class="@error('price') is-invalid @enderror form-control"  value="{{($ticket->price/100) ?? old('price')}}" id="price" name="price" aria-describedby="emailHelp" placeholder="Montant du ticket">
            </div>
            <button type="submit" class="col-12 text-center btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
