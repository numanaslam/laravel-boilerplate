
$(document).ready(function () {
   // Find the alert with the class 'alert-success'
   var successAlert = $('.alert-success');

   // Check if the alert exists
   if (successAlert.length) {
       // Use setTimeout to close the alert after 3000 milliseconds (3 seconds)
       setTimeout(function() {
        successAlert.fadeOut(1000, function() {
            // Once the fadeOut animation is complete, close the alert
            successAlert.alert('close');
        });
    }, 2500);
   }
   // Find the alert with the class 'alert-success'
   var dangerAlert = $('.alert-danger');

   // Check if the alert exists
   if (dangerAlert.length) {
       // Use setTimeout to close the alert after 3000 milliseconds (3 seconds)
       setTimeout(function() {
        dangerAlert.fadeOut(1000, function() {
            // Once the fadeOut animation is complete, close the alert
            dangerAlert.alert('close');
        });
    }, 2500);
   }

});
