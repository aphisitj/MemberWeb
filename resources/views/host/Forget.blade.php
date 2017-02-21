<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Back Office</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    {{ Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
    {{ Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('assets/global/plugins/uniform/css/uniform.default.min.css') }}
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    {{ Html::style('assets/backend/pages/css/login.css') }}
    <!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN THEME STYLES -->
    {{ Html::style('assets/global/css/components-md.css') }}
    {{ Html::style('assets/global/css/plugins-md.css') }}
    {{ Html::style('assets/backend/layout3/css/layout.css') }}
    {{ Html::style('assets/backend/layout3/css/themes/default.css') }}
    {{ Html::style('assets/backend/layout3/css/custom.css') }}
            <!-- END THEME STYLES -->

    <!-- BEGIN MORE STYLES -->
    @yield('more-style')
            <!-- END MORE STYLES -->

    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="page-md login">
<div class="logo">
    {{--<img src="{{ url()->asset('assets/backend/layout3/img/logo-default.png') }}" alt=""/>--}}
</div>
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ url()->to($bo_name.'/login/form') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h3 class="form-title">Forget password</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
			
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="username" value="{{ old('username') }}"/>
            </div>
        </div>
       
        <div class="form-actions">
            <label class="">            
            <button type="submit" class="btn green-haze pull-Right">
                Send <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END LOGIN FORM -->
</div>

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{{ Html::script('assets/global/plugins/respond.min.js') }}
{{ Html::script('assets/global/plugins/excanvas.min.js') }}
<![endif]-->
{{ Html::script('assets/global/plugins/jquery.min.js') }}
{{ Html::script('assets/global/plugins/jquery-migrate.min.js') }}
        <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{{ Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}
{{ Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ Html::script('assets/global/plugins/jquery.blockui.min.js') }}
{{ Html::script('assets/global/plugins/jquery.cokie.min.js') }}
{{ Html::script('assets/global/plugins/uniform/jquery.uniform.min.js') }}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
<!-- END PAGE LEVEL PLUGINS -->

{{ Html::script('assets/global/scripts/metronic.js') }}
{{ Html::script('assets/backend/layout3/scripts/layout.js') }}
{{ Html::script('assets/backend/layout3/scripts/demo.js') }}

{{ Html::script('js/backend/login.js') }}

<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
        Demo.init(); // init demo features
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>