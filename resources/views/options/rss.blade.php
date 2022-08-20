<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    RSS feed import settings
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <label>Feed url</label>
                        <input type="text" name="feed_url" class="form-control">
                        <br>
                        <label>Feed is active?</label>
                        <select name="feed_active" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <br>
                        <button class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>