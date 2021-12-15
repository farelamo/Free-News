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
                                            <h5 class="card-title" style="font-size: 1.6rem">User</h5>
                                        </div>    
                                            <div class="table-responsive" style="margin-top: 20px">
                                                <table id="myTable" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Email</th>
                                                            <th>Verify</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($user as $data)
                                                        @if ($data->id != Auth::user()->id)
                                                            <tr>
                                                                <td>{{ $data->email }}</td>
                                                                <td>
                                                                    @if ( $data->is_verified == 1)
                                                                        <button class="btn btn-success" disabled>Verified</button>
                                                                    @else
                                                                        <button class="btn btn-danger" disabled>Not Verified</button>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="#" class="h3" data-toggle="modal"
                                                                        data-target="#edit" onclick='edit("{{ $data->id }}")'>
                                                                            <i class="fas fa-edit m-1"></i>
                                                                        </a>

                                                                        <p id="{{ $data->id }}" class="d-none">{{ $data->email }}, {{ $data->is_verified }}</p>

                                                                        <a href="#" class="h3" data-toggle="modal"
                                                                        data-target="#hapus" onclick='hapus("{{ $data->id }}")'>
                                                                            <i class="fas fa-trash-alt m-1"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
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

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="editform">
                    @csrf
                    @method('PUT')

                    <div class="form-group d-none">
                        <input type="text" class="form-control" id="cc" name="value">
                    </div>
                    <div class="custom-control custom-switch">
                         <input type="checkbox" class="custom-control-input" id="cek" onchange="check()" name="acc">
                         <label class="custom-control-label" for="cek" id="note"></label>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
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
            var data = (document.getElementById(id).textContent).split(",");
        
            let aksi = document.getElementById("editform").setAttribute("action", "/user/" + id + "edit");
            let cc = document.getElementById("cc").value = data[1];

            let note = document.getElementById("note")
            let att = document.createAttribute("checked");
            let cek = document.getElementById("cek")
            cek.value = data[1]
            cek.setAttributeNode(att)
            
            if(cek.value == 1){
                cek.checked = true
                note.textContent = 'Verified'
            }else if(cek.value == 0){
                cek.checked = false
                note.textContent = 'Not Verified'
            }
        }

        function check(){
            let cc = document.getElementById("cc")
            let note = document.getElementById("note")
            if(cek.checked == true){
                note.textContent = 'Verify'
                cc.value = 1
            }else {
                note.textContent = 'Not Verify'
                cc.value = 0
            }
        }

        function hapus(id){
            var data = (document.getElementById(id).textContent).split(",")
            document.getElementById("dId").value = id
            document.getElementById("dhapus").textContent = 'Apakah anda yakin ingin menghapus "'+data[0]+'"?'
            document.getElementById('form').action = "/admin/user/" + id;
        }
    </script>
@endpush
