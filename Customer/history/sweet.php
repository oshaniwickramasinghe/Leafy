
<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.5/sweetalert2.all.min.js" integrity="sha512-2JsZvEefv9GpLmJNnSW3w/hYlXEdvCCfDc+Rv7ExMFHV9JNlJ2jaM+uVVlCI1MAQMkUG8K83LhsHYx1Fr2+MuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
</head>
<body>
  <script>
    // Retrieve the value from localStorage
    const showAlert = localStorage.getItem('showAlert');

    if (showAlert === 'true') {
      // Display the SweetAlert2 alert
      Swal.fire({
       
        text: 'Item already added',
       
        showConfirmButton: true
      });

      // Clear the value from localStorage
      localStorage.removeItem('showAlert');
    }
  </script>
</body>
</html>
