<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="{{ asset('homepagestyle.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
{{--<div class="logo"></div>--}}

<div class="wrapper">
    <h1>Whom do you want to see?</h1>
    <div class="profile-wrap">



        <a href="{{ route('student.index') }}">
        <div class="profile">
            <div class="profile-icon profile4">

            </div>
            <div class="profile-name">
                Show All Student
            </div>
        </div>
        </a>
        <a href="{{ route('teacher.index') }}">
            <div class="profile">
                <div class="profile-icon profile5">

                </div>
                <div class="profile-name">
                    Show All Teacher
                </div>
            </div>
        </a>
        <a href="{{ route('staff.index') }}">
            <div class="profile">
                <div class="profile-icon profile6">

                </div>
                <div class="profile-name">
                    Show All Staff
                </div>
            </div>
        </a>


</div>
<!-- partial -->

</body>
</html>
