@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Mensagem - {{$message->user->name ?? 'User not found!'}} </h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderless table-active-bg-factor">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Mensagem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>Data de Nascimento</b></td>
                                    <td>{{$message->user->name ?? 'User not found!'}}</td>
                                </tr>
                                <tr>
                                    <td><b>Mensagem</b></td>
                                    <td>{{$message->text}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('message.index') }}" class="btn btn-lg btn-primary mx-1" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>
                            <form action="{{ route('message.destroy', $message->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm mx-1" title="Eliminar" type="submit" onclick="return confirm('Tem a certeza que deseja excluir o cliente {{$message->id}}?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection


