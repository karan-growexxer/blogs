@extends('layouts.app')
@push('style')
     <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
     <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
     <!-- MDB -->
     {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" /> --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
@endpush
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col">
                    <div class="card" id="list" style="border-radius: .75rem; background-color: #eff1f2;">
                        <div class="card-body py-4 px-4 px-md-5">
                            <form action="POST" id="createBlogForm">
                                <div class="pb-2">
                                    <div class="card">
                                        <div class="card-body">
                                            {{ csrf_field() }}
                                            <div class="row d-flex flex-row align-items-center">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                                    <input type="hidden" name="id" id="blog_id">
                                                </div>
                                                <div class="form-group col-md-12 mt-3 mb-3">
                                                    <textarea name="content" id="content" class="form-control" cols="30" rows="5" placeholder="Content"></textarea>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                        <div class="card-body py-4 px-4 px-md-5">
                            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                                <i class="fas fa-check-square me-1"></i>
                                <u>My Blogs</u>
                            </p>
                            <div class="d-flex justify-content-end align-items-center mb-4 pb-3">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Search">
                            </div>
                            <div id="blogListing"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/blogs.js') }}"></script>
@endpush
