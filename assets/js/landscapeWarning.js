var isMobile = {
    Android: function() {
      return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
      return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
      return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
      return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    },
    any: function() {
      return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
  };

var turnDeviceNotification = document.getElementById("turnDeviceNotification");

if (isMobile.any()) {
    window.addEventListener("orientationchange", function(event){
    switch(window.orientation) 
    {  
        case 0:
        turnDeviceNotification.style.display = 'none';
        case 180:
        turnDeviceNotification.style.display = 'none';
        case -90:
        turnDeviceNotification.style.display = 'block';
        case 90:
        turnDeviceNotification.style.display = 'block';
        break; 
    }
    });
    
    var currentOrientation = function() {  
    if(screen.availHeight < screen.availWidth){
        turnDeviceNotification.style.display = 'block';
    } else {
        turnDeviceNotification.style.display = 'none';
    }
    }
    // Set orientation on initiliasation
    currentOrientation();
    // Reset orientation each time window is resized. Keyboard opening, or change in orientation triggers this.
    window.addEventListener('resize', currentOrientation);
}

window.addEventListener("orientationchange", function(event){
    if (!isMobile.any()) 
    {
        turnDeviceNotification.style.display = 'none';
    }
});
window.addEventListener('resize', function(event){
    if (!isMobile.any()) 
    {
        turnDeviceNotification.style.display = 'none';
    }
});