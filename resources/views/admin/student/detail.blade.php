<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DETAILS</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <form method="get" class="form-control">
        <input class="form-control" type="text" name="keyword" value="{{ old('keyword') }}"
            placeholder="Search........">
        <input type="submit" value="Search" class="btn btn-primary">
    </form>
    @if (!empty($student))
        <div class="row" style="padding: 20px">
            <div class="col-10">
                <a href="{{ route('showStudent') }}" class="btn btn-dark">Back to home</a>
            </div>
            <div class="col-2">
                <a href="{{ route('createStudent') }}" class="btn btn-secondary">Add Student</a>

            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tuổi</th>
                    <th scope="col">Điểm trung bình</th>
                    <th scope="col">Ảnh đại diện</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col">{{ $student->fullname }}</td>
                    <td scope="col">{{ $student->email }}</td>
                    <td scope="col">{{ $student->gender == 0 ? 'Nam' : 'Nu' }} </td>
                    <td scope="col">{{ $student->point->point }}</td>
                    <td scope="col"><img src="{{ asset('upload/' . $student->avatar) }}" width="100px" height="100px">
                    </td>
                    <td scope="col">
                        <div>
                            <a href="{{ route('editStudent', ['id' => $student->id]) }}"
                                class="btn btn-primary">Edit</a>
                        </div>
                        <div>
                            <form action="{{ route('deleteStudent', ['id' => $student->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="DELETE" onclick="return confirm('Are you sure?')"
                                    class="btn btn-danger">
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <h2>Not Found</h2>
    @endif
</body>

</html>
