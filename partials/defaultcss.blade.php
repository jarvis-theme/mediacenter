{{favicon()}} 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

{{generate_theme_css('mediacenter/assets/css/bootstrap.min.css')}}
@if($tema->isiCss=='')
{{generate_theme_css('mediacenter/assets/css/main.css')}}
@else
{{generate_theme_css('mediacenter/assets/css/editmain.css')}}
@endif
{{generate_theme_css('mediacenter/assets/css/owl.carousel.css')}}
{{generate_theme_css('mediacenter/assets/css/owl.transitions.css')}}
{{generate_theme_css('mediacenter/assets/css/animate.min.css')}}
{{generate_theme_css('mediacenter/assets/css/config.css')}}
{{generate_theme_css('mediacenter/assets/css/font-awesome.min.css')}}
{{generate_theme_css('mediacenter/assets/css/prettyPhoto.css')}}