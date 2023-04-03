window.addEventListener("load",function() {
    var signup-form=this.document.getElementById("signup-form");
    signup-form.addEventListener("submit", function()) {
        varXHR=new XMLHttpRequest();
        var form-data=new FormData (signup-form);

        //on success
        XHR.addEventListener("load", signup-success);

        //on error
        XHR.addEventListener("error",on-success);

        //set up request
        XHR.addEventListener("post","api/signup-submit.php");

        //form data is sent with request
        XHR.addEventListener("form-data");

        document.getElementById("loading").style.display='block';
        
        Event.prevent default();

    });

    var signup-success=function(event) {
        document.getElementById("loading").style.display='none';

        var response=JSON.parse(event.target.responseText);
        if (response.success) {
            alert(response.message);
            window.location.href="index.php"
        }
    }
}
)