@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admins.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}" />
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="userName">Name</label>
                                    <input type="text" name="name" class="form-control" id="userName"
                                        placeholder="Enter Name" value="{{ $user->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="userEmail">Email</label>
                                    <input type="text" name="email" class="form-control" id="userEmail"
                                        placeholder="Enter Email" value="{{ $user->email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="userRole">Role</label>
                                    <select class="form-control" name="role" id="userRole">
                                        <option>Select Role</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="adminstrator" {{ $user->role == 'adminstrator' ? 'selected' : '' }}>
                                            Adminstrator</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
