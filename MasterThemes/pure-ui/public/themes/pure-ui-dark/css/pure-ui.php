<?php
    header("Content-type: text/css; charset: UTF-8");

    require('../custom_config.php');
    $main_color_rgba = hex2rgba($main_color);

    function hex2rgba($color, $opacity = false) {
        $default = 'rgba(0, 0, 0';
        if(empty($color))
              return $default; 
            if ($color[0] == '#') {
                $color = substr( $color, 1 );
            }
     
            if (strlen($color) == 6) {
                    $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
            } elseif ( strlen( $color ) == 3 ) {
                    $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
            } else {
                    return $default;
            }
            $rgb =  array_map('hexdec', $hex);
            $output = 'rgba('.implode(",",$rgb).'';
            return $output;
    }
?>

.skin-blue .main-header .navbar{
	background: #27293d;
	box-shadow: 0 0 0 1px rgba(89, 105, 128, .1), 0 1px 3px 0 rgba(89, 105, 128, .1), 0 1px 2px 0 rgba(0, 0, 0, .05) !important;
}

.skin-blue .wrapper,.skin-blue .main-sidebar,.skin-blue .left-side{
    background: <?php echo $sidebar_color; ?>;
    box-shadow: 8px 0px 20px 0px rgba(0, 0, 0, 0.1);
}

@media (max-width:767px){
    .skin-blue .main-header .navbar .dropdown-menu li.divider{
        background: linear-gradient(87deg,<?php echo $main_color; ?> 0,<?php echo $secondary_color; ?> 100%)!important;
    }
    .skin-blue .main-header .navbar .dropdown-menu li a{
        color:#fff
    }
    .skin-blue .main-header .navbar .dropdown-menu li a:hover{
        background: linear-gradient(87deg,<?php echo $main_color; ?> 0,<?php echo $secondary_color; ?> 100%)!important;
    }
}

.skin-blue .main-header .logo{
    color: rgba(0, 0, 0, 0.65);
    border-bottom:0 solid transparent;
    font-size: x-large;
    display: block;
    background: <?php echo $main_color; ?>;
    -webkit-text-fill-color: <?php echo $icons_color; ?>;
    font-weight: 400;
}

.skin-blue .sidebar-menu>li.active>a{
    border-left-color:<?php echo $icons_color; ?>;
}

.card {
	font-size: .875rem;
	background: linear-gradient(87deg,<?php echo $main_color; ?> 0,<?php echo $secondary_color; ?> 100%)!important;
}

.progress-bar{
    float:left;
    width:0;
    height:100%;
    font-size:12px;
    line-height:20px;
    color:#fff;
    text-align:center;
    background-color:<?php echo $main_color; ?>;
    -webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);
    box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);
    -webkit-transition:width .6s ease;
    -o-transition:width .6s ease;
    transition:width .6s ease
}
.progress-bar-aqua,.progress-bar-info{
    background-color:<?php echo $main_color; ?>
}

.progress-bar-light-blue,.progress-bar-primary{
    background-color:<?php echo $main_color; ?>
}
.progress-bar-green,.progress-bar-success{
    background-color:<?php echo $main_color; ?>
}

.box.box-primary{
    border-top-color:<?php echo $main_color; ?>
}

.box.box-info{
    border-top-color:<?php echo $main_color; ?>
}

.box.box-danger{
    border-top-color:<?php echo $main_color; ?>
}

.box.box-warning{
    border-top-color:<?php echo $main_color; ?>
}

.box.box-success{
    border-top-color:<?php echo $main_color; ?>
}

.btn.active, .btn.active.focus {
    background-color: <?php echo $main_color; ?>;
}

.btn-primary{
    color: #fff;
    border-color: <?php echo $main_color; ?>;
    background-color: <?php echo $main_color; ?>;
    box-shadow: 0 4px 6px rgba(50,50,93,.11), 0 1px 3px rgba(0,0,0,.08);
}

.btn-primary:hover,.btn-primary:active,.btn-primary.hover,.btn-primary:focus,.btn-primary.focus{
    color:#fff;
    border-color:<?php echo $main_color; ?>;
    background-color:<?php echo $main_color; ?>
}

.btn-primary.disabled,.btn-primary:disabled{
    color:#fff;
    border-color:<?php echo $main_color; ?>;
    background-color:<?php echo $main_color; ?>
}

.btn-primary:not(:disabled):not(.disabled):active,.btn-primary:not(:disabled):not(.disabled).active,.show>.btn-primary.dropdown-toggle{
    color:#fff;
    border-color:<?php echo $secondary_color; ?>;
    background-color:<?php echo $secondary_color; ?>
}

.btn-primary:not(:disabled):not(.disabled):active:focus,.btn-primary:not(:disabled):not(.disabled).active:focus,.show>.btn-primary.dropdown-toggle:focus{
    box-shadow:none,0 0 0 0 <?php echo $main_color_rgba; ?>, 1);
}

.btn-primary:hover{
    color:#fff;
    background-color:<?php echo $main_color; ?>;
    border-color:<?php echo $main_color; ?>
}
.btn-primary.active,.btn-primary:active,.open>.dropdown-toggle.btn-primary{
    color:#fff;
    background-color:<?php echo $main_color; ?>;
    border-color:<?php echo $main_color; ?>
}
.btn-primary.active.focus,.btn-primary.active:focus,.btn-primary.active:hover,.btn-primary:active.focus,.btn-primary:active:focus,.btn-primary:active:hover,.open>.dropdown-toggle.btn-primary.focus,.open>.dropdown-toggle.btn-primary:focus,.open>.dropdown-toggle.btn-primary:hover{
    color:#fff;
    background-color:<?php echo $main_color; ?>;
    border-color:<?php echo $main_color; ?>
}
.btn-primary.active,.btn-primary:active,.open>.dropdown-toggle.btn-primary{
    background-image:none
}
.btn-primary .badge{
    color:<?php echo $main_color; ?>;
    background-color:#fff
}

.nav-tabs-custom>.nav-tabs>li.active{
    border-top-color:<?php echo $main_color; ?>
}

.nav-tabs-custom.tab-primary>.nav-tabs>li.active{
    border-top-color: <?php echo $main_color; ?>
}

.label-default{
    background-color: #d2d6de;
    color: <?php echo $main_color; ?>;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    font-size: 12px;
}

.bg-blue{
    background: linear-gradient(87deg,<?php echo $main_color; ?> 0,<?php echo $secondary_color; ?> 100%)!important;
    border-radius: 20px;
}

.bg-light-blue,.label-primary,.modal-primary .modal-body{
    background-color:<?php echo $main_color; ?> !important;
    border-radius: 10rem;
    padding-right: .875em;
    padding-left: .875em;
    text-transform: uppercase;
}

.box{
    position:relative;
    border-radius:5px; /* 3 */
    background:#27293d;
    border-radius: 15px;
    margin-bottom:20px;
    width:100%;
}

code {
    background-color: rgba(0, 0, 0, 0);;
    color: <?php echo $main_color; ?>;
    line-height: 1.4;
    font-size: 88%;
}

.bg-purple{
    background-color:<?php echo $main_color; ?> !important
}

.alert-danger {
    color: #ffffff !important;
    background: linear-gradient(87deg,<?php echo $main_color; ?>0,<?php echo $secondary_color; ?> 100%)!important;
    border: 1px solid #f5365c;
}

.checkbox-primary input[type="checkbox"]:checked + label::before {
    background-color: <?php echo $main_color; ?>;
    border-color: <?php echo $main_color; ?>;
}

.radio-primary input[type="radio"] + label::after {
    background-color: <?php echo $main_color; ?>;
}

.radio-primary input[type="radio"]:checked + label::before {
    border-color: <?php echo $secondary_color; ?>;
}

.radio-primary input[type="radio"]:checked + label::after {
    background-color: <?php echo $main_color; ?>;
}

.radio-danger input[type="radio"] + label::after {
    background-color: <?php echo $main_color; ?>;
}

.radio-danger input[type="radio"]:checked + label::before {
    border-color: <?php echo $secondary_color; ?>;
}

.radio-danger input[type="radio"]:checked + label::after {
    background-color: <?php echo $main_color; ?>;
}

.radio-info input[type="radio"] + label::after {
    background-color: <?php echo $main_color; ?>;
}

.radio-info input[type="radio"]:checked + label::before {
    border-color: <?php echo $secondary_color; ?>;
}

.radio-info input[type="radio"]:checked + label::after {
    background-color: <?php echo $main_color; ?>;
}

.radio-warning input[type="radio"] + label::after {
    background-color: <?php echo $main_color; ?>;
}

.radio-warning input[type="radio"]:checked + label::before {
    border-color: <?php echo $secondary_color; ?>;
}

.radio-warning input[type="radio"]:checked + label::after {
    background-color: <?php echo $main_color; ?>;
}

.radio-success input[type="radio"] + label::after {
    background-color: <?php echo $main_color; ?>;
}

.radio-success input[type="radio"]:checked + label::before {
    border-color: <?php echo $secondary_color; ?>;
}

.radio-success input[type="radio"]:checked + label::after {
    background-color: <?php echo $main_color; ?>;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice{
    background-color: <?php echo $secondary_color; ?>;
    border-color: <?php echo $secondary_color; ?>;
    padding:1px 10px;
    color:#fff
}

.select2-container--default.select2-container--focus .select2-selection--multiple,.select2-container--default .select2-search--dropdown .select2-search__field{
    border-color: <?php echo $secondary_color; ?> !important;
    background-color: #272836;
    border-radius: 10px;
}

.select2-container--default .select2-selection--multiple:focus{
    border-color: <?php echo $secondary_color; ?>
}

.select2-container--default.select2-container--open{
    border-color: <?php echo $secondary_color; ?>
}

.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background-color: <?php echo $secondary_color; ?>;
    color:white
}

.form-control:focus{
    border-color: <?php echo $secondary_color; ?>;
    box-shadow:none;
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff;
}

/*  ToolTip  */

.tooltip-inner{
    max-width:200px;
    padding:3px 8px;
    color:#fff;
    text-align:center;
    background-color:<?php echo $main_color; ?>;
    border-radius:4px
}
.tooltip.top .tooltip-arrow{
    bottom:0;
    left:50%;
    margin-left:-5px;
    border-width:5px 5px 0;
    border-top-color:<?php echo $main_color; ?>
}
.tooltip.top-left .tooltip-arrow{
    right:5px;
    bottom:0;
    margin-bottom:-5px;
    border-width:5px 5px 0;
    border-top-color:<?php echo $main_color; ?>
}
.tooltip.top-right .tooltip-arrow{
    bottom:0;
    left:5px;
    margin-bottom:-5px;
    border-width:5px 5px 0;
    border-top-color:<?php echo $main_color; ?>
}
.tooltip.right .tooltip-arrow{
    top:50%;
    left:0;
    margin-top:-5px;
    border-width:5px 5px 5px 0;
    border-right-color:<?php echo $main_color; ?>
}
.tooltip.left .tooltip-arrow{
    top:50%;
    right:0;
    margin-top:-5px;
    border-width:5px 0 5px 5px;
    border-left-color:<?php echo $main_color; ?>
}
.tooltip.bottom .tooltip-arrow{
    top:0;
    left:50%;
    margin-left:-5px;
    border-width:0 5px 5px;
    border-bottom-color:<?php echo $main_color; ?>
}
.tooltip.bottom-left .tooltip-arrow{
    top:0;
    right:5px;
    margin-top:-5px;
    border-width:0 5px 5px;
    border-bottom-color:<?php echo $main_color; ?>
}
.tooltip.bottom-right .tooltip-arrow{
    top:0;
    left:5px;
    margin-top:-5px;
    border-width:0 5px 5px;
    border-bottom-color:<?php echo $main_color; ?>
}

/* -------------------------- Login page --------------------------- */

a:hover {
  text-decoration: none;
  color: <?php echo $main_color; ?>;
}

.container-login100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 20px;
}

.login100-form-btn {
  font-family: 'Poppins', sans-serif
  font-size: 15px;
  line-height: 1.5;
  color: #fff;
  text-transform: uppercase;

  width: 100%;
  height: 50px;
  border-radius: 25px;
  background: #2dce89;
  border-color: #29b277;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 25px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn:hover {
  background: rgba(45, 206, 137, 0.75);
  border-color: #29b277;
}

.container-login100 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background-image: <?php echo $login_background_color; ?>
}

.focus-input100 {
  display: block;
  position: absolute;
  border-radius: 25px;
  bottom: 0;
  left: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
  box-shadow: 0px 0px 0px 0px;
  color: <?php echo $main_color_rgba; ?>, 0.8);
}

.input100:focus + .focus-input100 + .symbol-input100 {
  color: <?php echo $main_color; ?>;
  padding-left: 28px;
  background-color: rgba(0, 0, 0, 0.1);
}

/* ----------------------------------------------------------------- */

.bg-primary{
    background-color:<?php echo $main_color; ?>
}

.text-primary{
    color:<?php echo $main_color; ?>
}

.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{
    z-index:3;
    color:#fff;
    cursor:default;
    background-color:<?php echo $main_color; ?>;
    border-color:<?php echo $main_color; ?>
}

.nav-tabs-custom > .nav-tabs > li:hover {
    border-top-color:<?php echo $main_color_rgba; ?>, 0.75);
}

.card.bg-info, .card .card-header-info .card-icon, .card .card-header-info .card-text, .card .card-header-info:not(.card-header-icon):not(.card-header-text), .card.card-rotate.bg-info .back, .card.card-rotate.bg-info .front {
	background: <?php echo $third_color; ?>;
}

.card .card-header-info .card-icon, .card .card-header-info .card-text, .card .card-header-info:not(.card-header-icon):not(.card-header-text) {
	box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px <?php echo $main_color_rgba; ?>, 0.4)
}

::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}
::-webkit-scrollbar-button {
  width: 0px;
  height: 0px;
}
::-webkit-scrollbar-thumb {
  background: <?php echo $secondary_color; ?>;
  border: 0px none #ffffff;
  border-radius: 50px;
}
::-webkit-scrollbar-thumb:hover {
  background: <?php echo $main_color; ?>;
}
::-webkit-scrollbar-thumb:active {
  background: <?php echo $main_color; ?>;
}
::-webkit-scrollbar-track {
  background: #27293d;
  border: 0px none #ffffff;
  border-radius: 50px;
}
::-webkit-scrollbar-track:hover {
  background: #27293d;
}
::-webkit-scrollbar-track:active {
  background: #27293d;
}
::-webkit-scrollbar-corner {
  background: transparent;
}

.content-wrapper{
    min-height:100%;
    background-color:<?php echo $background_color; ?>;
    z-index:800
}

.sweet-alert .sa-icon.sa-info{
    border-color:<?php echo $main_color; ?>
}
.sweet-alert .sa-icon.sa-info::before{
    content:"";
    position:absolute;
    width:5px;
    height:29px;
    left:50%;
    bottom:17px;
    border-radius:2px;
    margin-left:-2px;
    background-color:<?php echo $main_color; ?>
}
.sweet-alert .sa-icon.sa-info::after{
    content:"";
    position:absolute;
    width:7px;
    height:7px;
    border-radius:50%;
    margin-left:-3px;
    top:19px;
    background-color:<?php echo $main_color; ?>
}

.alert-info {
    color: #ffffff !important;
    background: <?php echo $main_color; ?> !important;
    border: 1px solid <?php echo $main_color; ?>;
}

.sweet-alert button{
    background-color:<?php echo $main_color; ?>;
    color:white;
    border:0;
    box-shadow:none;
    font-size:17px;
    font-weight:500;
    -webkit-border-radius:4px;
    border-radius:5px;
    padding:10px 32px;
    margin:26px 5px 0 5px;
    cursor:pointer
}
.sweet-alert button:focus{
    outline:0;
    box-shadow:0 0 2px <?php echo $main_color_rgba; ?>, 0.5),inset 0 0 0 1px rgba(0,0,0,0.05)
}
.sweet-alert button:hover{
    background-color:<?php echo $main_color_rgba; ?>, 0.4);
}
.sweet-alert button:active{
    background-color:<?php echo $main_color_rgba; ?>, 0.5);
}

.a-check{
    color: <?php echo $main_color; ?>;
}

textarea:focus, input:focus {
  border-color: <?php echo $main_color; ?> !important;
}

.color-fa {
    color: <?php echo $icons_color; ?>;
}

.color-fa:hover {
    color: <?php echo $icons_color; ?>f0;
}

.modal-content{
    position:relative;
    background-color:transparent;
    -webkit-background-clip:padding-box;
    background-clip:padding-box;
    border:1px solid #999;
    border:1px solid rgba(0,0,0,.2);
    border-radius:6px;
    outline:0;
    -webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);
    box-shadow:0 3px 9px rgba(0,0,0,.5);
}
.modal-body{
    position:relative;
    padding:15px;
    background-color: <?php echo $background_color; ?>;
}
.modal-header{
    padding:15px;
    border-bottom-color:#3d3f51;
    background-color: #1e1e2f;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom:1px solid #e5e5e5;
}
.modal-footer{
    padding:15px;
    text-align:right;
    border-top-color:#3d3f51;
    background-color: #1e1e2f;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    border-top:1px solid #e5e5e5;
}
.modal-title{
    margin:0;
    line-height:1.42857143;
    color: #fff;
}

.bg-gray{
    color: #fff;
    background: linear-gradient(87deg,<?php echo $main_color; ?>,<?php echo $secondary_color; ?> 100%) !important;
    border-radius: 20px;
}

input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px #3d3f51 inset !important;
}

input:-webkit-autofill {
    -webkit-text-fill-color: #fff !important;
}

.text-error{
    color: <?php echo $secondary_color; ?> !important;
}

select option {
    color: #fff;
    background-color: #27293d;
}