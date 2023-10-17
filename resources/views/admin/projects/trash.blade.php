@extends('layouts.app')

@section('title', 'Progetti - Cancellati')

@section('content')


    <div class="container">
        <h1>Lista dei prodotti candellati</h1>

        <div class="row border p-4 rounded shadow-lg mt-3 g-4">
            @foreach ($projects as $project)
                <div class="col-12">
                    <div class="card h-100 {{ request()->input('id') == $project->slug ? 'border-success' : '' }}">
                        <img src="{{ asset('storage/' . $project?->thumb) }}" class="card-img-top h-100" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->short_description }}</p>
                            <p class="badge" style="background-color: rgb({{ $project->type?->color }})">
                                {{ $project->type?->name }}</p>
                            <div class="row row-cols-5">
                                @foreach ($project->technologies as $technology)
                                    <div class="col">
                                        <i class="{{ $technology?->icon }} rounded-circle p-2"
                                            style="background-color: rgb({{ $technology?->color }}); width:30px; aspect-ratio:1/1"></i>
                                    </div>
                                @endforeach
                            </div>

                            <a href="{{ $project?->link }}" class="">Link</a>
                        </div>
                        <form action="{{ route('admin.projects.destroy', ['project' => $project->slug, 'force' => true]) }}"
                            method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina Permanentemente</button>
                        </form>
                    </div>
                    
                </div>
            @endforeach
        </div>


    @endsection
