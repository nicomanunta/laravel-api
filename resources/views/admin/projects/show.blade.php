@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <img class="dettaglio-immagine" src="{{$project->cover_immagine !== null ? asset('/storage/' . $project->cover_immagine) : asset('/img/immagine.png')}}" alt="{{$project->nome_progetto}}">
                </div>
                <h2>{{$project->nome_progetto}}</h2>
                <span>{{$project->slug}}</span>
                <p class="mt-5">{{$project->descrizione}}</p>
                <p>
                    @forelse ($project->technologies as $technology)
                        #{{$technology->name}}
                    @empty
                        Le tecnologie usate in questo progetto non sono specificate
                    @endforelse
                </p>
                
                <span class="mt-5">Tipo: {{$project->type ? $project->type->name : 'Senza tipo'}}</span>
                <br>
                <span class="mt-5">data: {{$project->data}}</span>
                

                <div class="d-flex justify-content-end ">
                    <a href="{{ route('admin.projects.edit', ['project'=>$project->id])}}" class="mx-2"><button class="btn btn-sm btn-square btn-warning">Modifica progetto</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection