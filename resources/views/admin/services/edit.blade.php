@extends('admin.layout.app')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Service Edit</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('services.update',$service->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="col-12">
                                    <label for="inputTitle" class="form-label">Title</label>
                                    <input type="text" value="{{ optional($service)->title ?? '' }}" class="form-control"
                                        name="title" id="inputTitle">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputSlug" class="form-label">Slug</label>
                                    <input type="text" value="{{ optional($service)->slug ?? '' }}" class="form-control"
                                        name="slug" id="inputSlug">
                                    @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputIcon" class="form-label">Icon</label>
                                    <input type="text" value="{{ optional($service)->icon ?? '' }}" class="form-control"
                                        name="icon" id="inputIcon">
                                    @error('icon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputContentShort" class="form-label">Content Short</label>
                                    <textarea cols="30" rows="3" class="form-control" name="content_short" id="inputContentShort">{{ optional($service)->content_short ?? '' }}</textarea>
                                    @error('content_short')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputContent" class="form-label">Content</label>
                                    <textarea class="tinymce-editor" name="content" id="inputContent">{{ optional($service)->content ?? '' }}</textarea>
                                    @error('content_short')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-12">
                                    <label for="inputLogo" class="form-label">Image</label>
                                    <div>
                                        @if ($service)
                                            <img class="col-2 m-1" src="/storage/{{ $service->image_url }}" alt="Image">
                                        @else
                                            No Image
                                        @endif
                                    </div>
                                    <input type="file" class="form-control" name="image" id="inputImage">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@section('script')
    <script>
    </script>
@endsection
