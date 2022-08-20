<div class="card">
    <div class="card-header">
        Import posts with a csv file
    </div>
    <div class="card-body">
        <p>Please upload a csv with the fields title, content, user_id</p>
        <form action="{{ route('csvupload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Upload</button>
        </form>
    </div>
</div>