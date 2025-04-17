@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">Editar Cliente - {{ $cliente->nome }} </h5>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>

                    <div class="table-responsive">
                        <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <table class="table table-striped table-hover table-borderless table-active-bg-factor">
                                <thead>
                                    <tr>
                                        <th>Campo</th>
                                        <th>Informação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Nome</b></td>
                                        <td><input type="text" name="nome" value="{{ $cliente->nome }}" required></td>
                                    </tr>
                                    <tr>
                                        <td><b>Data de Nascimento</b></td>
                                        <td><input type="date" name="data_nascimento"
                                                value="{{ $cliente->data_nascimento }}" required></td>
                                    </tr>
                                    <tr>
                                        <td><b>Morada</b></td>
                                        <td><input type="text" name="morada" value="{{ $cliente->morada }}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td><input type="email" name="email" value="{{ $cliente->email }}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Telefone</b></td>
                                        <td><input type="tel" name="telefone" value="{{ $cliente->telefone }}" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center mt-2">
                                <a href="{{ route('cliente.index') }}" class="btn btn-lg btn-primary " title="Voltar"><i
                                        class="fa-solid fa-arrow-left"></i></a>
                                <button class="btn btn-primary btn-lg mx-1" type="submit" title="Guardar">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
