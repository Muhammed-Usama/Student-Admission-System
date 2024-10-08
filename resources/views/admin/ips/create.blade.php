@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Admin IP</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('ip.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Admin Name">Name :</label>
                                    <input type="text" name="name" class="form-control" id="Admin Name"
                                        placeholder="Enter Admin Name">
                                </div>
                                <div class="form-group">
                                    <label for="ip">Admin IP Address:</label>
                                    <input type="text" name="ip" class="form-control" id="ip"
                                        placeholder="Enter Admin's IP">
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
