@extends('layouts.app')

{{-- @extends('layouts.template') --}}

@section('content')
{{-- @section('conteudo') --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Lista de Clientes</h5>
                    <div class="card-body">
                        <h5 class="card-title">Aqui estão listados todos os clientes inseridos na BD.</h5>
                        <p class="card-text">É possível: Mostrar, editar e eliminar informações de cada cliente.</p>
                        <a href="{{route('cliente.create')}}" class="btn btn-primary">Inserir Novo Cliente</a>
                        <a href="{{route('fatura.index')}}" class="btn btn-secondary">Faturas</a>
                        <hr>
                        {{-- Barra de Pesquisa  --}}
                        <div class="container-fluid">
                          <form class="d-flex" action="{{ route('cliente.search') }}" method="GET">
                          <input class="form-control me-2" id="searchInput" name="search" type="search" placeholder="Pesquisar clientes..." aria-label="Search">
                            <button class="btn btn-primary" type="submit"> <i class="fa-solid fa-magnifying-glass"></i></button>
                          </form>
                        </div>
                      </div>
                </div>

                <div class="card-body mt-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Apresentar uma janela com mensagem registo gravado --}}
                    @if (session('alert'))
                    <script>
                         Swal.fire({
                             icon: 'success',
                             title: 'Sucesso',
                             text: '{{ session('alert') }}',
                             confirmButtonText: 'OK'
                         });
                    </script>
                     @endif

                    <table class="table table-striped table-hover table-borderless table-active-bg-factor">
                        <thead>
                          <tr>
                            <th scope="col">ID Cliente</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Contacto</th>
                            <th scope="col" colspan="3">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)

                          <tr>
                            <th scope="row">{{$cliente->id}}</th>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->telefone}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Ações">
                                    <!-- Link for "Mostrar" -->
                                    <a href="{{ route('cliente.show', $cliente->id) }}" class="btn btn-link btn-sm mx-1" title="Mostrar"><i class="fas fa-eye"></i></a>

                                    <!-- Link for "Editar" -->
                                    <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-link btn-sm mx-1" title="Editar"><i class="fas fa-edit"></i></a>

                                    <!-- Form for "Eliminar" -->
                                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm mx-1" title="Eliminar" type="submit" onclick="return confirm('Tem a certeza que deseja excluir o cliente {{$cliente->nome}}?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{-- Botão para mudar de página --}}
                      <div class="pagination d-flex justify-content-center">
                        {{$clientes->links('pagination::bootstrap-4'),}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection


