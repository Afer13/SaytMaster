@extends('admin.layout.app')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Contact Messages</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <form action="" class="row">
                                <div class="col-2">
                                    <select name="is_active" class="form-select">
                                        <option value="">Active Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Not Active</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">IP</th>
                                        <th scope="col">Is Active</th>
                                        <th scope="col">Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $key => $m)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $m->name }}</td>
                                            <td>{{ $m->email }}</td>
                                            <td>{{ $m->subject }}</td>
                                            <td>{{ $m->message }}</td>
                                            <td>{{ $m->ip }}</td>
                                            <td>
                                                <input class="form-check-input active-status-change" data-id="{{ $m->id }}" type="checkbox"  {{ $m->is_active?'checked':'' }}>
                                            </td>
                                            <td>{{ $m->created_at }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $messages->links() }}
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
            // $('.content').click(function() {
            //     var id = $(this).data('id');
            //     $.ajax({
            //         url: '/admin/services/' + id,
            //         type: 'GET',
            //         success: function(response) {
            //             $('#content-short').html(response.content_short);
            //             $('#content').html(response.content);
            //             $('#contentModal').modal('show');
            //         }
            //     })
            // });
            $('.active-status-change').click(function(){
                var id=$(this).data('id');
                $.ajax({
                    url:'/admin/contact-messages/'+id+'/active-status-change',
                    type:'PUT',
                    data:{
                        '_token':getCsrf()
                    }
                });
            });
        });
    </script>
@endsection
