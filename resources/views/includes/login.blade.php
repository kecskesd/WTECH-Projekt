<div id="login-window">
    <div id="login">
        <div id="l1">
            <i onclick="document.getElementById('login-window').style.display = 'none'" class="fal fa-times close"></i>
            <h1>LOG IN</h1>
            <form action="/login" method="post" novalidate="novalidate">
                <div class="textfield">
                    <input name="email" type="text" required>
                    <span class="bar"></span>
                    <label>E-mail</label>
                </div>
                <div class="textfield">
                    <input name="password" type="password" required>
                    <span class="bar"></span>
                    <label>Password</label>
                </div>
                {{ csrf_field() }}
                <button class="login" type="submit">LOG IN</button>
            </form>
            <a href="#">Forgot password?</a>
            <a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a onclick="document.getElementById('l2').style.display='block';document.getElementById('l1').style.display='none'">Create an account</a>
        </div>
        <div id="l2">
            <i onclick="document.getElementById('login-window').style.display = 'none'" class="fal fa-times close"></i>
            <h1>REGISTER</h1>
            <form action="/register" method="post" novalidate="novalidate">
                <div class="textfield">
                    <input name="email" type="text" required>
                    <span class="bar"></span>
                    <label>E-mail</label>
                </div>
                <div class="textfield">
                    <input name="password" type="password" required>
                    <span class="bar"></span>
                    <label>Password</label>
                </div>
                {{ csrf_field() }}
                <button class="login" type="submit">REGISTER</button>
            </form>
            <a onclick="document.getElementById('l1').style.display='block';document.getElementById('l2').style.display='none'">Already have an account?</a>
        </div>
    </div>
</div>
