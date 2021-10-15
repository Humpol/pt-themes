@section('unix::lg.login.css')
<style>
:root {
    --body-font: "Inter", sans-serif;
    
    
    /* main background-color DEFAULT #1f1d2b */
    --theme-bg: @isset($setting_data['pcolor']){{$setting_data['pcolor']}}@else #1f1d2b @endisset; ;
  
    /* Primary content background-color DEFAULT #0000000d */
    --theme-primary-bg: @isset($setting_data['scolor']){{$setting_data['scolor']}}@else #0000000d @endisset; ;
  
    /* Secondary content background-color DEFAULT #0000001a */
    --theme-secondary-bg: @isset($setting_data['tcolor']){{$setting_data['tcolor']}}@else #0000001a @endisset;;
    
    /* Background of the Buttons in login page DEFAULT #0045ff */
    --theme-button-bg: @isset($setting_data['buttoncolor']){{$setting_data['buttoncolor']}}@else #0045ff @endisset;;
  
    /* side-menu text color DEFAULT #808191 */
    --body-color: @isset($setting_data['textcolor']){{$setting_data['textcolor']}}@else #808191 @endisset;;
  
    /* side-menu background-color DEFAULT #353340 */
    --button-bg: #353340;
    
  }
  
  
  
  
  
  /* CSS RESET */
  * {
       margin: 0;
       padding: 0;
       box-sizing: border-box;
       font-family: "Lato", sans-serif;
  }
   a, .fFWwUW, .fFcOT, .emCXNB, .hmhrLa:not([type="checkbox"]):not([type="radio"]) + .input-help, .kpuLsi{
       text-decoration: none;
       color: var(--body-color) ;
  }
  .hmhrLa:not([type="checkbox"]):not([type="radio"]), .emoCVo {
      color: var(--body-active-color);
  }
   header {
       position: relative;
  }
   header header::after {
       content: "";
       width: 100%;
       height: 1px;
       position: absolute;
       bottom: 0;
       background-color: white;
       z-index: -1;
  }
   header .menu {
       width: 70%;
       margin: 0 auto;
       height: 90px;
       display: flex;
       align-items: center;
       justify-content: space-between;
       position: relative;
       min-height: 70px;
  }
   header .logo a {
       color: white;
       font-size: 2rem;
       font-weight: 700;
  }
   header nav a {
       color: ;
       font-size: 1rem;
       font-weight: 300;
       position: relative;
  }
   header nav a:not(:last-child) {
       margin-right: 20px;
  }
   header nav a::after {
       content: "";
       width: 0%;
       height: 2px;
       background-color: #0045ff;
       position: absolute;
       bottom: -3px;
       left: 0;
       transition: all 0.3s;
  }
   header nav a:hover::after {
       width: 100%;
  }
   .btn {
       padding: 15px 30px;
       background-color: var(--theme-button-bg);
       border-radius: 4px;
       color: #fff;
       font-weight: 700;
       text-transform: uppercase;
       font-size: 0.7rem;
       letter-spacing: 1px;
       cursor: pointer;
       box-shadow: var(--theme-button-bg) 0px 0 22px;
       transition: all 0.4s;
  }
   .btn:hover {
       box-shadow: 0px 11px 26px 0px rgba(19, 36, 51, 0);
  }
   main {
       display: grid;
       grid-template-columns: repeat(2, 1fr);
       height: calc(100vh - 90px);
       width: 70%;
       margin: 0 auto;
  }
   main p {
       color: white;
       margin: 50px 0;
       line-height: 2;
  }
   main .content {
       justify-self: flex-start;
       align-self: center;
  }
   main .content h1 {
       font-size: 4rem;
       color: white;
  }
   main .field-name {
       height: 3.5rem;
       margin-top: 2rem;
       display: flex;
       justify-content: space-between;
       align-items: center;
       border: 1px solid #dfe1e5;
       border-radius: 4px;
  }
   main .field-name input {
       background: none;
       border: none;
       flex: 1;
       height: 100%;
       outline: none;
  }
   main .field-name .btn {
       margin-right: 5px;
  }
   main .field-name input[type="text"] {
       padding-left: 1.3rem;
       color: white;
  }
   main .illustration {
       justify-self: flex-end;
       align-self: center;
  }
   @media only screen and (max-width: 1250px) {
       main, header .menu {
           width: 90%;
      }
  }
   @media only screen and (max-width: 980px) {
       main {
           grid-template-columns: none;
      }
       main .content {
           justify-self: center;
           align-self: center;
           text-align: center;
      }
       main .illustration {
           justify-self: center;
           align-self: flex-start;
           margin-top: 80px;
      }
       main .illustration img {
           width: 100%;
      }
  }
   @media only screen and (max-width: 690px) {
       header .btn {
           display: none;
      }
       header .menu {
           height: 110px;
           flex-direction: column;
           justify-content: space-evenly;
      }
       main {
           margin-top: 50px;
      }
       main .content h1 {
           font-size: 3rem;
      }
       main .illustration {
           justify-self: center;
           align-self: flex-start;
           width: 70%;
           margin-top: 50px;
      }
  }
   @media only screen and (max-width: 370px) {
       main .content h1 {
           font-size: 2.3rem;
      }
       main .field-name {
           display: inline;
           border: none;
      }
       main input[type="text"] {
           padding-left: 1.3rem;
           color: white;
           border: 1px solid #dfe1e5;
           border-radius: 4px;
           width: 100%;
           height: 3.5rem;
      }
       main .btn {
           margin-right: 0;
           margin-top: 20px;
      }
  }
</style>
@endsection