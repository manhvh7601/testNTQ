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
    <form class="form-control" action="{{ route('updateStudent', ['id' => $data->id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Fullname</label>
            <input class="form-control" type="text" name="fullname" value="{{ $data->fullname }}">
        </div>
        <div>
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="{{ $data->email }}">
        </div>
        <div>
            <label>Age</label>
            <input class="form-control" type="number" name="age" value="{{ $data->age }}" min="18">
        </div>
        <div>
            <label>Gender</label>
            <div class="form-control">
                <input type="radio" name="gender" value="{{ $data->gender }}" /> Nam
                <input type="radio" name="gender" value="{{ $data->gender }}" /> Nu
            </div>
        </div>
        <div>
            <label>Point</label>
            <select name="point_id" class="form-control">
                @foreach ($listPoint as $point)
                    <option value="{{ $point->id }}" {{ $point->id == $data->point_id ? 'selected' : '' }}>
                        {{ $point->point }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Avatar</label>
            <input class="form-control" type="file" name="avatar" value="{{ $data->avatar }}">
        </div>
        @if ($data->avatar)
            <img src="{{ asset('upload/' . $data->avatar) }}" width="100px" height="100px"
                class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        @endif

        <div>
            <input class="form-control btn btn-success" type="submit" value="CREATE STUDENT">
        </div>
    </form>
</body>

</html>
