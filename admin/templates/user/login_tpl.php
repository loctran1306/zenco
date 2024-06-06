<div id="Wrapper">
    <div class="" id="loginForm">
       <div class="welcome-login">
            <h2>Administrator</h2>
            <form action="index.php?com=user&act=login" id="validate" class="form" method="post">
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <div class="has-feedback">
                        <input type="text" name="username" class="validate[required] form-control input-lg input-padding" id="username" placeholder="Tên đăng nhập" />
                        <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="password" class="control-label">Mật khẩu</label>
                    <div class="has-feedback">
                        <input type="password" name="password" class="validate[required] form-control input-lg input-padding" id="pass" placeholder="Mật khẩu" />
                        <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                
                <div class="form-group" style="margin-top: 20px">
                    <input type="submit" value="Đăng nhập" class="dredB logMeIn btn btn-danger btn-lg" />
                </div>
                <div class="loading_window" style="display: none;">
                    <div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div>
                    </div>
                </div>
                <div id="loginError" class="alert alert-danger alert-dismissible" role="alert">
                </div>
            </form>
        </div>
    </div>
</div>    