<div class="card">
    <div class="card-header">
        RSS feed import settings
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            Feed url
            <input type="text" name="feed_url" class="form-control">
            <br>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
</div>