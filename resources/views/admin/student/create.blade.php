<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD Student</title>
</head>

<body>
    <h3>ADD STUDENT</h3>
    <form action="{{ route('storeStudent') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Fullname</label>
            <input type="text" name="fullname" value="{{ old('fullname') }}">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Age</label>
            <input type="number" name="age" value="{{ old('age') }}" min="18">
        </div>
        <div>
            <label>Gender</label>
            <select name="gender">
                <option value="0">Male</option>
                <option value="1">Female</option>
            </select>
        </div>
        <div>
            <label>Point</label>
            <input type="number" name="point" min="0" max="10" value="{{ old('point') }}">
        </div>
        <div>
            <label>Avatar</label>
            <input type="file" name="avatar" value="{{ old('avatar') }}">
        </div>

        <div>
            <input type="submit" value="CREATE STUDENT">
        </div>
    </form>
</body>

</html>
