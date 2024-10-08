<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Virginia | Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="login-samping/assets/css/login.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      {{Auth::user()}}
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          {{-- <div class="brand-wrapper">
            <img src="login-samping/assets/images/logo.svg" alt="logo" class="logo">
          </div> --}}
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Log in</h1>
            
            <form action="/login" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com" autocomplete="new-email">
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword" autocomplete="new-password">
              </div>
              <input class="btn btn-block login-btn" type="submit">
            </form>
            <a href="#!" class="forgot-password-link">Forgot password?</a>

            @if (session('status'))
              <div class="alert alert-danger">
                {{session('message')}}
              </div>

            @endif
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                  </ul>
              </div>
            @endif

            <p class="login-wrapper-footer-text">Don't have an account? <a href="/register" class="text-reset">Register here</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="login-samping/assets/images/log2.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
