@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h2>Tutti i progetti</h2>
                    </div>
                    <div>
                        <a href="{{ route('admin.projects.create')}}"><button class="btn btn-sm btn-primary">Aggiungi progetto</button></a>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 ">
                <table class="table table-striped ">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome progetto</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Data</th>
                        <th scope="col">TOOLS</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            
                        <tr>
                            <td>{{$project->id}}</td>
                            <td>{{$project->nome_progetto}}</td>
                            <td>{{Str::limit($project->descrizione, 30, '...')}}</td>
                            <td>{{$project->type ? $project->type->name : 'Senza tipo'}}</td>
                            <td>{{$project->slug}}</td>
                            <td>{{Str::limit($project->cover_immagine, 30, '...')}}</td>
                            <td>{{$project->data}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.projects.show', ['project'=>$project->id])}}"><button class="btn btn-sm btn-square btn-primary"><i class="fa-regular fa-eye" style="color: #ffffff;"></i></button></a>
                                    <a href="{{ route('admin.projects.edit', ['project'=>$project->id])}}" class="mx-2"><button class="btn btn-sm btn-square btn-warning"><i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i></button></a> 
                                    <button class="btn btn-sm btn-square btn-danger" data-bs-toggle="modal" data-bs-target="#modal_project_delete-{{$project->id}}"><i class="fa-solid fa-trash" style="color:#ffffff;"></i></button>
                                    @include('admin.projects.partials.modal_delete')
                                </div>

                            </td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection