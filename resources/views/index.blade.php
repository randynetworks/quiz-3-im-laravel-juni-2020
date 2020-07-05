@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Article</h1>
    <a href="{{url('/articles/create')}}" class="btn btn-primary mb-3">Tambah Article Baru</a>
    @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
    <div class="row">
        <div class="col mx-3">
            @foreach ($articles as $article)
            <div class="card-deck bg-white p-3 rounded my-3 d-block">
                    <h3>{{$article->title}}</h3>
                    <h5 class="muted">{{$article->slug}}</h5>
                    <p>{{$article->isi}}</p>

                <?
                $tags = array();
                if ($article->tag) {
                    $tags = explode(',', $article->tag);
                }
                 ?>
                 @foreach ($tags as $tag)
                    <p class="badge badge-success">{{$tag}}</p>&nbsp;
                 @endforeach
                 <form action="articles/{{ $article->id }}" method="post">
                    @method('delete')
                    @csrf
                    <a href="articles/{{$article->id}}/edit" class="badge badge-primary">edit</a>
                    <button type="submit" class="badge badge-danger">x</button>
                </form>

            </div>
            @endforeach
        </div>
    </div>

</div>

<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endsection
