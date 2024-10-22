@extends('admin.layout.layout')
@section('contant')
    <div class="pagetitle">
        <h1>Add Faculty</h1>
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
            <form action="{{ route('faculty.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Faculty Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="name">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Min Ratio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail" name="minratio">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Max Available Ratio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="maxavailableno">
                    </div>
                </div>
                <br>
                <fieldset class="row mb-3">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Program Requirement</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="programrequirement_id">
                                <option selected>Select Program Requirement</option>
                                @foreach ($programrequirements as $row)
                                    <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </fieldset>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form><!-- End Horizontal Form -->
        @endsection
