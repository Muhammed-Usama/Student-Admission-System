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

                        <form action="{{ route('student.desider') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="seatnum">Seat Number</label>
                                    <input type="text" name="seatnum" class="form-control" id="seatnum"
                                        placeholder="Enter Seat Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <input type="number" name="grade" class="form-control" id="grade" max="410"
                                        placeholder="Enter Grade" required>
                                </div>
                                <div class="form-group">
                                    <label for="division">Division</label>
                                    <select name="division" class="form-control" id="division" required>
                                        <option value="">Select Your Division</option>
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
