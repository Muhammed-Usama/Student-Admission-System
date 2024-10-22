@extends('admin.layout.layout')
@section('contant')
    <div class="pagetitle">
        <h1>All Faculities</h1> <br>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <div class="card-header">
                        @if (session('message'))
                            <h3 class="card-title bg-success">{{ session('message') }}</h3>
                        @endif
                    </div>
                    <!-- Bordered Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Faculty Name</th>
                                <th scope="col">Min Ratio</th>
                                <th scope="col">Uni Ratio</th>
                                <th scope="col">Available Number</th>
                                <th scope="col">Max Available Number</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculties as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->minratio }}</td>
                                    <td>{{ $item->faculityminratio }}</td>
                                    <td>{{ $item->availableno }}</td>
                                    <td>{{ $item->maxavailableno }}</td>

                                    <td>
                                        <a href="{{ route('faculty.edit', $item->id) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                        <a href="{{ route('faculty.delete', $item->id) }}" class="btn btn-danger">
                                            Delete
                                        </a>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @endsection
