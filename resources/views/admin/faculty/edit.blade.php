@extends('admin.layout.layout')
@section('contant')
    <div class="pagetitle">
        <h1>Edit Faculty</h1>
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
            <form action="{{ route('faculty.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $faculty->id }}" id="id" />
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Faculty Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="name"
                            value="{{ $faculty->name }}" readonly>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Min Ratio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail" name="minratio"
                            value="{{ $faculty->minratio }}">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Max Available Ratio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="maxavailableno"
                            value="{{ $faculty->maxavailableno }}">
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form><!-- End Horizontal Form -->
        @endsection
