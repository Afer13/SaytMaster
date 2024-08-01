@extends('admin.layout.app')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>About Us</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('admin.about.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="inputTitle" class="form-label">Title</label>
                                    <input type="text" value="{{ optional($about)->title ?? '' }}" class="form-control"
                                        name="title" id="inputTitle">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputContentShort" class="form-label">Content Short</label>
                                    <textarea cols="30" rows="3" class="form-control" name="content_short" id="inputContentShort">{{ optional($about)->content_short ?? '' }}</textarea>
                                    @error('content_short')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputContent" class="form-label">Content</label>
                                    <textarea class="tinymce-editor" name="content" id="inputContent">{{ optional($about)->content ?? '' }}</textarea>
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label class="form-label">Items</label>
                                    <div class="row items-box">
                                        @if ($about && $about->getItems())
                                            @foreach ($about->getItems() as $key => $item)
                                                <div class="col-6 mt-1" id="item-{{ $key }}">
                                                    <div class="input-group" >
                                                        <input type="text" name="items[]" placeholder="Item" value="{{ $item }}"
                                                            class="form-control">
                                                        <span class="input-group-text"><i class="bi bi-trash delete-item"
                                                                data-id="{{ $key }}"></i></span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-6 mt-1" id="item-0">
                                                <div class="input-group" >
                                                    <input type="text" name="items[]" placeholder="Item" class="form-control">
                                                    <span class="input-group-text"><i class="bi bi-trash delete-item"
                                                            data-id="0"></i></span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary add-item w-50"><i
                                                class="bi bi-plus"></i></button>
                                    </div>
                                    @error('items')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputLogo" class="form-label">Image</label>
                                    <div>
                                        @if ($about)
                                            <img class="col-2 m-1" src="/storage/{{ $about->image_url }}" alt="Image">
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
        $(document).ready(function() {
            function getRandom() {
                return (Math.random() + 1).toString(36).substring(7);
            }
            $('.add-item').click(function() {
                let id = getRandom();
                var html = `<div class="col-6 mt-1" id="item-${id}"><div class="input-group" >
                            <input type="text" name="items[]" placeholder="Item" class="form-control">
                            <span class="input-group-text"><i class="bi bi-trash delete-item" data-id="${id}"></i></span>
                        </div></div>`;
                $('.items-box').append(html);
            });
            $('html').on('click','.delete-item',function() {
                var id=$(this).data('id');
                $('#item-'+id).remove();
            });
        })

    </script>
@endsection
