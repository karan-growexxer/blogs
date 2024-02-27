@if ($blogsCollection->isNotEmpty())
    <ul class="list-group blogList" id="blogList">
        @foreach ($blogsCollection as $blog)
            <li class="list-group-item list-group-item-action draggable" data-id="{{ $blog->id }}">
                <div class="row">
                    <div class="col-md-2">
                        {{ $blog->title }}
                    </div>
                    <div class="col-md-8">
                        {{ $blog->content }}
                    </div>
                    <div class="col-md-2 text-end">
                        <button href="#" class="btn btn-primary btn-sm edit-btn" data-blog_id="{{ $blog->id }}" data-content="{{ $blog->content }}" data-title="{{ $blog->title }}">Edit</button>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@else
    <h3 class="text-center">No blog Found</h3>
@endif
