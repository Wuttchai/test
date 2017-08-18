<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    APIs Test
                </div>

                <div class="links">
                  <button onclick="tt()" type="button" class="btn btn-primary btn-lg">
  <span> Login with Facebook</span>
</button>

                </div>
            </div>
        </div>

<script language="JavaScript" type="text/javascript">
window.fbAsyncInit = function() {
    FB.init({
      appId            : '1257729320962377',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

function tt() {
  FB.login(processLoginClick, {scope:'public_profile,email,user_friends', return_scopes: true});
}

        function processLoginClick (response) {
            var uid = response.authResponse.userID;
            var access_token = response.authResponse.accessToken;
            var permissions = response.authResponse.grantedScopes;
            var data = { uid:uid,
                         access_token:access_token,
                         _token:'{{ csrf_token() }}', // this is important for Laravel to receive the data
                         permissions:permissions
                       };
            postData("{{ url('/login') }}", data, "post");
        }
        function postData(url, data, method)
        {
            method = method || "post";
            var form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", url);
            for(var key in data) {
                if(data.hasOwnProperty(key))
                {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", data[key]);
                    form.appendChild(hiddenField);
                 }
            }
            document.body.appendChild(form);
            form.submit();
        }


        </script>
    </body>
</html>
