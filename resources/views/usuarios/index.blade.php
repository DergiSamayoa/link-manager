@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('usuarios.create') }}" class="btn btn-warning">Nuevo</a>

                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none;">Id</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Email</th>
                                    <th style="color: #fff">Rol</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $usuario)
                                        <tr>
                                            <td style="display: none">{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>
                                                @if(!empty($usuario->getRoleNames()))
                                                    @foreach ($usuario->getRoleNames() as $roleName)
                                                        <span >
                                                            {{ $roleName }}
                                                        </span>
                                                    @endforeach                                                    
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info">Editar</a>

                                                {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $users->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

