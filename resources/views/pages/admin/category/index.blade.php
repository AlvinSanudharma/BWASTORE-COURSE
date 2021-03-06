@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
    <!-- Page content -->
        <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Category</h2>
                <p class="dashboard-subtitle">Store Category List</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                             @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show my-3 mx-3" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                             @endif
                            <div class="card-body">
                                <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">+ Tambah Category Baru</a>
                                <div class="table-responsive">
                                    <table class="table scroll-horizontal-vetical w-100 table-hover" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Slug</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
@endsection

@push('addon-script')
        <script>
            var datatable = $('#crudTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'name', name: 'name'},
                    { data: 'photo', name: 'photo'},
                    { data: 'slug', name: 'slug'},
                    { 
                      data: 'action', 
                      name: 'action',
                      orderable: false,
                      searchable: false,
                      width: '15%'
                    },
                ]
            })
        </script>
@endpush