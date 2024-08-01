@extends('admin.layout.app')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Portfolio Edit</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('portfolios.update',$portfolio->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="col-12">
                                    <label for="inputTitle" class="form-label">Title</label>
                                    <input type="text" value="{{ old('title',$portfolio->title) }}" class="form-control"
                                        name="title" id="inputTitle">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                               
                                
                                <div class="col-12">
                                    <label for="inputLogo" class="form-label">Image</label>
                                    <div>
                                        @if ($portfolio->image_url)
                                            <img class="col-2 m-1" src="/storage/{{ $portfolio->image_url }}" alt="Image">
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
