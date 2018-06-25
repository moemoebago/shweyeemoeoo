

@extends('layout.master')
@section('content')

	<div class="container">
		<div class="row ">
			<div class="col-md-6">
				<form action="{{ route('students.store') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="father_name">Father Name</label>
						<input type="text" name="father_name" id="father_name" class="form-control">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" name="address" id="address" class="form-control">
					</div>
					<div class="form-group">
						<label for="phno">Phone No</label>
						<input type="text" name="phno" id="phno" class="form-control">
					</div>
					<div class="form-group">
						<label for="class">Class</label>
						<select name="class" class="form-control">
							<option>--Choose Class--</option>
							@foreach($classes as $key => $class)
							<option value="{{ $key }}">{{ $class }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="class">Grade</label>
						<select name="grade" class="form-control">
							<option>--Choose Grade--</option>
							@foreach($grades as $key => $grade)
							<option value="{{ $key }}">{{ $grade }}</option>
							@endforeach
						</select>
					</div>
					<button class="btn btn-success">Create Student</button>
				</form>
			</div>
		</div>
	</div>
	@endsection

