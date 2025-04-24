@extends('layouts.app')

@section('content')
    {{-- @section('conteudo') --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">Messages</h5>
                    <div class="card-body">
                        <a href="{{ route('message.create') }}" class="btn btn-primary">New Message</a>
                        <hr>
                        {{-- Barra de Pesquisa  --}}
                        <div class="container-fluid">
                            <form class="d-flex" action="{{ route('message.search') }}" method="GET">
                                <input class="form-control me-2" id="searchInput" name="search" type="search"
                                    placeholder="Search Messages..." aria-label="Search">
                                <button class="btn btn-primary" type="submit"> <i
                                        class="fa-solid fa-magnifying-glass"></i></button>
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
                                title: 'Success',
                                text: '{{ session('alert') }}',
                                confirmButtonText: 'OK'
                            });
                        </script>
                    @endif

                    <table class="table table-striped table-hover table-borderless table-active-bg-factor">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <th scope="row">{{ $message->user->name ?? 'User not found!' }}</th>
                                    <td>{{ $message->user->email ?? 'User not found!' }}</td>
                                    <td>{{ $message->text }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Ações">
                                            <!-- Link for "Mostrar" -->
                                            <a href="{{ route('message.show', $message->id) }}"
                                                class="btn btn-link btn-sm mx-1" title="Mostrar"><i
                                                    class="fas fa-eye"></i></a>

                                            <!-- Form for "Eliminar" -->
                                            <form action="{{ route('message.destroy', $message->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm mx-1" title="Eliminar"
                                                    type="submit"
                                                    onclick="return confirm('Tem a certeza que deseja excluir esta mensagem?')"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>

                                            <!-- Form for "Mover para Cima" -->
                                            <form action="{{ route('message.move-up', $message->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                <button class="btn btn-outline-primary btn-sm mx-1" title="Mover para Cima"
                                                    type="submit">
                                                    ⬆️
                                                </button>
                                            </form>

                                            <!-- Form for "Mover para Baixo" -->
                                            <form action="{{ route('message.move-down', $message->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                <button class="btn btn-outline-primary btn-sm mx-1" title="Mover para Baixo"
                                                    type="submit">
                                                    ⬇️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Botão para mudar de página --}}
                    <div class="pagination d-flex justify-content-center">
                        {{ $messages->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
