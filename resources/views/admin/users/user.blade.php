@extends('admin.layout.layout')
@section('contant')
    <div class="pagetitle">
        <h1>Admins</h1>
    </div><!-- End Page Title --><br><br>

    <section class="section dashboard">
        <div class="row">

            <!-- Bordered Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>

                            <td>
                                <a href="{{ route('admins.delete', $item->id) }}" class="btn btn-danger">
                                    Delete
                                </a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endsection
