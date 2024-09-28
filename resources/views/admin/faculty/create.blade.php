@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Faculty</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('faculty.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="facultyName">Faculty Name</label>
                                    <input type="text" name="name" class="form-control" id="facultyName"
                                        placeholder="Enter Faculty Name">
                                </div>
                                <div class="form-group">
                                    <label for="minRatio">Min Ratio</label>
                                    <input type="text" name="minratio" class="form-control" id="minRatio"
                                        placeholder="Enter Min Ratio">
                                </div>
                                <div class="form-group">
                                    <label for="maxAvailableNum">Max Available Number</label>
                                    <input type="text" name="maxavailableno" class="form-control" id="maxAvailableNum"
                                        placeholder="Enter Max Available Number">
                                </div>
                                <div class="form-group">
                                    <label>Program Requirement</label>
                                    <select class="form-control" name='programrequirement_id'>
                                        <option>Select Program Requirement</option>
                                        @foreach ($programrequirements as $row)
                                            <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                        @endforeach
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
