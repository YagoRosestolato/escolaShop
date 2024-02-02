@extends('layouts.app')

@section('content')
    <<div class="card border">
        <div class="card-body">
            <h5 class="card-title">Lista de Produtos</h5>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produtos)
                        <tr>
                            <td>{{ $produtos->id }}</td>
                            <td>{{ $produtos->name }}</td>
                            <td>{{ $produtos->description }}</td>
                            <td>R$ {{ number_format($produtos->price, 2, ',', '.') }}</td>
                            <td>
                                <a href="/app/produtos/editar/{{ $produtos->id }}" class="btn btn-primary">Editar</a>
                                <a href="/app/produtos/apagar/{{ $produtos->id }}" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                <a href="/home" class="btn btn-primary mb-2">Voltar</a><br>
                <a href="/app/produtos/novo" class="btn btn-success mb-2">Cadastrar Novo Produto</a><br>
            </div>
        </div>
    </div>
@endsection
