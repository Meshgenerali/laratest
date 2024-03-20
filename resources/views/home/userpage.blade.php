<!DOCTYPE html>
<html>
   <head>
           <!-- Basic -->
       <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>laratest</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">


   </head>
   <body>
   
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         <!-- webauthn error messages -->
         <div id="alertContainer" class="fixed inset-x-0 top-0 z-50 flex justify-center mt-4 hidden">

            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                 
                  <span class="block sm:inline" id="alertMessage">Your browser doesn't support WebAuthn.</span>

            </div>
         </div>


         <!-- slider section -->
        @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
        @include('home.why')
      <!-- end why section -->          

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="/">website rights</a><br>
         
         </p>
      </div>

          <!-- Script for passwordless register -->
    <script src="https://cdn.jsdelivr.net/npm/@laragear/webpass@1/dist/webpass.js" defer></script>

<script>
    document.getElementById('passwordless-register-btn').addEventListener('click', async () => {
        try {
            if (Webpass.isUnsupported()) {
                showAlert("Your browser doesn't support WebAuthn.", 3000);
             
                return;
            }

           // Register credentials:
           
            const { credential, success, error } = await Webpass.attest(
                "/webauthn/attest/options", "/webauthn/attest"
            );


            if (success) {
                window.location.replace("{{ url('/redirection') }}");
            }
        } catch (error) {
            // Handle error
            console.error('Error during WebAuthn registration:', error);
            showAlert('Error during WebAuthn registration: ' + error.message, 3000);
        }
    });
</script>


 <!-- script to show webauthn errors -->
 
<script>

function showAlert(message, duration = 3000) {
const alertContainer = document.getElementById('alertContainer');
const alertMessage = document.getElementById('alertMessage');

// Update alert message
alertMessage.textContent = message;

// Show alert
alertContainer.classList.remove('hidden');

    // Hide alert after specified duration
    setTimeout(() => {
    hideAlert();
}, duration);
}

function hideAlert() {
const alertContainer = document.getElementById('alertContainer');

// Hide alert
alertContainer.classList.add('hidden');
}

</script>

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

   </body>
</html>