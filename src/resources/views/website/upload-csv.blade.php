<!-- upload-csv.blade.php -->
<form method="POST" action="{{ route('csv.upload') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="csv_file">
    <button type="submit">Upload CSV</button>
</form>
