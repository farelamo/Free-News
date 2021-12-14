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
                                                            <th>Image</th>
                                                            <th>Tittle</th>
                                                            <th>Author</th>
                                                            <th>Publish</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($news as $data)
                                                            <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td>
                                                                @if ($data->image != '')
                                                                    <img src="{{ asset('images/News/' . $data->image) }}" alt="" class="rounded-circle mr-2 d-inline of-cover" width="50" height="45">
                                                                @else
                                                                    <img src="{{ asset('images/News/blankNews.png') }}" alt="" class="rounded-circle mr-2 d-inline of-cover" width="50" height="45">
                                                                @endif
                                                            </td>
                                                            <td>{{ $data->title }}</td>
                                                            <td>{{ $data->author_id }}</td>
                                                            <td>
                                                                @if ($data->is_posted == 1)
                                                                    <button class="btn btn-success" disabled>Published</button>
                                                                @else
                                                                    <button class="btn btn-danger" disabled>Not Published</button>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="/admin/news/{{ $data->id }}/edit" class="h3"><i class="fas fa-edit m-1"></i></a>

                                                                    <p id="{{ $data->id }}" class="d-none">{{ $data->id }}, {{ $data->title }}, {{ $data->image }}, {{ $data->category_id }}, {{ $data->content }}, {{ $data->is_posted }}</p>

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

 <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Masukkan Title" required>
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" style="height: auto">
                        @error('content') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div style="margin-bottom: 15px">
                        <select class="js-states form-control" name="category" tabindex="-1" style="display: none; width: 100%" required>
                            <option value="">Choose Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="content" placeholder="Masukkan Content" required></textarea>
                        @error('content') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group d-none">
                        <input type="text" class="form-control" id="input" name="publish" value="1">
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="publish" onchange="check()" checked>
                        <label class="custom-control-label" for="publish" id="note">Publish</label>
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
                    <form class="forms-sample" method="post" id="formHapus">
                        @csrf
                        @method('DELETE')

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
    
    let cc = document.getElementById("publish")

    function check(){
        let cc = document.getElementById("publish")
        let input = document.getElementById("input")
        let note = document.getElementById("note")
        if(cc.checked == true){
            input.value = '1'
            note.textContent = 'Publish'
        }else {
            input.value = '0'
            note.textContent = 'Belum Publish'
        }
    }

    function hapus(id){
        var data = (document.getElementById(id).textContent).split(",")
        document.getElementById("dId").value = id
        document.getElementById("dhapus").textContent = 'Apakah anda yakin ingin menghapus "'+ data[1]+'"?'
        document.getElementById('formHapus').action = "/admin/news/" + id;
    }
</script>
@endpush
