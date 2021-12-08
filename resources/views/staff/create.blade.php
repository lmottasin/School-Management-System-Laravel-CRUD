<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
    <!-- ALL CSS FILES  -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>



	<div class="wrap ">
        <a href="{{ route('staff.index') }}" class="btn btn-warning btn-sm">Back</a><br><br>

        <div class="card shadow">
			<div class="card-body">
				<h2>Add new staff</h2>

               @include('validation')

				<form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name"  value="{{old('name')}}" class="form-control" type="text">
                        @if( $errors->has('name'))
                            <br><p class="alert alert-danger">{{ $errors->first('name') }} <button class="close" data-dismiss="alert">&times;</button></p><br>
                        @endif
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email"  value="{{old('email')}}" class="form-control" type="text">
                        @if( $errors->has('email'))
                            <br><p class="alert alert-danger">{{ $errors->first('email') }} <button class="close" data-dismiss="alert">&times;</button></p><br>
                        @endif
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell"   value="{{old('cell')}}" class="form-control" type="text">
                        @if( $errors->has('cell'))
                            <br><p class="alert alert-danger">{{ $errors->first('cell') }} <button class="close" data-dismiss="alert">&times;</button></p><br>
                        @endif
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname"  value="{{old('uname')}}" class="form-control" type="text">
                        @if( $errors->has('uname'))
                            <br><p class="alert alert-danger">{{ $errors->first('uname') }} <button class="close" data-dismiss="alert">&times;</button></p><br>
                        @endif
					</div>
                    <div class="form-group">
                        <label for="">Age</label>
                        <input name="age" value="{{old('age')}}" class="form-control" type="text">
                        @if( $errors->has('age'))
                            <br><p class="alert alert-danger">{{ $errors->first('age') }} <button class="close" data-dismiss="alert">&times;</button></p><br>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input name="password"  value="{{old('password')}}" class="form-control" type="password">
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input name="photo"  value="{{old('photo')}}" class="form-control" type="file">
                    </div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Create Staff">
					</div>
				</form>
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
