@extends('admin/master')

@section('isi')
<div class="main-wrapper container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <p class="page-desc"></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="page-content">
                        <div class="page-info container">
                            <nav aria-label="breadcrumb">
                                <div class="main-wrapper container">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="card-title" style="font-size: 1.6rem">News</h1>
                                            <div class="card-tools" style="margin-top: -50px">
                                                <a href="#" class="btn btn btn-outline-primary float-right"
                                                data-toggle="modal" data-target="#tambah">
                                                    <i class="fas fa-plus"></i> Tambah Data 
                                                </a>
                                            </div>
                                        </div>  
                                        <div class="table-responsive" style="margin-top: 20px">
                                                <table id="myTable" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tittle</th>
                                                            <th>Image</th>
                                                            <th>Content</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($news as $data)
                                                            <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td>{{ $data->title }}</td>
                                                            <td>{{ $data->image}}</td>
                                                            <td>{{ $data->content }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="#" class="h3" data-toggle="modal"
                                                                       data-target="#edit" onclick='edit("{{ $data->id }}")'>
                                                                        <i class="fas fa-edit m-1"></i>
                                                                    </a>

                                                                    <p id="{{ $data->id }}" class="d-none">{{ $data->title }}, {{ $data->image }}, {{ $data->content }}</p>

                                                                    <a href="#" class="h3" data-toggle="modal"
                                                                       data-target="#hapus" onclick='hapus("{{ $data->id }}")'>
                                                                        <i class="fas fa-trash-alt m-1"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tfoot>
                                                        @empty
                                                            <tr colspan="3">
                                                                <td>No data</td>
                                                                <td>No data</td>
                                                                <td>No data</td>
                                                                <td>No data</td>
                                                                <td>No data</td>
                                                            </tr>
                                                        @endforelse
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="d-none" id="eId" name="id" required>
                    <div class="form-group">
                        <p>Title</p>
                        <input type="text" class="form-control" name="tittle" id="eTittle" required>
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <p>Image</p>
                        <textarea class="form-control" name="image" id="eImage" required></textarea>
                        @error('content') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <p>Content</p>
                        <textarea class="form-control" name="content" id="eContent" required></textarea>
                        @error('content') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" id="form">
                        <div class="form-group">
                            <input type="hidden" class="d-none" id="dId" name="id" required>
                            <p id="dhapus"></p>
                        </div><hr>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
  function edit(id){
    var data = (document.getElementById(id).textContent).split(",")
    document.getElementById("eId").value = id;
    document.getElementById("eTittle").value = data[0]
    document.getElementById("eImage").value = data[1]
    document.getElementById("eContent").value = data[2]
    document.getElementById('form').action = "/admin/news/" + id;
  }
  function hapus(id){
    var data = (document.getElementById(id).textContent).split(",")
    document.getElementById("dId").value = id
    document.getElementById("dhapus").textContent = 'Apakah anda yakin ingin menghapus "'+data[0]+'"?'
    document.getElementById('form').action = "/admin/news/" + id;
  }
</script>
@endpush
