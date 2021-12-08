<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student CRUD</title>
    <!-- ALL CSS FILES  -->
    <!-- ALL CSS FILES  -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>



<div class="wrap ">
    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">Back</a><br><br>
    <div class="card shadow">
        <div class="card-body">
            <img   src="{{ asset('media/student') }}/{{ $single_data->photo }}" class="img-thumbnail" alt="">
            <table class="table table-striped">
                <tr>
                    <td>Name</td>
                    <td>{{ $single_data->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $single_data->email }}</td>
                </tr> <tr>
                    <td>Cell</td>
                    <td>{{ $single_data->cell }}</td>
                </tr> <tr>
                    <td>Age</td>
                    <td>{{ $single_data->age }}</td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>{{ $single_data->uname }}</td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td>{{ $single_data->class }}</td>
                </tr>
            </table>

        </div>
    </div>
</div>








<!-- JS FILES  -->
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
