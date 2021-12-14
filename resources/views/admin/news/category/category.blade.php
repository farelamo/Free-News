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
                                            <h5 class="card-title" style="font-size: 1.6rem">News Category</h5>
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
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($category as $data)
                                                            <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            <td>{{ $data->description }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="#" class="h3" data-toggle="modal" 
                                                                       data-target="#edit" onclick='edit("{{ $data->id }}")'>
                                                                        <i class="fas fa-edit m-1"></i>    
                                                                    </a>
                                                                    <p id="{{ $data->id }}" class="d-none">{{ $data->id }}, {{ $data->name }}, {{ $data->description }}</p>

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

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah News Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <p>Name</p>
                        <input type="text" class="form-control" name="name" required>
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <p>Deskripsi</p>
                        <textarea class="form-control" name="description" required></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
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

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit News Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formEdit" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <p>Name</p>
                        <input type="text" class="form-control" name="name" id="eName" required>
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <p>Deskripsi</p>
                        <textarea class="form-control" name="description" id="eDesc" required></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" id="formHapus">
                        @csrf
                        @method('DELETE')

                        <div class="form-group">
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
            document.getElementById("eName").value = data[1]
            document.getElementById("eDesc").value = data[2]
            document.getElementById('formEdit').action = "/admin/category/" + id;
        }
        function hapus(id){
            var data = (document.getElementById(id).textContent).split(",")
            document.getElementById("dhapus").textContent = 'Apakah anda yakin ingin menghapus "'+data[1]+'"?'
            document.getElementById('formHapus').action = "/admin/category/" + id;
        }
    </script>
@endpush