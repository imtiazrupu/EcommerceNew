<!--
Author: Soft-all
Author URL: http://soft-all.com/
-->
<!DOCTYPE html>
<html>
<head>
<title>@yield('title_area')</title>
<!-- for-mobile-apps -->
@yield('css_js')
</head>
<body>
<!-- header -->
@include('frontView.include.header')
<!-- //header-bot -->
<!-- banner -->
@include('frontView.include.menu')
<!-- //banner-top -->
<!-- banner -->
@yield('feature')
<!-- //banner -->
<!-- content -->

@yield('main_content')
<!-- //product-nav -->

@include('frontView.include.coupons')
<!-- footer -->
@include('frontView.include.footer')
</body>
</html>
