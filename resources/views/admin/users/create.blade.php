@extends('admin.layout.layout')
@section('contant')
    <div class="pagetitle">
        <h1>Add User</h1>
    </div><!-- End Page Title --><br><br>

    <section class="section dashboard">
        <div class="row">
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
            <!-- Horizontal Form -->
            <form action="{{ route('admins.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="name">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="password">
                    </div>
                </div>
                <br>
                <fieldset class="row mb-3">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Choose Your Role</option>
                                <option value="admin">Admin</option>
                                <option value="adminstrator">Adminstrator</option>
                            </select>
                        </div>

                    </div>
                </fieldset>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form><!-- End Horizontal Form -->

        @endsection
