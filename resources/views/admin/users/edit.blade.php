@extends('admin.layout.layout')
@section('contant')
    <div class="pagetitle">
        <h1>Edit Admin</h1>
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
            <form action="{{ route('admins.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $user->id }}" id="id" />
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="name" value="{{ $user->name }}"
                            readonly>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="email" value="{{ $user->email }}"
                            readonly>
                    </div>
                </div>
                <br>
                <fieldset class="row mb-3">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">

                            <select class="form-select" aria-label="Default select example" name="role">
                                <option>Select Role</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="adminstrator" {{ $user->role == 'adminstrator' ? 'selected' : '' }}>
                                    Adminstrator</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <br>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form><!-- End Horizontal Form -->
        @endsection
