
    const interval = setInterval(function() {
        
    var elconsole = document.getElementById("console");
    var elfiles = document.getElementById("files");
    var eldatabases = document.getElementById("databases");
    var elschedules = document.getElementById("schedules");
    var elusers = document.getElementById("users");
    var elbackup = document.getElementById("backups");
    var elnetowrk = document.getElementById("network");
    var elstartup = document.getElementById("startup");
    var elsettings = document.getElementById("settings");
    var elmanage = document.getElementById("manage-server");

    if(typeof(elconsole) != 'undefined' && elconsole != null){
        
        document.getElementById("sbConsole").style.display = "";

    } 
    else{

        document.getElementById("sbConsole").style.display = "none";
    }
    if(typeof(elfiles) != 'undefined' && elfiles != null){
        
        document.getElementById("sbFiles").style.display = "";

    } 
    else{

        document.getElementById("sbFiles").style.display = "none";
    }
    if(typeof(eldatabases) != 'undefined' && eldatabases != null){
        
        document.getElementById("sbDatabases").style.display = "";

    } 
    else{

        document.getElementById("sbDatabases").style.display = "none";
    }
    if(typeof(elschedules) != 'undefined' && elschedules != null){
        
        document.getElementById("sbSchedules").style.display = "";

    } 
    else{

        document.getElementById("sbSchedules").style.display = "none";
    }
    if(typeof(elusers) != 'undefined' && elusers != null){
        
        document.getElementById("sbUsers").style.display = "";

    } 
    else{

        document.getElementById("sbUsers").style.display = "none";
    }
    if(typeof(elbackup) != 'undefined' && elbackup != null){
        
        document.getElementById("sbBackups").style.display = "";

    } 
    else{

        document.getElementById("sbBackups").style.display = "none";
    }
    if(typeof(elnetowrk) != 'undefined' && elnetowrk != null){
        
        document.getElementById("sbNetwork").style.display = "";

    } 
    else{

        document.getElementById("sbNetwork").style.display = "none";
    }
    if(typeof(elstartup) != 'undefined' && elstartup != null){
        
        document.getElementById("sbStartup").style.display = "";

    } 
    else{

        document.getElementById("sbStartup").style.display = "none";
    }
    if(typeof(elsettings) != 'undefined' && elsettings != null){
        
        document.getElementById("sbSettings").style.display = "";

    } 
    else{

        document.getElementById("sbSettings").style.display = "none";
    }
    if(typeof(elmanage) != 'undefined' && elmanage != null){
        
        document.getElementById("sbManage").style.display = "";

    } 
    else{

        document.getElementById("sbManage").style.display = "none";
    }

      }, 500);




function myFunction() {
    var x = document.getElementById("serverid").textContent;
    document.getElementById("demo").innerHTML = x;  
  }
  
  
  function openConsole() {
      var button = document.getElementById("console");
      button.click('console')
  }
  function openFiles() {
      var button = document.getElementById("files");
      button.click('files')
  }
  function openDatabases() {
      var button = document.getElementById("databases");
      button.click('databases')
  }
  function openSchedules() {
      var button = document.getElementById("schedules");
      button.click('schedules')
  }
  function openUsers() {
      var button = document.getElementById("users");
      button.click('users')
  }
  function openBackups() {
      var button = document.getElementById("backups");
      button.click('backups')
  }
  function openNetwork() {
      var button = document.getElementById("network");
      button.click('network')
  }
  function openStartup() {
      var button = document.getElementById("startup");
      button.click('startup')
  }
      function openSettings() {
      var button = document.getElementById("settings");
      button.click('settings')
  }
  function Search() {
    var button = document.getElementById("search");
    button.click('search')
}
function openManage() {
    var button = document.getElementById("manage-server");
    button.click('manage-server')
}

function logout() {
    var button = document.getElementById("logout");
    button.click('logout')
}

function closeAlert() {
    var button = document.getElementById("alert").style.display = "none";
}
