<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
</head>
<body>
	<form action="{{ route('Customer.add') }}" method="POST">
		{{ csrf_field() }}
		<input type="text" name="id" value="{{ rand(5, 99) }}">
		<input type="submit" class="submit" value="Go">
	</form>
</body>
</html>