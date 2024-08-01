@extends('admin.layout.app')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Services</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('services.create') }}" class="btn btn-success">Add Service</a>
                        </div>
                        <div class="card-body">
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Contents</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Is Active</th>
                                        <th scope="col"><i class="bi bi-pen"></i></th>
                                        <th scope="col"><i class="bi bi-trash"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $key => $s)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $s->title }}</td>
                                            <td>{{ $s->slug }}</td>
                                            <td><button class="btn btn-primary content" data-id="{{ $s->id }}">Show
                                                    Contents</button></td>
                                            <td>{{ $s->icon }}</td>
                                            <td>
                                                @if ($s->image_url)
                                                    <img class="table-image" src="/storage/{{ $s->image_url }}"
                                                        alt="Service Image">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $s->created_at }}</td>
                                            <td>
                                                <input class="form-check-input active-status-change" data-id="{{ $s->id }}" type="checkbox"  {{ $s->is_active?'checked':'' }}>
                                            </td>
                                            <td><a href="{{ route('services.edit', $s->id) }}" class="btn btn-warning"><i
                                                        class="bi bi-pen"></i></a></td>
                                            <td>
                                                <form action="{{ route('services.destroy', $s->id) }}" method="POST">
                                                    @csrf {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $services->links() }}
                            <!-- End Table with hoverable rows -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>


    <div class="modal fade" id="contentModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Content Short</h2>
                    <div id="content-short">

                    </div><br><br>
                    <h2 class="text-center">Content</h2>
                    <div id="content">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><!-- End Extra Large Modal-->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.content').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/admin/services/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('#content-short').html(response.content_short);
                        $('#content').html(response.content);
                        $('#contentModal').modal('show');
                    }
                })
            });
            $('.active-status-change').click(function(){
                var id=$(this).data('id');
                $.ajax({
                    url:'/admin/services/'+id+'/active-status-change',
                    type:'PUT',
                    data:{
                        '_token':getCsrf()
                    }
                });
            });
        });
    </script>
@endsection
