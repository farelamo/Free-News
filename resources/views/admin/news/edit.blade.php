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
                            <div class="col-12">
                                <h1 class="card-title" style="font-size: 1.6rem">Edit News</h1>
                            </div>
                            <form action="/admin/news/{{ $news->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Masukkan Title" value="{{ $news->title }}" required>
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
                                            @if ($item->id == $catItem->id)
                                                <option value="{{ $catItem->id }}" selected>{{ $catItem->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="content" placeholder="Masukkan Content" required>{{ $news->title }}</textarea>
                                    @error('content') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group d-none">
                                    <input type="text" class="form-control" id="input" name="publish" value="1">
                                </div>

                                <div class="custom-control custom-switch">
                                    @if ($news->is_posted == 1)
                                        <input type="checkbox" class="custom-control-input" id="publish" onchange="check()" checked>
                                        <label class="custom-control-label" for="publish" id="note">Publish</label>
                                    @else
                                        <input type="checkbox" class="custom-control-input" id="publish" onchange="check()">
                                        <label class="custom-control-label" for="publish" id="note">Belum Publish</label>
                                    @endif
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
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
    </script>
@endpush