@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Ficha do Cliente - {{$cliente->nome}} </h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderless table-active-bg-factor"">
                            <thead>
                                <tr>
                                    <th>Campo</th>
                                    <th>Informação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>Data de Nascimento</b></td>
                                    <td>{{$cliente->data_nascimento}}</td>
                                </tr>
                                <tr>
                                    <td><b>Morada</b></td>
                                    <td>{{$cliente->morada}}</td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>{{$cliente->email}}</td>
                                </tr>
                                <tr>
                                    <td><b>Telefone</b></td>
                                    <td>{{$cliente->telefone}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('cliente.index') }}" class="btn btn-lg btn-primary mx-1" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>
                            <a href="{{route('cliente.edit',$cliente->id)}} " class="btn btn-lg btn-secondary mx-1" type="submit" title="Guardar"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-lg btn-danger mx-1" title="Eliminar" type="submit" onclick="return confirm('Tem a certeza que deseja excluir o cliente {{$cliente->nome}}?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection


