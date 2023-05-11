<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <title>courses report</title>
    
  </head>
  <body>

        <?php
            try{

                $sql = "SELECT COUNT(course_id) AS count, Month(date) as month 
                FROM leafy.course 
                WHERE DATE_SUB(NOW(), INTERVAL 12 MONTH)
                GROUP BY month 
                ORDER BY month";
                
                $result = $pdo->query($sql);

                $coursecount = $result->fetchAll(PDO::FETCH_ASSOC);

                $count = [];
                $month = [];

                foreach ($coursecount as $element) {
                    array_push($count, (int) $element['count']);
                    array_push($month, $element['month']);
                }

            }catch(PDOException $e){
                die ("Error: unable to excecute $sql.".$e->getMessage());
            }
            //unset($pdo);

        ?>

        <canvas id="coursechart"></canvas>
        <input oninput="updatecourseChart(this)" type="range" id="coursepoints" value="12" min="1" max="12">
      
    <script>
    // setup 

        <?php 
            echo "var month = ". json_encode($month) . ";\n";
            echo "var count = ". json_encode($count) . ";\n";
        ?>

    const coursedata = {
      labels: month,
      datasets: [{
        label: 'no of courses created',
        data: count,
        borderWidth: 1
      }]
    };

    // config 
    const courseconfig = {
      type: 'bar',
      data:coursedata,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const coursechart = new Chart(
      document.getElementById('coursechart'),
      courseconfig
    );

    function updatecourseChart(range)
    {
        console.log(range);
        const rangeValue= month.slice(0,range.value);
        coursechart.config.data.labels=rangeValue;
        coursechart.update()

    };
    // Instantly assign Chart.js version
    const coursechartVersion = document.getElementById('coursechartVersion');
    coursechartVersion.innerText = Chart.version;
    </script>

  </body>
</html>