<!DOCTYPE html>
<html>
<head>
<style> 
#tablet {
  width: 300px;
  height: 300px;
  border: 1px solid black;
  display: flex;
}

#tablet space {
  -ms-flex: 1;  /* IE 10 */  
  flex: 1;
}
</style>
</head>
<body>

<h1>The flex Property</h1>

<div id="tablet">
  <space style="background-color:coral;">RED</space>
  <space style="background-color:lightblue;">BLUE</space>  
  <space style="background-color:lightgreen;">Green div with more content.</space>
</div>

<p><b>Note:</b> IE11 and newer versions support the flex property. Internet Explorer 10 supports an alternative, the -ms-flex property.</p>

</body>
</html>