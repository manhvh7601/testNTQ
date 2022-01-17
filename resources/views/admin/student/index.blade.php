<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Student</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        td {
            text-align: center;
        }

        th {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-2">
                    <form method="get">
                        <input class="form-control" type="text" name="nameKeyword" value="{{ old('nameKeyword') }}"
                            placeholder="Search for name">
                        <input type="submit" value="Search" class="form-control btn btn-primary">
                    </form>
                </div>
                <div class="col-md-2">
                    <form method="get">
                        <input class="form-control" type="text" name="emailKeyword" value="{{ old('emailKeyword') }}"
                            placeholder="Search for email">
                        <input type="submit" value="Search" class="form-control btn btn-primary">
                    </form>
                </div>
                <div class="col-md-2">
                    <form method="get">
                        <select name="genderKeyword" class="form-control">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                        <input type="submit" value="Search" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @auth
                <a href="{{ route('logout') }}">Logout</a>
            @endauth
        </div>
    </div>

    @if (!empty($listStudent))
        <div class="row" style="padding: 20px">
            <div class="col-10"></div>
            <div class="col-2">
                <a href="{{ route('createStudent') }}" class="btn btn-secondary">Add Student</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Tuổi</th>
                    <th scope="col">Điểm trung bình</th>
                    <th scope="col">Ảnh đại diện</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listStudent as $st)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $st->fullname }}</td>
                        <td scope="col">{{ $st->email }}</td>
                        <td scope="col">{{ $st->gender == 0 ? 'Nam' : 'Nu' }} </td>
                        <td scope="col">{{ $st->age }} </td>
                        <td scope="col">{{ $st->point->point }}</td>
                        <td scope="col"><img src="{{ asset('upload/' . $st->avatar) }}" width="100px" height="100px">
                        </td>
                        <td scope="col">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('detailStudent', ['id' => $st->id]) }}"
                                        class="btn btn-info">Detail</a>
                                </div>
                                <div class="col-md-2"><a href="{{ route('editStudent', ['id' => $st->id]) }}"
                                        class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{ route('deleteStudent', ['id' => $st->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="DELETE" onclick="return confirm('Are you sure?')"
                                            class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Not Found</h2>
    @endif
    {{ $listStudent->links() }}
</body>

</html>
