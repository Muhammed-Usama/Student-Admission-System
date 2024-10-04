@extends('student.layout.layout')
@section('contant')
    <div class="content">

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Pesronal Information</h3>
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
                        <form action="{{ route('student.education') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter Email" value="{{ session('user') }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="governorate_id">Governorate</label>
                                    <select name="governorate_id" class="form-control" id="governorate_id">
                                        <option>Select Your Governorate</option>
                                        @foreach ($governorate as $governorate)
                                            <option value="{{ $governorate['id'] }}">{{ $governorate['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address"
                                        placeholder="Enter Address">
                                </div>
                                <div class="form-group">
                                    <label for="national_id">National ID</label>
                                    <input type="text" name="nationalid" class="form-control" id="national_id"
                                        placeholder="Enter National ID">
                                </div>
                                <div class="form-group">
                                    <label for="national_id_image">National ID Image</label>
                                    <input type="file" name="national_img" class="form-control" id="national_id_image">
                                </div>
                                <div class="form-group">
                                    <label for="student_photo">Student Photo</label>
                                    <input type="file" name="student_photo" class="form-control" id="student_photo">
                                    @error('student_photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dateofbirth" class="form-control" id="dob"
                                        placeholder="Enter Date of Birth">
                                </div>
                                <div class="form-group">
                                    <label for="gander">Gender</label>
                                    <select name="gander" class="form-control" id="gander">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">To Education Information</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
