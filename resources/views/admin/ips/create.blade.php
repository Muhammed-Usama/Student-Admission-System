@extends('admin.layout.layout')
@section('contant')
    <div class="pagetitle">
        <h1>Add Admin IPs</h1>
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
            <form action="{{ route('ip.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="Enter the name" class="form-control" id="inputText"
                            name="name">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Admin IP</label>
                    <div class="col-sm-10">
                        <input placeholder="Enter Admin IP" type="text" class="form-control" id="inputEmail"
                            name="ip">
                    </div>
                </div>
                <br>

                <br>


        </div>
        </fieldset>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form><!-- End Horizontal Form -->
    @endsection
