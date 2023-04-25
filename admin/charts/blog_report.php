<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <title>blogs report</title>
    
  </head>
  <body>

        <?php
            try{

                $sql = "SELECT COUNT(blog_id) AS count, Month(Date) as month 
                        FROM leafy.blog 
                        WHERE DATE_SUB(NOW(), INTERVAL 12 MONTH)
                        GROUP BY month 
                        ORDER BY month";
                
                $result = $pdo->query($sql);

                $blogcount = $result->fetchAll(PDO::FETCH_ASSOC);

                $count = [];
                $month = [];

                foreach ($blogcount as $element) {
                    array_push($count, (int) $element['count']);
                    array_push($month, $element['month']);
                }

                // if($result->rowCount()>0){
                    
                //      $colour = array();
                    
                //     while($row=$result->fetch()){
                //         $colour[]=$row["count"];
                        
                //         echo $row["count"];
                //     }
                //     unset($result);
                // }
                // else{
                //     echo "no records found";
                // }
            }catch(PDOException $e){
                die ("Error: unable to excecute $sql.".$e->getMessage());
            }
            //unset($pdo);

            
        ?>


    
    <!-- <div class="chartCard">
      <div class="chartBox"> -->
        <canvas id="blogchart"></canvas>
        <input oninput="updateblogChart(this)" type="range" id="blogpoints" value="12" min="1" max="12">
      <!-- </div>
    </div> -->
    <script>
    // setup 

        <?php 
            echo "var month = ". json_encode($month) . ";\n";
            echo "var count = ". json_encode($count) . ";\n";
        ?>

    const blogdata = {
      labels: month,
      datasets: [{
        label: 'blogs by month',
        data: count,
        borderWidth: 1
      }]
    };

    // config 
    const blogconfig = {
      type: 'bar',
      data:blogdata,
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
      blogconfig
    );

    function updateblogChart(range)
    {
        console.log(range);
        const rangeValue= month.slice(0,range.value);
        blogchart.config.data.labels=rangeValue;
        blogchart.update()

    };
    // Instantly assign Chart.js version
    const blogchartVersion = document.getElementById('blogchartVersion');
    blogchartVersion.innerText = Chart.version;
    </script>

  </body>
</html>