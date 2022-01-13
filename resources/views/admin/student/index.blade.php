<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Student</title>
</head>
<body>
    @if (!empty($student))
    <div>
        <a href="{{ route('createStudent') }}">Add Student</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Tuổi</th>
                <th>Điểm trung bình</th>
                <th>Ảnh đại diện</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $st)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $st->fullname }}</td>
                <td>{{ $st->email }}</td>
                <td>{{ $st->gender == 0 ? 'Nam' : 'Nu' }} </td>
                <td>{{ $st->point }}</td>
                <td><img src="{{ asset('upload/' . $st->avatar) }}"></td>
                <td>
                    <div><a href="">Edit</a></div>
                    <div>
                        <form action="" method="post">
                            <input type="hidden" name="id">
                            <input type="submit" value="DELETE">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
     <h2>Not Found</h2>   
    @endif
    {{ $student->links() }}
</body>
</html>