@extends('layouts.main')
@section('home')
<script src="https://cdn.tailwindcss.com"></script>
    <div class="container">
        <div class="mt-5 text-5xl font-extrabold text-center">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
            Liste des tickets
            </span>
            <h2>{{$somme ?? "Aucune somme total"}}€</h2>
        </div>
        <div class="mt-5">
            <a href="tickets/create">
                <button type="submit"  style="background-color:green" class="col-12 bg-info">Ajouter un ticket</button>
            </a>
        </div>
        <div class="container" style="">
            <table class="table table-striped">
              <thead>
                <tr>
                  {{-- <th scope="col">#</th> --}}
                  <th scope="col">Date</th>
                  <th class="rounded-full">Magasin</th>
                  <th scope="col">Description</th>
                  <th scope="col">Montant</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($tickets as $ticket)
                      <tr>
                        {{-- <th scope="row">{{$ticket->id}}</th> --}}
                        <td>{{$ticket->created_at->format('d/m/Y') ?? "Pas de saisie"}}</td>
                        <td>{{$ticket->store ?? "Pas de saisie"}}</td>
                        <td>{{$ticket->description ?? "Pas de saisie"}}</td>
                        <td>{{($ticket->price/100) ?? "Pas de saisie"}}€</td>
                        <td><a href="tickets/edit/{{$ticket->id}}"><i class="fa fa-pen"></i></a></td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            <div class="">
                <a href="tickets/create">
                    <button type="submit"  style="background-color:green" class="col-12 bg-info">Ajouter un ticket</button>
                </a>
            </div>
        </div>
    </div>
@endsection
