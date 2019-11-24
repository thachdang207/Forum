@include('header')

        <!--Login-->
        <div class="form-wrap">
                <div class="tabs">
                    <h3 class="signup-tab"><a href="#">Sign Up</a></h3>
                </div><!--.tabs-->
        
                <div class="tabs-content">
                        <form class="signup-form" action="{{ route('register') }}" method="POST">
                        {{ csrf_field() }}
                            <input type="text" class="input" id="user_name" autocomplete="off" placeholder="Name" name="name" value="{{ old('name') }}" require autofocus>
                            <input type="email" class="input" id="user_email" autocomplete="off" placeholder="Email" name="email" required>
                            <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="password" required>
                            <input type="password" class="input" id="user_pass_confirm" required autocomplete="off" name="password_confirmation"  placeholder="Confirm Password">
                            <button type="submit" class="button">Sign Up</button>
                        </form><!--.login-form-->
                        <div class="help-text">
                            <p>By signing up, you agree to our</p>
                            <p><a href="#">Terms of service</a></p>
                        </div><!--.help-text-->
                </div><!--.tabs-content-->
            </div><!--.form-wrap-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
    <script src="./login.js"></script>
  </body>
</html>