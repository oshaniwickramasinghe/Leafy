<?php 
    $username= "root";
    $password= "";
    $database = "leafy";

    try{
        $pdo = new PDO("mysql:host=localhost;database=$database",$username,$password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "connection successfull";

        $sql2 = "SELECT COUNT(blog_id) AS count1, Month(Date) as month FROM leafy.blog GROUP BY month ORDER BY COUNT(blog_id)";
        $result2 = $pdo->query($sql2);
        $blogcount = $result2->fetchAll(PDO::FETCH_ASSOC);
        $count1 = [];
        $month = [];
        foreach ($blogcount as $element) {
            array_push($count1, (int) $element['count1']);
            array_push($month, $element['month']);
        }
    }catch(PDOException $e){
        die("Error: not connected.".$e->getMessage());
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Getting Started with Chart JS with www.chartjs3.com</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: rgba(54, 162, 235, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
      }
    </style>
  </head>
  <body>

        <?php
            // try{

            //     //$sql = "SELECT * FROM leafy.user_count ";
            //     $sql2 = "SELECT COUNT(blog_id) AS count1, Month(Date) as month FROM leafy.blog GROUP BY month ORDER BY COUNT(blog_id)";
                
            //     $result2 = $pdo->query($sql2);

            //     $blogcount = $result2->fetchAll(PDO::FETCH_ASSOC);

            //     $count1 = [];
            //     $month = [];

            //     foreach ($blogcount as $element) {
            //         array_push($count1, (int) $element['count1']);
            //         array_push($month, $element['month']);
            //     }

            // }catch(PDOException $e){
            //     die ("Error: unable to excecute $sql2.".$e->getMessage());
            // }
            // unset($pdo);

            
        ?>


    
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="blogchart"></canvas>
        <input oninput="updateBlogChart(this)" type="range" id="pointsblog" value="12" min="1" max="12">
      </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script>
    // setup 

        <?php 
            echo "var month = ". json_encode($month) . ";\n";
            echo "var count1 = ". json_encode($count1) . ";\n";
        ?>

    const datablog = {
      labels: month,
      datasets: [{
        label: 'blogs by month',
        data: count1,
        borderWidth: 1
      }]
    };

    // config 
    const configblog = {
      type: 'bar',
      data:datablog,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const blogchart = new Chart(
      document.getElementById('blogchart'),
      configblog
    );

    function updateBlogChart(range)
    {
        console.log(range);
        const rangeValue= month.slice(0,range.value);
        blogchart.config.data.labels=rangeValue;
        blogchart.update()

    };
    // Instantly assign Chart.js version
    const chartVersion = document.getElementById('chartVersion');
    chartVersion.innerText = Chart.version;
    </script>

  </body>
</html>