<body id="body-pd">
    <header>
        <link rel="shortcut icon" href="https://cdn.resourcemc.net/zAsa7/rIBOyeRU58.png/raw">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="/themes/carbon/css/style.min.css" type="text/css">
        <link rel="stylesheet" href="/themes/carbon/css/interchanging.css" type="text/css">
        <link rel="stylesheet" href="/themes/carbon/css/core.css" type="text/css">
        <link media="all" type="text/css" rel="stylesheet" href="/themes/carbon/css/alerts.css"/>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/themes/carbon/js/buttons.js"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
        <meta name="theme-color" content="#0967d3">
        <meta property="og:title" content="{{ config('app.name', 'Pterodactyl') }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="/">
        <meta property="og:image" content="https://cdn.resourcemc.net/zAsa7/rIBOyeRU58.png/raw">
        <meta property="og:description" content="Manage your server with an easy-to-use Panel">
        
      </header>

        <div class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle" style="margin-right: 15px;"></i> </div>
        <form onClick="Search()" class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>

        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown" style="width: auto;">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::user()->email)) }}?s=160" alt="">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">
                    {{ Auth::user()->name_first }} {{ Auth::user()->name_last }}
                    </span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right" style="background: var(--second-background);">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0"><strong style="color: var(--text-color);">{{ Auth::user()->email }}</strong></h6>
                </div>
                <a href="/account" class="dropdown-item">
                <i class='bx bx-user' ></i>
                  <span>Account</span>
                </a>
                <a href="/account/api" class="dropdown-item">
                <i class='bx bx-code-alt' ></i>
                  <span>Account API</span>
                </a>
                @if(Auth::user()->root_admin)
                <a href="/admin" class="dropdown-item">
                 <i class='bx bx-key'></i>
                  <span>Admin Area</span>
                </a>
                @endif
                <div class="dropdown-divider"></div>
                <a onClick="logout()" class="dropdown-item">
                <i class='bx bx-power-off'></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>

          </div>
    
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="/" class="nav_logo"> <i class='bx bx-grid-alt nav_logo-icon'></i> <span class="nav_logo-name">{{ config('app.name', 'Pterodactyl') }}</span> </a>
                <div class="nav_list" style="overflow: auto; height: 90%;"> 
                    <div class="dropdown-divider"></div>
                    <a href="/" class="nav_link active"> <i class='bx bx-server nav_icon sidebar-card'></i> <span class="nav_name">Servers</span> </a> 
                    <a onClick="openConsole()" class="nav_link" id="sbConsole" style="display: none;"> <i class='bx bx-terminal nav_icon sidebar-card'></i> <span class="nav_name">Console</span> </a>
                    <a onClick="openFiles()" class="nav_link" id="sbFiles" style="display: none;"> <i class='bx bx-folder nav_icon sidebar-card'></i> <span class="nav_name">Files</span> </a>
                    <a onClick="openDatabases()" class="nav_link" id="sbDatabases" style="display: none;"> <i class='bx bx-data nav_icon sidebar-card' ></i> <span class="nav_name">Databases</span> </a> 
                    <a onClick="openSchedules()" class="nav_link" id="sbSchedules" style="display: none;"> <i class='bx bx-time-five nav_icon sidebar-card' ></i> <span class="nav_name">Schedules</span> </a>  
                    <a onClick="openUsers()" class="nav_link" id="sbUsers" style="display: none;"> <i class='bx bx-user nav_icon sidebar-card nav_icon sidebar-card'></i> <span class="nav_name">Users</span> </a> 
                    <a onClick="openBackups()" class="nav_link" id="sbBackups" style="display: none;"> <i class='bx bx-cloud-download nav_icon sidebar-card'></i> <span class="nav_name">Backups</span> </a> 
                    <a onClick="openNetwork()" class="nav_link" id="sbNetwork"  style="display: none;"> <i class='bx bx-network-chart nav_icon sidebar-card'></i> <span class="nav_name">Network</span> </a> 
                    <a onClick="openStartup()" class="nav_link" id="sbStartup" style="display: none;"> <i class='bx bx-slider nav_icon sidebar-card'></i>  <span class="nav_name">Startup</span> </a> 
                    <a onClick="openSettings()" class="nav_link" id="sbSettings" style="display: none;"> <i class='bx bx-briefcase-alt-2 nav_icon sidebar-card' ></i> <span class="nav_name">Settings</span> </a> 
                    @if(Auth::user()->root_admin)
                    <a onClick="openManage()" class="nav_link" id="sbManage" style="display: none;"> <i class='bx bx-wrench nav_icon sidebar-card' ></i> <span class="nav_name">Manage</span> </a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a href="/account" class="nav_link"> <i class='bx bx-user nav_icon sidebar-card' ></i> <span class="nav_name">Account</span> </a>
                    @if(Auth::user()->root_admin)
                   <a href="/admin" class="nav_link"> <i class='bx bx-key nav_icon sidebar-card' ></i> <span class="nav_name">Admin</span> </a>
                    @endif
                    <a onClick="logout()" class="nav_link"> <i class='bx bx-power-off nav_icon sidebar-card' ></i> <span class="nav_name">Logout</span> </a>
                </div>
            </div>
        </nav>
    </div>
    <!--Container Main start-->
    
    <div id="alert" class="alert alert-info alert-white rounded" style="border: none; top: 12px; background: white;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="closeAlert()"> x </button>
        <div class="icon" style="background: var(--first-color);"><i class="bx bx-info-circle"></i></div>
        <strong class="card-text"> {{ config('carbon.alert') }}  </strong> 
        <br><a class="card-text"> {{ config('carbon.alert_message') }}</a>               
    </div>


    <button type="button" style="display: none;background-color: var(--first-color);width: 100%; margin-bottom: 10px; border-color: transparent; text-transform: uppercase;top: 7px;" id="output-server-status" class="btn btn-primary btn-lg btn-block">Connecting...</button>


  </section>
</div>

<div class="grey-bg container-fluid">
    @extends('templates/wrapper', [
    'css' => ['body' => 'bg-neutral-800'],
    ])

    @section('container')
    <div id="modal-portal"></div>
    <div id="app"></div>
    @endsection

    <!--Container Main end-->
</div>
<style>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

@if(config('carbon.darkmode') == "enabled")

:root {
    --header-height: 3rem;
    --nav-width: 75px;
    --first-color: #4723D9;
    --first-color-light: #ffffff;
    --main-background: #303030;
    --second-background: #262626;
    --text-color: #ffffff;
    --active-text-color:  #ffffff;
    --white-hover: #f4f5f7;
    --sidebar-bg-color: #262626;
    --sidebar-icon-color: #ffffff;
    --white-color: #ffffff;
    --body-font: 'Nunito', sans-serif;
    --normal-font-size: 1rem;
    --z-fixed: 100;
}
@else
:root {
    --header-height: 3rem;
    --nav-width: 68px;
    --first-color: #4723D9;
    --first-color-light: #172b4d;

    --main-background: #f8f9fe;
    --second-background: #FFFF;
    --text-color: #172b4d;
    --active-text-color:#172b4d;
    --white-hover: #f4f5f7;
    --sidebar-bg-color: #FFFF;
    --sidebar-icon-color: #4723D9;

    --white-color: #ffffff;
    --body-font: 'Nunito', sans-serif;
    --normal-font-size: 1rem;
    --z-fixed: 100;
}
@endif

@media (min-width: 640px){
.cZTZeB {
    margin-top: 0.5rem !important;
    margin-bottom: 2.5rem;
}}


@media screen and (min-width: 75em){
.evldyg {
    margin-left: 0  !important;
    margin-right: 0  !important;
}}

@media (min-width: 1024px){
.iyAtmz {
    width: 100% !important;
    margin-top: 0px;
    padding-left: 0.6rem !important;
}}

.evldyg {
    max-width: 99.6% !important;
}

.ebtnLL, .cWFcHc, .cgXlJi, .RkKIC  {
    display: none;
}

.piqbQ {
  width: 100%;
  display: flex;
  justify-content: center;
  padding-bottom: 10px;
}

.powerbuttons-div {
  background: transparent;
  box-shadow: none;
}



.grusjm {
  padding: 0px !important;
}

.chartjs-render-monitor {
  height: 265px !important;
  width: 100% !important;
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready


var togglebutton = document.getElementById("header-toggle");
togglebutton.click('header-toggle');



var selectConsole = document.getElementById("sbConsole");
selectConsole.click('sbConsole');
});




</script>

