<!DOCTYPE html>
<html>
<head>
   <title>Generate PDF using jsPDF Library</title>
      <!--JSPDF CDN-->
      <script src= "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js">
      </script>
   <style>
      .container {
         position: fixed;
         top: 20%;
         left: 28%;
         border-radius: 7px;
      }
      #generatePdf {
         box-sizing: content-box;
         width: 300px;
         height: 100px;
         padding: 30px;
         border: 1px solid black;
         font-style: sans-serif;
         background-color: #f0f0f0;
      }
      #pdfButton {
         background-color: #4caf50;
         border-radius: 5px;
         margin-left: 300px;
         margin-bottom: 5px;
         color: white;
      }
      h2 {
         text-align: center;
         color: #24650b;
      }
   </style>
</head>
<body>
   <div class="container">
      <button id="pdfButton">Generate PDF</button>
      <div id="generatePdf">
        
         <h2>Welcome to Tutorials Point</h2>
         <ul>
            <li>
               <h4> The following content will be downloaded as PDF.</h4>
            </li>
            <li>
               <h4>About Company</h4>
               <p>Tutorials Point originated from the idea that there exists a class of readers who respond better to online content and prefer to learn new skills at their own pace from the comforts of their drawing rooms.</p>
               <p>The journey commenced with a single tutorial on HTML in 2006 and elated by the response it generated, we worked our way to adding fresh tutorials to our repository which now proudly flaunts a wealth of tutorials and allied articles on topics ranging from programming languages to web designing to academics and much more.</p>
            </li>
         </ul>


      </div>
   </div>
   <script>
      var button = document.getElementById("pdfButton");
      button.addEventListener("click", function () {
         var doc = new jsPDF("p", "mm", [300, 300]);
         var makePDF = document.querySelector("#generatePdf");
         // fromHTML Method
         doc.fromHTML(makePDF);
         doc.save("output.pdf");
      });
   </script>
</body>
</html>