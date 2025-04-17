@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Novo Cliente</h5>
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>

                    <div class="table-responsive">
                        <form action="{{route('cliente.store')}}" method="POST">
                            @csrf
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
                                    <td><input type="text" name="nome" id="" required></td>
                                </tr>
                                <tr>
                                    <td><b>Data de Nascimento</b></td>
                                    <td><input type="date" name="data_nascimento" id="" required></td>
                                </tr>
                                <tr>
                                    <td><b>Morada</b></td>
                                    <td><input type="address" name="morada" id="" required></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><input type="email" name="email" id="" required></td>
                                </tr>
                                <tr>
                                    <td><b>Telefone</b></td>
                                    <td><input type="tel" name="telefone" id="" required></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-2">
                            <a href="{{ route('fatura.index') }}" class="btn btn-lg btn-primary mx-1" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>
                            <button class="btn btn-primary btn-lg mx-1" type="submit" title="Guardar">
                                <i class="fa-solid fa-floppy-disk"></i>
                            </button>
                            <button class="btn btn-danger btn-lg mx-1" type="reset" title="Limpar">
                                <i class="fa-solid fa-eraser"></i>
                            </button>
                        </div>

                        </form>

                    </div>
                </div>
        </div>
    </div>
</div>
@endsection


