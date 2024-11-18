<!-- resources/views/livewire/dorh/divisions/ajouter-divisions.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter une Division</h1>

        <!-- Affichage du message flash de succès -->
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Formulaire d'ajout de division -->
        <form wire:submit.prevent="ajouterDivision">
            <div class="form-group">
                <label for="libel">Nom de la Division</label>
                <input type="text" wire:model="ajouterdivisions.libel" id="libel" class="form-control" placeholder="Nom de la division">
                @error('ajouterdivisions.libel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection
