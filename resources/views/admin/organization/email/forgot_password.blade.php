@include('admin.email.header',  ['title' => 'Forgot Password'])



<div style="line-height:1.5;padding-top:10px;padding-bottom:10px;">
    <div style="line-height: 1.5; font-size: 12px;">
        <p style="text-align: center; line-height: 1.5; word-break: break-word; font-family: inherit; font-size: 16px; margin: 0;">
													<span style="font-family: Poppins; font-style: normal; font-weight: normal;
													font-size: 18px; line-height: 24px; color: #747D86;">You are account is confirmed. Please use this password for login !</span>
            <br/>
        <center>
           Password : {{ @$otp }}
        </center>
        </p>
    </div>
</div>



{{--@include('admin.email.footer')--}}

