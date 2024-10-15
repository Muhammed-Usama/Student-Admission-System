@extends('student.layout.layout')
@section('contant')
    <form action="{{ route('student.education') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="formbold-form-title">
            <center>
                <h2 style="font-size: 300%;" class="">Student Admission</h2>
                <br>

                <p>
                    Pesronal Information
                </p>
            </center>
        </div>

        <div class="formbold-mb-3">
            <label for="name" class="formbold-form-label">
                Name
            </label>
            <input type="text" name="name" id="name" class="formbold-form-input" />
        </div>
        <br>


        <div class="formbold-input-flex">
            <div>
                <label for="email" class="formbold-form-label"> Email </label>
                <input type="email" name="email" id="email" class="formbold-form-input" />
            </div>
            <div>
                <label for="phone" class="formbold-form-label"> Phone number </label>
                <input type="text" name="phone" id="phone" class="formbold-form-input" />
            </div>
        </div>

        <br>
        <div>
            <label for="governorate_id" class="formbold-form-label"> Governorate </label>

            <select name="governorate_id" id="governorate_id" class="formbold-form-input">
                <option>Select Your Governorate</option>
                @foreach ($governorate as $governorate)
                    <option value="{{ $governorate['id'] }}">{{ $governorate['name'] }}</option>
                @endforeach
            </select>
        </div>
        <br>

        <div class="formbold-mb-3">
            <label for="address" class="formbold-form-label">
                Address
            </label>
            <input type="text" name="address" id="address" class="formbold-form-input" />
        </div>
        <div class="formbold-mb-3">
            <label for="national_id" class="formbold-form-label">
                National ID
            </label>
            <input type="text" name="nationalid" id="national_id" class="formbold-form-input" />
        </div>
        <br>
        <div class="formbold-input-flex">
            <div>
                <label for="national_id_image" class="formbold-form-label"> National ID Image </label>
                <input type="file" name="national_img" id="national_id_image" />
            </div>
            <div>
                <label for="student_photo" class="formbold-form-label"> Student Photo </label>
                <input type="file" name="student_photo" id="student_photo" />
            </div>
        </div>
        <br>
        <div class="formbold-input-flex">
            <div>
                <label for="dateofbirth" class="formbold-form-label"> Date Of Birth </label>
                <input type="date" name="dateofbirth" id="dateofbirth" class="formbold-form-input" />
            </div>
            <div>
                <label for="gander" class="formbold-form-label"> Gender </label>

                <select name="gander" id="gander" class="formbold-form-input">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>


            </div>


        </div>
        <br>

        <br>

        <button class="formbold-btn">To Education Information</button>
    </form>
@endsection
