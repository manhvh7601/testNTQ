<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <h3>ADD STUDENT</h3>
    <form class="form-control" action="{{ route('storeStudent') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Fullname</label>
            <input class="form-control" type="text" name="fullname" value="{{ old('fullname') }}">
        </div>
        <div>
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Age</label>
            <input class="form-control" type="number" name="age" value="{{ old('age') }}" min="18">
        </div>
        <div>
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="0">Male</option>
                <option value="1">Female</option>
            </select>
        </div>
        <div>
            <label>Point</label>
            <select name="point_id" class="form-control">
                @foreach ($listPoint as $point)
                    <option value="{{ $point->id }}"> {{ $point->point }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Avatar</label>
            <input class="form-control" type="file" name="avatar" value="{{ old('avatar') }}">
        </div>

        <div>
            <input class="form-control btn btn-success" type="submit" value="CREATE STUDENT">
        </div>
    </form>
</body>

</html>
