@extends('admin.layout.app')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Portfolio Add</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('portfolios.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="inputTitle" class="form-label">Title</label>
                                    <input type="text" value="{{ old('title','') }}" class="form-control"
                                        name="title" id="inputTitle">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputLogo" class="form-label">Image</label>
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
