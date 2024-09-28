@extends('student.layout.layout')
@section('contant')
    <div class="content">

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Education Information</h3>
                        </div>
                        @if (session('student_info'))
                            <ul>
                                <li>Name: {{ session('student_info.name') }}</li>
                                <li>Email: {{ session('student_info.email') }}</li>
                                <li>Phone: {{ session('student_info.phone') }}</li>
                                <li>Address: {{ session('student_info.address') }}</li>
                                <li>National ID: {{ session('student_info.nationalid') }}</li>
                                <li>Date of Birth: {{ session('student_info.dateofbirth') }}</li>
                                <li>Gender: {{ session('student_info.gander') }}</li>
                                <li>student: {{ session('student_info.student_photo') }}</li>
                                <li>national: {{ session('student_info.national_img') }}</li>
                                <li>governorate_id: {{ session('student_info.governorate_id') }}</li>
                            </ul>
                        @else
                            <p>No student information found in session.</p>
                        @endif
                        <form action="{{ route('student.desider') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="seatnum">Seat Number</label>
                                    <input type="text" name="seatnum" class="form-control" id="seatnum"
                                        placeholder="Enter Seat Number">
                                </div>
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <input type="text" name="grade" class="form-control" id="grade"
                                        placeholder="Enter Grade">
                                </div>
                                <div class="form-group">
                                    <label for="division">Division</label>
                                    <select name="division" class="form-control" id="division">
                                        <option>Select Your Division</option>
                                        @foreach ($divisions as $division)
                                            @if ($division['name'] === 'علمى علوم ورياضة')
                                            @break
                                        @endif
                                        <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">To Desiders</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
