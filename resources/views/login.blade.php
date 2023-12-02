<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/1a0309481a.js"
      crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="icon" href="{{'asset/organotanilogo.png'}}">

    <!-- Font Awesome -->
    <script
      src="{{url('https://kit.fontawesome.com/1a0309481a.js')}}"
      crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('stylelogin.css')}}" />
    <title>Organotani | Login</title>
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{'/sign-in'}}" method="post" class="sign-in-form">
            @csrf
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text" style="margin-top: 20px">
              Or Sign in with social platforms
            </p>
            <div class="social-media">
              <a href="{{ '/auth/redirect'}}" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
            <div class="text-center" style="margin-top: 30px">
              <a href="{{'/'}}" class="back-link">Back</a>
            </div>
          </form>
          <form action="{{'/sign-up'}}" method="post" class="sign-up-form">
            @csrf
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" required/>
            </div>
            <div class="input-field">
              <i class="fa-solid fa-person"></i>
              <input type="text" placeholder="Nickname" name="name" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="tel" placeholder="Phone Number" name="phone" required/>
            </div>
            <div class="gender-field">
              <input
                type="radio"
                name="gender"
                value="male"
                id="male"
                checked required/>
              <label for="male">Male</label>
              <input type="radio" name="gender" value="female" id="female" required/>
              <label for="female">Female</label>
            </div>
            <input type="submit" class="btn" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Selamat Datang</h3>
            <p>
              Semoga Organitani bisa membuat hari anda menjadi bahagia,
              Bergabung Sekarang dan Temukan Lebih Banyak!
            </p>
            <button class="btn transparent" id="sign-up-btn">Sign up</button>
          </div>
          <img src="img/preview.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Kenapa harus Sign-Up?</h3>
            <p>
              Jika anda tidak melakukan sign up maka tidak bisa mengakses
              website kami,tetapi ada opsi yang kami berikan untuk login lewat
              platform lain
            </p>
            <button class="btn transparent" id="sign-in-btn">Sign in</button>
          </div>
          <img src="img/roles.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{{asset('loginapp.js')}}"></script>
  </body>
</html>
