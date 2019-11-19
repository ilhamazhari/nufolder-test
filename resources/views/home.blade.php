@extends('layout.main')

@section('title', 'Home')

@section('content')

<div class="container-fluid">
  @include('layout.navigation')

  <!-- Content here -->
  <h1>This is home</h1>

  @include('layout.footer')
</div>

@endsection

@section('script')
<script type="text/javascript">
  //
</script>
@endsection