@extends('layouts.app')

@section('title', 'Edit Repo -Laravel')


@section('content')

    <div class="container">
        <h1>Edit della Repo</h1>
        <div class="d-flex">
            <div>
                {{-- Utilizziamo l'include del file blade upsert per poter utilizzare un form in più pagine --}}
                @include('admin.projects.forms.upsert', [
                    // assegniamo all'action la rotta da seguire al form
                    'action' => route('admin.projects.update', $project->slug),
                    //assegniamo il method per utilizzarlo nel form
                    'method' => 'PUT',
                    'project' => $project,
                ])
            </div>
            <div>
                {{-- Utilizziamo questo form per eliminare la repo(in quetso caso) --}}
                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="my-small-button"><span>Elimina</span></button>
                </form>
            </div>
        </div>
    </div>

@endsection
