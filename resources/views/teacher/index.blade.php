<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher CRUD</title>
    <!-- ALL CSS FILES  -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>



<div class="wrap-table ">
    <a href="{{ route('teacher.create') }}" class="btn btn-primary btn-sm">Add New Staff</a>
    <a href="{{ route('crud.main') }}" class="btn btn-primary btn-sm">Home</a><br><br>

    <div class="card shadow">
        <div class="card-body">
            <h2>All Data</h2>
            @include('validation')
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Cell</th>
                    <th>Age</th>
                    <th>Username</th>
                    <th>Photo</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $all_teacher as $teacher)

                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->cell }}</td>
                        <td>{{ $teacher->age }}</td>
                        <td>{{ $teacher->uname }}</td>

                        <td><img src="{{ asset('media/teacher') }}/{{ $teacher->photo }}" alt=""></td>
                        {{--
                        <td>{{ $staff->created_at->diffForHumans() }}</td>
                        --}}
                        <td> {{ date('F d, Y', strtotime($teacher->created_at)) }}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('teacher.show',$teacher->id) }}">View</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('teacher.edit', $teacher->id )}}">Edit</a>
                            {{--<a class="btn btn-sm btn-danger" href="{{ route('staff.delete',$staff->id) }}">Delete</a>--}}
                            <form style="display: inline;" method='POST' action="{{ route('teacher.delete',$teacher->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"> Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach

                </tbody>
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
