@extends('Layouts.dashboard')

@section('title', 'Edit User')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>User Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">User Update</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('account.update', $user->id) }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">user</h3>

                            <div class="card-tools">
                                <button
                                type="button"
                                class="btn btn-tool"
                                data-card-widget="collapse"
                                title="Collapse"
                                >
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Auth::user()->role=='SUPERADMIN')
                                <div class="form-group">
                                    <label for="inputName">Roles</label>
                                    <select name="role" id="inputStatus" class="form-control custom-select">
                                        <option value="SUPERADMIN" {{$user->role=='SUPERADMIN'?'selected':''}}>SuperAdmin</option>
                                        <option value="ADMIN" {{$user->role=='ADMIN'?'selected':''}}>Admin</option>
                                        <option value="WATCHER" {{$user->role=='WATCHER'?'selected':''}}>Watcher</option>
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="inputName">Nama Penanggung Jawab</label>
                                <input value="{{ $user->name?$user->name:old('name') }}" name="name" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input value="{{ $user->email?$user->email:old('email') }}" name="email" type="email" id="inputName" class="form-control" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Password</label>
                                <input name="password" type="password" id="inputName" class="form-control" />
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
                <button
                    type="submit"
                    class="float-right btn btn-success"
                >
                    Edit new User
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection
