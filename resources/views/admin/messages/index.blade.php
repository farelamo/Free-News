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
                                                <h5 class="card-title" style="font-size: 1.6rem">Messages</h5>
                                            </div>
                                            <div class="table-responsive" style="margin-top: 20px">
                                                <table id="myTable" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Content</th>
                                                            <th>Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($messages as $data)
                                                            <tr>
                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                <td>{{ $data->name }}</td>
                                                                <td>{{ $data->email }}</td>
                                                                <td>{{ $data->content }}</td>
                                                                <td>{{ $data->type }}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="#" class="h3"
                                                                            data-toggle="modal" data-target="#edit"
                                                                            onclick='edit("{{ $data->id }}")'>
                                                                            <i class="fas fa-edit m-1"></i>
                                                                        </a>

                                                                        <p id="{{ $data->id }}" class="d-none">
                                                                            {{ $data->name }},
                                                                            {{ $data->email }},
                                                                            {{ $data->content }},
                                                                            {{ $data->type }}
                                                                        </p>

                                                                        <a href="#" class="h3"
                                                                            data-toggle="modal" data-target="#hapus"
                                                                            onclick='hapus("{{ $data->id }}")'>
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
                                                                <td>No data</td>
                                                            </tr>
                                                        @endforelse
                                                </table>
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
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Messages</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formEdit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" class="d-none" id="eId" name="id" required>
                        <div class="form-group">
                            <p>Name</p>
                            <input type="text" class="form-control" name="name" id="eName" required>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input type="text" class="form-control" name="email" id="eEmail" required>
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <p>Content</p>
                            <input type="text" class="form-control" name="content" id="eContent" required>
                            @error('content') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <p>Type</p>
                        <select class="js-states form-control" name="type" tabindex="-1" style="display: none; width: 100%">
                            <option value="">Choose Type</option>
                            <option value="kritik">Kritik</option>
                            <option value="saran">Saran</option>
                            <option value="masukan">Masukan</option>
                        </select>
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
                            <input type="hidden" class="d-none" id="dId" name="id" required>
                            <p id="dhapus"></p>
                        </div>
                        <hr>
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
        function edit(id) {
            var data = (document.getElementById(id).textContent).split(",")
            document.getElementById("eId").value = id;
            document.getElementById("eName").value = data[0]
            document.getElementById("eEmail").value = data[1]
            document.getElementById("eContent").value = data[2]
            document.getElementById("eType").value = data[3]
            document.getElementById('formEdit').action = "/admin/messages/" + id;
        }

        function hapus(id) {
            var data = (document.getElementById(id).textContent).split(",")
            document.getElementById("dId").value = id
            document.getElementById("dhapus").textContent = 'Apakah anda yakin ingin menghapus "' + data[0] + '"?'
            document.getElementById('formHapus').action = "/admin/messages/" + id;
        }
    </script>
@endpush
