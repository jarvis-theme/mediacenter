{{favicon()}} 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
@if($tema->isiCss=='')
{{generate_theme_css('mediacenter/assets/css/main.css')}}
@else
{{generate_theme_css('mediacenter/assets/css/editmain.css')}}
@endif
{{generate_theme_css('mediacenter/assets/css/owl.carousel.css')}}
{{generate_theme_css('mediacenter/assets/css/owl.transitions.css')}}
{{generate_theme_css('mediacenter/assets/css/animate.min.css')}}
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
{{generate_theme_css('mediacenter/assets/css/prettyPhoto.css')}}