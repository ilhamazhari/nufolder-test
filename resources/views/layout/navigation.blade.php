<nav class="navbar navbar-expand-md">
  <a href="#" class="navbar-brand"><strong>NUFOLDER</strong></a>
  <ul class="nav navbar-nav">
    <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
    <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#loginModal">Login</a></li>
  </ul>
</nav>

<div class="modal fade" id="loginModal" role="dialog" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form name="login-form" method="POST" action="{{route('login')}}">
        @csrf
      
      <div class="modal-header">
        <h3 class="modal-title">Login</h3>
        <span class="close" data-dismiss="modal">&times;</span>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Your E-Mail">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Your Password">
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
      </div>

      </form>
    </div>
  </div>
</div>
