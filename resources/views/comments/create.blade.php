
<div class="card">
    <div class="card-header">{{ __('Add Comment') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf

            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="parent" value="0">
            <div class="row mb-3">
                <label for="author" class="col-md-2 col-form-label text-md-end">{{ __('Author') }}</label>

                <div class="col-md-10">
                    <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required>

                    @error('author')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="content" class="col-md-2 col-form-label text-md-end">{{ __('Content') }}</label>

                <div class="col-md-10">
                    <textarea id="content" class="form-control editor @error('password') is-invalid @enderror" name="content" required>{{ old('content') }}</textarea>

                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add Comment') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>