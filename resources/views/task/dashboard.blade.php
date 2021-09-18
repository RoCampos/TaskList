@extends('dashboard.layout')

@section('page-title')
Painel de Controle
@endsection

@section('page-heading')
    @include('dashboard.page-heading', [
        'heading' => 'Panel de Controle',
    ])
@endsection

@section('main-content')
        <div class="col">
             <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
                        <a href="#" data-toggle="modal" data-target="#logoutModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus-circle fa-sm text-white-50"></i>
                            Nova Tarefa
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{$task->description}}</td>
                                            <td style="width: 25%">
                                                <div class="row justify-content-center">
                                                @if(!$task->status)
                                                <form action="{{route('task.update', ['task'=>$task->id])}}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-circle btn-outline-success mr-3 mb-0">
                                                        <i class="fas fa-check fa-sm"></i>
                                                    </button>
                                                </form>
                                                @endif
                                                <form action="{{route('task.clone', ['task'=>$task->id])}}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-circle btn-outline-success">
                                                        <i class="fas fa-clone fa-sm"></i>
                                                    </button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
            </div>
        </div>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            New Task
                        </h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('task.store')}}" class="user" method="POST" id="task-create">
                            @csrf
                            <div class="form-group">
                                <label for="description" class="form-control-label">
                                    Description
                                </label>
                                <input type="text" id="description" name="description" placeholder="Description..." class="form-control form-control-user"/>
                                @error('description')<span>{{ $message }}</span>@endif
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="#" onclick="document.getElementById('task-create').submit(); return false;">Adicionar</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
