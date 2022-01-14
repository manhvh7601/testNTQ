<form action="{{ route('storePoint') }}" method="post">
    <label>Point</label>
    <input type="number" name="point" value="{{ old('point') }}">
    <input type="submit" value="Submit">
</form>
