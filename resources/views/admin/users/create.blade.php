@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admins.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="adminName">Name</label>
                                    <input type="text" name="name" class="form-control" id="adminName"
                                        placeholder="Enter Admin Name">
                                </div>
                                <div class="form-group">
                                    <label for="adminEmail">Email</label>
                                    <input type="email" name="email" class="form-control" id="adminEmail"
                                        placeholder="Enter Admin Email">
                                </div>
                                <div class="form-group">
                                    <label for="adminPassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="adminPassword"
                                        placeholder="Enter Admin Password">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name='role'>
                                        <option>Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="adminstrator">Adminstrator</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
