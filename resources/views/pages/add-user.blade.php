@extends('Layouts.dashboard')

@section('title', 'Create User')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>User Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">User Add</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('user.store') }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('POST')
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
                            <div class="form-group">
                                <label for="inputName">Roles</label>
                                <select name="role" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="SUPERADMIN">SuperAdmin</option>
                                    <option value="ADMIN">Admin</option>
                                    <option value="WATCHER">Watcher</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Penanggung Jawab</label>
                                <input value="{{ old('name') }}" name="name" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input value="{{ old('email') }}" name="email" type="email" id="inputName" class="form-control" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Password</label>
                                <input name="password" type="password" id="inputName" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Konfirmasi Password</label>
                                <input name="password_confirmation" type="password" id="inputName" class="form-control" required />
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
                    Create new User
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection
