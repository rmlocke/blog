<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    RSS feed import settings
                </div>
                <div class="card-body">
                    <form action="{{ route('rssoptions') }}" method="POST">
                        @csrf
                        <label>Feed url</label>
                        <input type="text" name="feed_url" value="{{ $feed_url }}" class="form-control">
                        <br>
                        <label>Feed is active?</label>
                        <select name="feed_active" class="form-control">
                            @if($feed_active == 1)
                            <option value="0">No</option>
                            <option value="1" selected>Yes</option>
                            @else
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                            @endif
                        </select>
                        <br>
                        <button class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>