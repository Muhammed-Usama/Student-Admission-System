@extends('admin.layout.layout')
@section('contant')
    <div class="pagetitle">
        <h1>Admins IPs</h1>
    </div><!-- End Page Title --><br><br>

    <section class="section dashboard">
        <div class="row">
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
                        <th scope="col">Name</th>
                        <th scope="col">IP</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ips as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->ip }}</td>

                            <td>
                                <a href="{{ route('ip.delete', $item->id) }}" class="btn btn-danger">
                                    <span>Delete</span>
                                </a>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endsection
