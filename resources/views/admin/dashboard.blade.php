@extends('layout.main')

@section('title', 'Home')

@section('content')

<div class="container-fluid">
  @include('layout.navigation')

  @if(session('success'))
  <div class="alert alert-success">{{session('success')}}</div>
  @elseif(session('error'))
  <div class="alert alert-danger">{{session('error')}}</div>
  @endif

  <!-- Content here -->
  <h1>This is admin Dashboard</h1>

  <table class="table table-stripped">
    <thead>
      <th>#</th>
      <th>Title</th>
      <th>Content</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach($article as $ar)
      <tr>
        <td></td>
        <td>{{$ar->title}}</td>
        <td>{{$ar->content}}</td>
        <td><form action="{{route('admin.article.destroy', $ar->id)}}" method="POST">@csrf @method('DELETE')<button type="button" class="btn btn-success edit-button" data-toggle="modal" data-target="#editArtikelModal" data-route="{{route('admin.article.update', $ar->id)}}" data-title="{{$ar->title}}" data-content="{{$ar->content}}"><i class="fa fa-pencil-square-o"></i> Edit</button><button type="submit" class="btn btn-danger"><i class="fa fa-times"></i> Delete</button></form></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addArtikelModal"><i class="fa fa-plus"></i> Artikel Baru</button>

  <div class="modal fade" id="addArtikelModal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-expand-lg" role="document">
      <div class="modal-content">
        <form name="addArtikelForm" method="POST" action="{{route('admin.article.store')}}">
          @csrf
        <div class="modal-header"><h3>Add Artikel</h3><button type="button" class="close" data-dismiss="modal">&times;</button></div>

        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title">
          </div>
          <div class="form-group">
            <textarea name="content" class="form-control" rows="8" placeholder="Content"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
          <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editArtikelModal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-expand-lg" role="document">
      <div class="modal-content">
        <form name="editArtikelForm" method="POST" action="">
          @csrf
          @method('PUT')
        <div class="modal-header"><h3>Add Artikel</h3><button type="button" class="close" data-dismiss="modal">&times;</button></div>

        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="title" id="editTitle" class="form-control" placeholder="Title">
          </div>
          <div class="form-group">
            <textarea name="content" id="editContent" class="form-control" rows="8" placeholder="Content"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
          <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  @include('layout.footer')
</div>

@endsection

@section('script')
<script type="text/javascript">
  //
  $('.edit-button').click(function(){
    $('form[name=editArtikelForm]').attr('action', $(this).data('route'));
    $('#editTitle').val($(this).data('title'));
    $('#editContent').val($(this).data('content'));
  });
</script>
@endsection