@include('header')

        <!--Login-->
        <div class="form-wrap">
                <div class="tabs">
                    <h3 class="login-tab"><a class="active" href="#login-tab-content">Login</a></h3>
                </div><!--.tabs-->
                <div class="tabs-content">
                    <div id="login-tab-content"  class="active">
                        <form class="login-form" action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <div>
                                <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Email" name="email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif 
                            </div>
                            <input type="checkbox" class="checkbox" id="remember_me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember_me">Remember me</label>
                            <input type="submit" class="button" value="Login">
                        </form><!--.login-form-->
                        <div class="help-text">
                            <p><a href="#">Forget your password?</a></p>
                        </div><!--.help-text-->
                    </div><!--.login-tab-content-->
                </div><!--.tabs-content-->
            </div><!--.form-wrap-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
    <script src="./login.js"></script>
  </body>
</html>