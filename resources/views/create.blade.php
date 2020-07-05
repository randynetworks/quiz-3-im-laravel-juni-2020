@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Article</h1>
    <div class="row">
        <div class="col-lg">
            <div class="card bg-white p-3 rounded">
                <form method="POST" action="{{url('/articles')}}">
                    @csrf
                    <input type="input" class="form-control" name="id_user" value="1" hidden>
                    <div class="form-group">
                      <label for="title">Judul Article</label>
                      <input type="input" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukan Judul Article nya" value="{{old('title')}}">
                      @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">slug</label>
                        <input type="input" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Masukan slug Article nya" value="{{old('slug')}}">
                        @error('slug')
                          <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                      </div>
                    <div class="form-group">
                        <label for="isi">Isi Article</label>
                        <textarea type="input" class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" placeholder="Masukan Isi Article nya">{{old('isi')}}</textarea>
                        @error('isi')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                      </div>
                      <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="input" class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag" placeholder="Masukan Tagnya" value="{{old('tag')}}">
                        @error('tag')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

</div>
@endsection
