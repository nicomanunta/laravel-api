@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-4">Aggiungi un nuovo progetto</h2>
            </div>
            <div class="col-12">
                <form action="{{route('admin.projects.update', $project->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-group mb-3">
                        <label for="nome_progetto">Nome del progetto</label>
                        <input type="text" class="form-control" name="nome_progetto" id="nome_progetto" placeholder="Nome del progetto" value="{{$project->nome_progetto}}">
                        @error('nome_progetto')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="descrizione">Descrizione</label>
                        <textarea class="form-control" name="descrizione" id="descrizione" cols="30" rows="10" placeholder="Descrizione">{{$project->descrizione}}"</textarea>
                        @error('descrizione')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="data">Data</label>
                        <input type="date" class="form-control" name="data" id="data" placeholder="data" value="{{$project->data}}">
                        @error('data')
                            <div class="text-danger">{{$message}}</div> 
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="type_id">Seleziona tipo</label>
                        <select name="type_id" id="type_id" class="form-select">
                            <option value="">Seleziona il tipo</option>
                            @foreach ($types as $type)
                                <option value="{{$type->id}}" @selected($type->id == old('type_id', $project->type ? $project->type->id : ''))>{{$type->name}}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="text-danger">{{$message}}</div> 
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label">Tecnologia</label>
                        <div>
                            @foreach ($technologies as $technology)
                                <div class="form-check-inline">
                                    @if ($errors->any())
                                        <input type="checkbox" name="technologies[]" id="technology-{{$technology->id}}" class="form-check-input" value="{{$technology->id}}" {{in_array($technology->id, old('technologies')) ? 'checked' : ''}}>                             
                                    @else
                                        <input type="checkbox" name="technologies[]" id="technology-{{$technology->id}}" class="form-check-input" value="{{$technology->id}}" {{$project->technologies->contains($technology->id) ? 'checked' : ''}}>
                                    @endif
                                    <label class="form-check-label">{{$technology->name}}</label>                                   
                                </div>
                            @endforeach
                        </div>
                        {{-- @error('type_id')
                            <div class="text-danger">{{$message}}</div> 
                        @enderror --}}
                    </div>
                    <div class="form-group mb-3" >
                        <div class="mb-3">
                            @if ($project->cover_immagine != null)
                                <img class="dettaglio-immagine" src="{{asset('/storage/' . $project->cover_immagine)}}" alt="{{$project->nome_progetto}}">
                            @endif
                        </div>
                        <label for="cover_immagine">Immagine di copertina</label>
                        <input type="file" class="form-control" name="cover_immagine" id="cover_immagine" placeholder="" value="{{$project->cover_immagine}}">
                        @error('cover_immagine')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-success">Salva</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection