<!DOCTYPE html>
<head>
    <link rel="shortcut icon" href="@isset($setting_data['unixfavicon']){{$setting_data['unixfavicon']}}@else https://cdn.resourcemc.net/zAsa7/rIBOyeRU58.png/raw @endisset">
    <link media="all" type="text/css" rel="stylesheet" href="/themes/unix/css/alerts.css"/>
    <link media="all" type="text/css" rel="stylesheet" href="/themes/unix/css/interchanging.css"/>
    <link media="all" type="text/css" rel="stylesheet" href="/themes/unix/css/core.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @isset($setting_data['enablearc'])@if($setting_data['enablearc'] == 1) @isset($setting_data['arcID'])<script async src="https://arc.io/widget.min.js{{$setting_data['arcID']}}"></script> @endisset  @endif @endisset
    <script src="/themes/unix/js/buttons.js"></script>
    <meta name="theme-color" content="@isset($setting_data['metacolor']){{$setting_data['metacolor']}}@else  #0967d3  @endisset">
    <meta property="og:title" content="@isset($setting_data['metatitle']){{$setting_data['metatitle']}}@else {{ config('app.name', 'Pterodactyl') }}  @endisset">
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:image" content="@isset($setting_data['metaimg']){{$setting_data['metaimg']}}@else https://cdn.resourcemc.net/zAsa7/rIBOyeRU58.png/raw @endisset">
    <meta property="og:description" content="@isset($setting_data['metadesc']){{$setting_data['metadesc']}}@else Manage your server with an easy-to-use Panel @endisset">
</head>
    
    <body style="background: var(--theme-bg);">

        @isset($setting_data['mainbgtype']) @if($setting_data['mainbgtype'] == 1) 
        @endif @endisset @isset($setting_data['mainbgtype']) @if($setting_data['mainbgtype'] == 2) 
        <style>:root{--theme-bg: transparent!important;     --theme-primary-bg: #0000004a!important; --theme-secondary-bg: #0000005e!important; }html{background-image: url('@isset($setting_data['main-bg-img']){{$setting_data['main-bg-img']}}@else https://wallpaperaccess.com/full/2002264.png @endisset');background-size: cover;}</style>
        @else @endif @endisset


        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <div class="container">
            <div class="sidebar">
                <span class="logo"><img onclick="window.location.href='/account'" style="border-radius: 1.2rem;" src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::user()->email)) }}?s=160"></span>
    
                <!-- Website Name -->
                <a class="logo-expand" href="/" style="display: flex; align-items: center; justify-content: center;">
                @isset($setting_data['enablebrandlogo'])@if($setting_data['enablebrandlogo'] == 1)  @else 
                <img onclick="window.location.href='/auth/login'" src="@isset($setting_data['brand-logo']){{$setting_data['brand-logo']}}@else /assets/svgs/pterodactyl.svg @endisset" style="width: 42px; padding: 4px;"> @endif @endisset
                {{ config('app.name', 'Pterodactyl') }}</a>
                <div class="side-wrapper">
                    <div class="side-title">{{ config('unixlang.menu', 'MENU') }} </div>
                    <div class="side-menu">
    
                    <!-- Side-menu Links -->
                    <a class="sidebar-link discover is-active" href="/">
                            <svg viewBox="0 0 24 24" fill="currentColor">
             <path d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z" />
            </svg> {{ config('unixlang.servers', 'Servers') }} 
                        </a>
                        <a class="sidebar-link Console" id="sbConsole" onclick="openConsole()" style="display:none;">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="524.931px" color="#353340" viewBox="0 0 524.931 524.93" style="enable-background:new 0 0 524.931 524.93;" xml:space="preserve"
                                fill="#FFFF">
    <g>
        <g>
            <path d="M226.434,249.503c0-6.995-2.705-13.403-7.846-18.556L61.8,74.165c-5.128-5.141-11.554-7.852-18.568-7.852
                c-7.026,0-13.452,2.717-18.556,7.846l-16.83,16.83c-5.129,5.135-7.84,11.549-7.84,18.538c0,7.026,2.717,13.452,7.846,18.556
                l121.415,121.42L7.84,370.936C2.711,376.071,0,382.491,0,389.486c0,7.02,2.717,13.439,7.846,18.544l16.775,16.774
                c5.116,5.165,11.555,7.895,18.611,7.895c7.044,0,13.47-2.723,18.556-7.846l156.813-156.8
                C223.729,262.913,226.434,256.504,226.434,249.503z"/>
            <path d="M498.866,384.951h-323.02c-7.203,0-13.611,2.583-18.581,7.528c-4.896,4.92-7.484,11.327-7.484,18.531v21.536
                c0,7.252,2.607,13.672,7.491,18.543c4.915,4.927,11.34,7.528,18.574,7.528h323.02c7.239,0,13.659-2.607,18.531-7.497
                c4.927-4.908,7.533-11.334,7.533-18.58v-21.537c0-7.209-2.589-13.616-7.54-18.592
                C512.477,387.534,506.069,384.951,498.866,384.951z"/>
        </g>
    </svg> {{ config('unixlang.console', 'Console') }}
                        </a>
                        <a class="sidebar-link" id="sbFiles" onclick="openFiles()"  style="display:none;">
                            <svg viewBox="0 0 24 24" fill="currentColor">
             <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1535 16.64L14.995 13.77C15.2822 13.47 15.2822 13 14.9851 12.71C14.698 12.42 14.2327 12.42 13.9455 12.71L12.3713 14.31V9.49C12.3713 9.07 12.0446 8.74 11.6386 8.74C11.2327 8.74 10.896 9.07 10.896 9.49V14.31L9.32178 12.71C9.03465 12.42 8.56931 12.42 8.28218 12.71C7.99505 13 7.99505 13.47 8.28218 13.77L11.1139 16.64C11.1832 16.71 11.2624 16.76 11.3515 16.8C11.4406 16.84 11.5396 16.86 11.6386 16.86C11.7376 16.86 11.8267 16.84 11.9158 16.8C12.005 16.76 12.0842 16.71 12.1535 16.64ZM19.3282 9.02561C19.5609 9.02292 19.8143 9.02 20.0446 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5 22 16.0446 22H8.17327C5.58911 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.4901 2 7.96535 2H13.2525C13.5 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.1931 9.01 17.0149 9.02C17.4333 9.02 17.8077 9.02318 18.1346 9.02595C18.3878 9.02809 18.6125 9.03 18.8069 9.03C18.9479 9.03 19.1306 9.02789 19.3282 9.02561ZM19.6045 7.5661C18.7916 7.5691 17.8322 7.5661 17.1421 7.5591C16.047 7.5591 15.145 6.6481 15.145 5.5421V2.9061C15.145 2.4751 15.6629 2.2611 15.9579 2.5721C16.7203 3.37199 17.8873 4.5978 18.8738 5.63395C19.2735 6.05379 19.6436 6.44249 19.945 6.7591C20.2342 7.0621 20.0223 7.5651 19.6045 7.5661Z" />
            </svg> {{ config('unixlang.files', 'Files') }}
                        </a>
                        <a class="sidebar-link Databases" id="sbDatabases" onclick="openDatabases()"  style="display:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 58.201 58.201" style="enable-background:new 0 0 58.201 58.201;" xml:space="preserve">
                                    <path d="M31.707,33.07c-0.87,0.027-1.74,0.042-2.606,0.042c-0.869,0-1.742-0.014-2.614-0.042   c-7.341-0.201-13.191-1.238-17.403-2.717C7.104,29.685,5.409,28.899,4.1,28v7.111v0.5v0.5V37.4c2.846,2.971,12.394,5.711,25,5.711   s22.154-2.74,25-5.711v-1.289v-0.5v-0.5V28c-1.318,0.905-3.028,1.697-5.025,2.367C44.865,31.839,39.027,32.87,31.707,33.07z"/>
                                    <path d="M4.1,14.889V22v0.5V23v1.289c2.638,2.754,11.033,5.31,22.286,5.668c0.115,0.004,0.233,0.005,0.349,0.008   c0.326,0.009,0.651,0.018,0.982,0.023C28.174,29.996,28.635,30,29.1,30s0.926-0.004,1.383-0.011   c0.33-0.005,0.656-0.014,0.982-0.023c0.116-0.003,0.234-0.005,0.349-0.008c11.253-0.359,19.648-2.915,22.286-5.668V23v-0.5V22   v-7.111C49.233,18.232,38.944,20,29.1,20S8.968,18.232,4.1,14.889z"/>
                                    <path d="M53.965,8.542C52.843,4.241,44.215,0,29.1,0C14.023,0,5.404,4.22,4.247,8.51C4.162,8.657,4.1,8.818,4.1,9v0.5v1.806   C6.937,14.267,16.417,17,29.1,17s22.164-2.733,25-5.694V9.5V9C54.1,8.832,54.044,8.681,53.965,8.542z"/>
                                    <path d="M4.1,41v8.201c0,0.162,0.043,0.315,0.117,0.451c1.181,4.895,11.747,8.549,24.883,8.549c13.106,0,23.655-3.639,24.875-8.516   c0.08-0.144,0.125-0.309,0.125-0.484v-8.199c-4.135,2.911-12.655,5.199-25,5.199C16.754,46.201,8.234,43.911,4.1,41z"/>
                                </svg>                        
                                {{ config('unixlang.databases', 'Databases') }}
                        </a>
                        <a class="sidebar-link Schedules" id="sbSchedules" onclick="openSchedules()"  style="display:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFFF" viewBox="0 0 24 24"><defs><style>.cls-1{fill:#FFFF;stroke:#353340;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style></defs><title>22.time</title><g id="_22.time" data-name="22.time"><circle class="cls-1" cx="12" cy="12" r="11"/><polyline class="cls-1" points="12 6 12 12 16 16"/></g></svg>                        
                            {{ config('unixlang.schedules', 'Schedules') }}
                        </a>
                        <a class="sidebar-link" id="sbUsers"  onclick="openUsers()"  style="display:none;">
                            <svg viewBox="0 0 24 24" fill="currentColor">
             <path fill-rule="evenodd" clip-rule="evenodd" d="M16.158 8.233a4.207 4.207 0 01-4.209 4.234 4.207 4.207 0 01-4.21-4.234A4.206 4.206 0 0111.95 4a4.206 4.206 0 014.21 4.233zM11.95 20c-3.431 0-6.36-.544-6.36-2.72 0-2.177 2.91-2.74 6.36-2.74 3.431 0 6.361.544 6.361 2.72S15.399 20 11.949 20zm6.008-11.69a5.765 5.765 0 01-.984 3.24.158.158 0 00.107.245 3.4 3.4 0 00.483.046c1.643.044 3.118-1.02 3.525-2.621.604-2.379-1.168-4.514-3.425-4.514-.245 0-.48.026-.708.073-.031.007-.064.021-.082.05-.022.034-.006.08.016.11a5.807 5.807 0 011.068 3.37zm2.721 5.203c1.104.217 1.83.66 2.131 1.304a1.923 1.923 0 010 1.67c-.46.998-1.944 1.319-2.52 1.402-.12.018-.215-.086-.203-.206.295-2.767-2.048-4.08-2.654-4.381-.026-.014-.032-.034-.03-.047.003-.009.013-.023.033-.026 1.312-.024 2.722.156 3.243.284zM6.438 11.84c.164-.004.325-.019.483-.046a.158.158 0 00.106-.245 5.765 5.765 0 01-.984-3.24c0-1.25.39-2.416 1.068-3.372.022-.03.037-.075.016-.11-.017-.027-.051-.042-.082-.05a3.52 3.52 0 00-.71-.072c-2.255 0-4.027 2.135-3.423 4.514.407 1.6 1.882 2.664 3.525 2.621zm.159 1.414c.003.013-.003.033-.028.047-.607.302-2.95 1.614-2.656 4.38.013.121-.082.224-.201.207-.577-.083-2.06-.404-2.52-1.402a1.917 1.917 0 010-1.67c.3-.644 1.026-1.087 2.13-1.305.522-.127 1.93-.307 3.244-.283.02.003.03.017.03.026z" />
            </svg> {{ config('unixlang.users', 'Users') }}
                        </a>
                        <a class="sidebar-link" id="sbBackups"  onclick="openBackups()"  style="display:none;">
                            <svg viewBox="0 0 24 24" fill="currentColor">
             <path d="M11.23 7.29V3.283c0-.427.34-.782.77-.782.385 0 .711.298.763.677l.007.104v4.01h4.78c2.38 0 4.335 1.949 4.445 4.38l.005.215v5.04c0 2.447-1.887 4.456-4.232 4.569l-.208.005H6.44c-2.38 0-4.326-1.94-4.435-4.379L2 16.905v-5.03c0-2.447 1.878-4.466 4.222-4.58l.208-.004h4.8v6.402l-1.6-1.652a.755.755 0 00-1.09 0 .81.81 0 00-.22.568c0 .157.045.32.14.459l.08.099 2.91 3.015c.14.155.34.237.55.237a.735.735 0 00.465-.166l.075-.071 2.91-3.015c.3-.31.3-.816 0-1.126a.755.755 0 00-1.004-.077l-.086.077-1.59 1.652V7.291h-1.54z" />
            </svg> {{ config('unixlang.backups', 'Backups') }}
                        </a>
    
                        <a class="sidebar-link" id="sbNetwork"  onclick="openNetwork()"  style="display:none;">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M0,0 L24,0 L24,24 L0,24 L0,0 Z M0,0 L24,0 L24,24 L0,24 L0,0 Z" id="Shape" style="fill: transparent;"></path>
                            <path d="M1,9 L3,11 C7.97,6.03 16.03,6.03 21,11 L23,9 C16.93,2.93 7.08,2.93 1,9 Z M9,17 L12,20 L15,17 C13.35,15.34 10.66,15.34 9,17 Z M5,13 L7,15 C9.76,12.24 14.24,12.24 17,15 L19,13 C15.14,9.14 8.87,9.14 5,13 Z" id="ðŸ”¹-Icon-Color" style="fill: #FFFF;"></path>
            </svg> {{ config('unixlang.network', 'Network') }}
                        </a>
    
                        <a class="sidebar-link" id="sbStartup"  onclick="openStartup()"  style="display:none;">
                            <svg viewBox="0 0 24 24" fill="currentColor">
             <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2h9.34c3.4 0 5.32 1.93 5.33 5.33v9.34c0 3.4-1.93 5.33-5.33 5.33H7.33C3.93 22 2 20.07 2 16.67V7.33C2 3.93 3.93 2 7.33 2zm4.72 15.86c.43 0 .79-.32.83-.75V6.92a.815.815 0 00-.38-.79.84.84 0 00-1.28.79v10.19c.05.43.41.75.83.75zm4.6 0c.42 0 .78-.32.83-.75v-3.28a.839.839 0 00-1.28-.79.806.806 0 00-.38.79v3.28c.04.43.4.75.83.75zm-8.43-.75a.827.827 0 01-.83.75c-.43 0-.79-.32-.83-.75V10.2a.84.84 0 01.39-.79c.27-.17.61-.17.88 0s.42.48.39.79v6.91z" />
            </svg> {{ config('unixlang.startup', 'Startup') }}
                        </a>
    
                        <a class="sidebar-link" id="sbSettings"  onclick="openSettings()"  style="display:none;">
                            <?xml version="1.0" ?><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M22.2,14.4L21,13.7c-1.3-0.8-1.3-2.7,0-3.5l1.2-0.7c1-0.6,1.3-1.8,0.7-2.7l-1-1.7c-0.6-1-1.8-1.3-2.7-0.7   L18,5.1c-1.3,0.8-3-0.2-3-1.7V2c0-1.1-0.9-2-2-2h-2C9.9,0,9,0.9,9,2v1.3c0,1.5-1.7,2.5-3,1.7L4.8,4.4c-1-0.6-2.2-0.2-2.7,0.7   l-1,1.7C0.6,7.8,0.9,9,1.8,9.6L3,10.3C4.3,11,4.3,13,3,13.7l-1.2,0.7c-1,0.6-1.3,1.8-0.7,2.7l1,1.7c0.6,1,1.8,1.3,2.7,0.7L6,18.9   c1.3-0.8,3,0.2,3,1.7V22c0,1.1,0.9,2,2,2h2c1.1,0,2-0.9,2-2v-1.3c0-1.5,1.7-2.5,3-1.7l1.2,0.7c1,0.6,2.2,0.2,2.7-0.7l1-1.7   C23.4,16.2,23.1,15,22.2,14.4z M12,16c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4s4,1.8,4,4C16,14.2,14.2,16,12,16z" style="
        fill: #FFFF;
    "/></g></svg> {{ config('unixlang.settings', 'Settings') }}
                        </a>
                        @if(Auth::user()->root_admin)
                        <a class="sidebar-link" id="sbManage"  onclick="openManage()"  style="display:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 26 26" style="enable-background:new 0 0 26 26;" xml:space="preserve">
                                <g>
                                    <path style="fill:#ffffff;" d="M18,17.759v3.366C18,22.159,17.159,23,16.125,23H4.875C3.841,23,3,22.159,3,21.125V9.875   C3,8.841,3.841,8,4.875,8h3.429l3.001-3h-6.43C2.182,5,0,7.182,0,9.875v11.25C0,23.818,2.182,26,4.875,26h11.25   C18.818,26,21,23.818,21,21.125v-6.367L18,17.759z"/>
                                    <g>
                                        <path style="fill:#ffffff ;" d="M22.581,0H12.322c-1.886,0.002-1.755,0.51-0.76,1.504l3.22,3.22l-5.52,5.519    c-1.145,1.144-1.144,2.998,0,4.141l2.41,2.411c1.144,1.141,2.996,1.142,4.14-0.001l5.52-5.52l3.16,3.16    c1.101,1.1,1.507,1.129,1.507-0.757L26,3.419C25.999-0.018,26.024-0.001,22.581,0z"/>
                                    </g>
                                </svg> {{ config('unixlang.manage', 'Manage') }}
                        </a>
                        @endif
    
    
                    </div>
                </div>
                <div class="side-wrapper">
                    <div class="side-title">{{ config('unixlang.user_settings', 'USER SETTINGS') }} </div>
                    <div class="side-menu">
    
                      @if(Auth::user()->root_admin)
                        <a class="sidebar-link" href="/admin">
                            <?xml version="1.0" encoding="iso-8859-1"?>
                            <svg version="1.1" id="Layer_1_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cogs" class="svg-inline--fa fa-cogs fa-w-20 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path style="
      fill: #FFFF;" fill="currentColor" d="M512.1 191l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0L552 6.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zm-10.5-58.8c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.7-82.4 14.3-52.8 52.8zM386.3 286.1l33.7 16.8c10.1 5.8 14.5 18.1 10.5 29.1-8.9 24.2-26.4 46.4-42.6 65.8-7.4 8.9-20.2 11.1-30.3 5.3l-29.1-16.8c-16 13.7-34.6 24.6-54.9 31.7v33.6c0 11.6-8.3 21.6-19.7 23.6-24.6 4.2-50.4 4.4-75.9 0-11.5-2-20-11.9-20-23.6V418c-20.3-7.2-38.9-18-54.9-31.7L74 403c-10 5.8-22.9 3.6-30.3-5.3-16.2-19.4-33.3-41.6-42.2-65.7-4-10.9.4-23.2 10.5-29.1l33.3-16.8c-3.9-20.9-3.9-42.4 0-63.4L12 205.8c-10.1-5.8-14.6-18.1-10.5-29 8.9-24.2 26-46.4 42.2-65.8 7.4-8.9 20.2-11.1 30.3-5.3l29.1 16.8c16-13.7 34.6-24.6 54.9-31.7V57.1c0-11.5 8.2-21.5 19.6-23.5 24.6-4.2 50.5-4.4 76-.1 11.5 2 20 11.9 20 23.6v33.6c20.3 7.2 38.9 18 54.9 31.7l29.1-16.8c10-5.8 22.9-3.6 30.3 5.3 16.2 19.4 33.2 41.6 42.1 65.8 4 10.9.1 23.2-10 29.1l-33.7 16.8c3.9 21 3.9 42.5 0 63.5zm-117.6 21.1c59.2-77-28.7-164.9-105.7-105.7-59.2 77 28.7 164.9 105.7 105.7zm243.4 182.7l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0l8.2-14.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zM501.6 431c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.6-82.4 14.3-52.8 52.8z"></path></svg>
    </svg> {{ config('unixlang.admin', 'Admin') }} 
                        </a>
    
                        <a class="sidebar-link" href="/admin/unix">
                          <?xml version="1.0" encoding="iso-8859-1"?>
                          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                       <g>
                         <g>
                           <path d="M192,0C85.973,0,0,85.973,0,192s85.973,192,192,192c17.707,0,32-14.293,32-32c0-8.32-3.093-15.787-8.32-21.44
                             c-5.013-5.653-8-13.013-8-21.227c0-17.707,14.293-32,32-32h37.653c58.88,0,106.667-47.787,106.667-106.667
                             C384,76.373,298.027,0,192,0z M74.667,192c-17.707,0-32-14.293-32-32s14.293-32,32-32s32,14.293,32,32S92.373,192,74.667,192z
                              M138.667,106.667c-17.707,0-32-14.293-32-32s14.293-32,32-32s32,14.293,32,32S156.373,106.667,138.667,106.667z M245.333,106.667
                             c-17.707,0-32-14.293-32-32s14.293-32,32-32s32,14.293,32,32S263.04,106.667,245.333,106.667z M309.333,192
                             c-17.707,0-32-14.293-32-32s14.293-32,32-32s32,14.293,32,32S327.04,192,309.333,192z"/>
                         </g>
                       </g>
    </svg> {{ config('unixlang.configure', 'Configure') }} 
                      </a>
                      @endif
    
                        <a class="sidebar-link" href="/account">
                            <?xml version="1.0" encoding="iso-8859-1"?>
                            <svg version="1.1" id="Layer_1_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
    <path d="M12,9H8H4c-2.209,0-4,1.791-4,4v3h16v-3C16,10.791,14.209,9,12,9z" style="fill: #FFFF;"/>
    <path d="M12,5V4c0-2.209-1.791-4-4-4S4,1.791,4,4v1c0,2.209,1.791,4,4,4S12,7.209,12,5z" style="
        fill: #FFFF;"/>
    </svg>  {{ config('unixlang.account', 'Account') }} 
                        </a>

                        <a class="sidebar-link" href="/account/api">
                            <?xml version="1.0" encoding="iso-8859-1"?>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="94.504px" viewBox="0 0 94.504 94.504" style="enable-background:new 0 0 94.504 94.504;" xml:space="preserve">
                                        <path d="M93.918,45.833L69.799,21.714c-0.75-0.75-2.077-0.75-2.827,0l-5.229,5.229c-0.781,0.781-0.781,2.047,0,2.828    l17.477,17.475L61.744,64.724c-0.781,0.781-0.781,2.047,0,2.828l5.229,5.229c0.375,0.375,0.884,0.587,1.414,0.587    c0.529,0,1.039-0.212,1.414-0.587l24.117-24.118C94.699,47.881,94.699,46.614,93.918,45.833z"/>
                                        <path d="M32.759,64.724L15.285,47.248l17.477-17.475c0.375-0.375,0.586-0.883,0.586-1.414c0-0.53-0.21-1.039-0.586-1.414    l-5.229-5.229c-0.375-0.375-0.884-0.586-1.414-0.586c-0.53,0-1.039,0.211-1.414,0.586L0.585,45.833    c-0.781,0.781-0.781,2.047,0,2.829L24.704,72.78c0.375,0.375,0.884,0.587,1.414,0.587c0.53,0,1.039-0.212,1.414-0.587l5.229-5.229    C33.542,66.771,33.542,65.505,32.759,64.724z"/>
                                        <path d="M60.967,13.6c-0.254-0.466-0.682-0.812-1.19-0.962l-4.239-1.251c-1.058-0.314-2.172,0.293-2.484,1.352L33.375,79.382    c-0.15,0.509-0.092,1.056,0.161,1.521c0.253,0.467,0.682,0.812,1.19,0.963l4.239,1.251c0.189,0.056,0.38,0.083,0.567,0.083    c0.863,0,1.66-0.564,1.917-1.435l19.679-66.644C61.278,14.612,61.221,14.065,60.967,13.6z"/>
                                </svg>
                             {{ config('unixlang.account_api', 'Account API') }} 
                        </a>

                        <a class="sidebar-link Logout" onclick="logout()">
                            <svg viewBox="0 0 24 24" fill="currentColor">
             <path fill-rule="evenodd" clip-rule="evenodd" d="M10.835 12.007l.002.354c.012 1.404.096 2.657.242 3.451 0 .015.16.802.261 1.064.16.38.447.701.809.905a2 2 0 00.91.219c.249-.012.66-.137.954-.242l.244-.094c1.617-.642 4.707-2.74 5.891-4.024l.087-.09.39-.42c.245-.322.375-.715.375-1.138 0-.379-.116-.758-.347-1.064-.07-.099-.18-.226-.28-.334l-.379-.397c-1.305-1.321-4.129-3.175-5.593-3.79 0-.013-.91-.393-1.343-.407h-.057c-.665 0-1.286.379-1.603.991-.087.168-.17.496-.233.784l-.114.544c-.13.874-.216 2.216-.216 3.688zm-6.332-1.525C3.673 10.482 3 11.162 3 12a1.51 1.51 0 001.503 1.518l3.7-.328c.65 0 1.179-.532 1.179-1.19 0-.658-.528-1.191-1.18-1.191l-3.699-.327z" />
            </svg> {{ config('unixlang.logout', 'Logout') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="header">
                    <div class="search-bar" onclick="Search()">
                        <input type="text" placeholder="Search">
                    </div>
                    <div class="user-settings">
                        <img class="user-img" src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::user()->email)) }}?s=160" alt="">
                        <div class="dropdown">
                        <div class="user-name" style="cursor: pointer;" onclick="window.location.href='/account'">
                            @isset($setting_data['viewname'])@if($setting_data['viewname'] == 1) @if(Auth::user()->root_admin) {{ Auth::user()->name_first }} {{ Auth::user()->name_last }} @endif @else {{ Auth::user()->name_first }} {{ Auth::user()->name_last }}  @endif
                        @endisset<i class="fas fa-caret-down"></i>
                            </div>
                        <div class="dropdown-content">
                        <a href="/account"><i class="fas fa-user fa-xm"></i> Account</a>
                        @if(Auth::user()->root_admin) <a href="/admin"><i class="fas fa-user-cog fa-xm"></i> Admin</a>@endif
                        <a onclick="logout()"><i class="fas fa-sign-out-alt fa-xm"></i> Logout</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="main-container">
                    @isset($setting_data['alertenabled'])@if($setting_data['alertenabled'] == 1)
                    <div id="alert" class="alert alert-info alert-white rounded" style="background: @isset($setting_data['abackgroundcolor']){{$setting_data['abackgroundcolor']}}@else white @endisset;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="closeAlert()" >@isset($setting_data['alertclosable'])@if($setting_data['alertclosable'] == 1) x @else  @endif
                            @endisset</button>
                        <div class="icon" style="background: @isset($setting_data['alertcolor']){{$setting_data['alertcolor']}}@else #4d90fd @endisset;"><i class="fa fa-info-circle"></i></div>
                        <strong>@isset($setting_data['atitle']){{$setting_data['atitle']}}@else Info @endisset</strong> 
                        <br>@isset($setting_data['amessage']){{$setting_data['amessage']}}@else  @endisset
                    </div>
    
                    @endif @endisset
                    
    @extends('templates/wrapper', [
        'css' => ['body' => 'bg-neutral-800'],
    ])
    
    @section('container')
        <div id="modal-portal"></div>
        
        <div id="app"></div>
        
    @endsection
    
    </body>
    
    <script>
        $(function() {
            $(".sidebar-link").click(function() {
                $(".sidebar-link").removeClass("is-active");
                $(this).addClass("is-active");
            });
        });
    
        $(window)
            .resize(function() {
                if ($(window).width() > 1090) {
                    $(".sidebar").removeClass("collapse");
                } else {
                    $(".sidebar").addClass("collapse");
                }
            })
            .resize();
    
        const allVideos = document.querySelectorAll(".video");
    
        allVideos.forEach((v) => {
            v.addEventListener("mouseover", () => {
                const video = v.querySelector("video");
                video.play();
            });
            v.addEventListener("mouseleave", () => {
                const video = v.querySelector("video");
                video.pause();
            });
        });
    
        $(function() {
            $(".logo, .logo-expand, .discover").on("click", function(e) {
                $(".main-container").removeClass("show");
                $(".main-container").scrollTop(0);
            });
            $(".trending, .video").on("click", function(e) {
                $(".main-container").addClass("show");
                $(".main-container").scrollTop(0);
                $(".sidebar-link").removeClass("is-active");
                $(".trending").addClass("is-active");
            });
    
            $(".video").click(function() {
                var source = $(this).find("source").attr("src");
                var title = $(this).find(".video-name").text();
                var person = $(this).find(".video-by").text();
                var img = $(this).find(".author-img").attr("src");
                $(".video-stream video").stop();
                $(".video-stream source").attr("src", source);
                $(".video-stream video").load();
                $(".video-p-title").text(title);
                $(".video-p-name").text(person);
                $(".video-detail .author-img").attr("src", img);
            });
        });
    
    </script>
    
    <style>
        :root {
      --body-font: "Inter", sans-serif;
      
      
      /* main background-color DEFAULT #1f1d2b */
      --theme-bg: @isset($setting_data['pcolor']){{$setting_data['pcolor']}}@else #1f1d2b @endisset; ;
    
      /* Primary content background-color DEFAULT #0000000d */
      --theme-primary-bg: @isset($setting_data['scolor']){{$setting_data['scolor']}}@else #0000000d @endisset; ;
    
      /* Secondary content background-color DEFAULT #0000001a */
      --theme-secondary-bg: @isset($setting_data['tcolor']){{$setting_data['tcolor']}}@else #0000001a @endisset; ;
    
    
      /* side-menu text color DEFAULT #808191 */
      --body-color: @isset($setting_data['textcolor']){{$setting_data['textcolor']}}@else #808191 @endisset; ;
    
      /* side-menu text color DEFAULT #808191 */
      --body-active-color: @isset($setting_data['activetextcolor']){{$setting_data['activetextcolor']}}@else white @endisset;;
    
      /* side-menu background-color DEFAULT #353340 */
      --button-bg: @isset($setting_data['sb-links-bg']){{$setting_data['sb-links-bg']}}@else #353340  @endisset;;

      /* side-menu background-color DEFAULT #353340 */
      --theme-button-bg: @isset($setting_data['buttoncolor']){{$setting_data['buttoncolor']}}@else #0967d3 @endisset;;
      
      /* Border color in side-menu*/
      --border-color: rgba(128, 129, 145, 0.24);
      
      
      --video-bg: #252936;
      --delay: 0s;
    }
    
          .hTuBzu {
            flex: 0 0 auto !important;
            position: unset;
            padding-left: 1rem !important;
            align-self: center !important;
            z-index: 30 !important;
            cursor: pointer !important;
            }
                    /**<!---- Button CSS  --->**/
        
                    .lhjIFG, .fYgqLk, .hPQzca {
              background: @isset($setting_data['buttoncolor']){{$setting_data['buttoncolor']}}@else #0045ff @endisset;;
              border-color:  @isset($setting_data['buttoncolor']){{$setting_data['buttoncolor']}}@else #0045ff @endisset;;
            }
    
            p, .bVAiVP, .hSKhGC, .ka-difk, .jdiuFH  , .fNmetC , .hcJQtJ  , .lOfYt , .kAWZHe  , .gxlLzB ,.kmjiH, .epSLdr  {
      color: var(--body-color) !important;
    }
    
    .ebtnLL #logo > a, .cBxTVo, .sidebar .logo-expand, .sidebar-link:hover, .sidebar-link.is-active, .eBRJeB,.cKOMAz , .kmjiH, .dHRxAp{
        color: var(--body-active-color) !important;
    }
    
    body {
      font-family: var(--body-font);
      color: var(--body-color);
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      background-blend-mode: color-dodge;
      background-color: rgba(18, 21, 39, 0.86);
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }
    body:before {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      opacity: 0.4;
      content: "";
    }
    ::-webkit-scrollbar {
      width: 6px;
      border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
      background-color: rgba(21, 20, 26, 0.63);
      border-radius: 10px;
    }
    
    .sidebar-link:hover:nth-child(2n + 1) svg, .sidebar-link.is-active:nth-child(2n + 1) svg {
      background: @isset($setting_data['sbactivecolor1']){{$setting_data['sbactivecolor1']}}@else #ff7551  @endisset;
    }
    .sidebar-link:hover:nth-child(2n) svg, .sidebar-link.is-active:nth-child(2n) svg {
      background: @isset($setting_data['sbactivecolor2']){{$setting_data['sbactivecolor2']}}@else #32a7e2  @endisset;
    }
    .sidebar-link:hover:nth-child(2n + 3) svg, .sidebar-link.is-active:nth-child(2n + 3) svg {
      background: @isset($setting_data['sbactivecolor3']){{$setting_data['sbactivecolor3']}}@else #6c5ecf  @endisset;
    }
    
    @isset($setting_data['topnavbar'])@if($setting_data['topnavbar'] == 1) 
    .cWFcHc > div {
        display: none;
    }
    @else @endif @endisset
    
    @isset($setting_data['topbar'])@if($setting_data['topbar'] == 1) 
    .ebtnLL > div {
        display: none;
    }
    
    @else @endif @endisset

    @isset($setting_data['sbsmalldevices'])@if($setting_data['sbsmalldevices'] == 1) 
    @else 
    @media screen and (max-width: 475px) {
        .sidebar.collapse {
            display: flex;
        }
    }  @endif
	@endisset
    
    @isset($setting_data['custom_css']){{$setting_data['custom_css']}}@else    @endisset
    
    </style>


    
    
    @isset($setting_data['widgetbot'])@if($setting_data['widgetbot'] == 1) 
    
    <script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>
      new Crate({
        server: '@isset($setting_data['discordID']){{$setting_data['discordID']}}@else 760945720470667294 @endisset',
        channel: '@isset($setting_data['discordID']){{$setting_data['channelID']}}@else 760945722559299668 @endisset'
      })
    </script>
    
    @else 
    
    @endif
    @endisset

    @isset($setting_data['disable_sidebar'])@if($setting_data['disable_sidebar'] == 1) 
    @else
    
    <style>
    .sidebar {display: none; !important}
    </style>

    @endif @endisset