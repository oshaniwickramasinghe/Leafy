<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <title>user report</title>
    
  </head>
  <body>

        <?php
             try{

                $sql = "SELECT COUNT(user_id) AS count, role FROM leafy.user GROUP BY role ORDER BY COUNT(user_id)";
                
                $result = $pdo->query($sql);

                $usercount = $result->fetchAll(PDO::FETCH_ASSOC);

                $count = [];
                $role = [];

                foreach ($usercount as $uelement) {
                    array_push($count, (int) $uelement['count']);
                    array_push($role, $uelement['role']);
                }

            //     // if($result->rowCount()>0){
                    
            //     //      $colour = array();
                    
            //     //     while($row=$result->fetch()){
            //     //         $colour[]=$row["count"];
                        
            //     //         echo $row["count"];
            //     //     }
            //     //     unset($result);
            //     // }
            //     // else{
            //     //     echo "no records found";
            //     // }
            }catch(PDOException $e){
                die ("Error: unable to excecute $sql.".$e->getMessage());
            }
            //unset($pdo);

            
        ?>

    
        <canvas id="userchart"></canvas>
        <input oninput="updateuserChart(this)" type="range" id="userpoints" value="5" min="1" max="5">
     
    <script>
    // setup 

        <?php 
            echo "var role = ". json_encode($role) . ";\n";
            echo "var count = ". json_encode($count) . ";\n";
        ?>

    const userdata = {
      labels: role,
      datasets: [{
        label: 'users by category',
        data: count,
        borderWidth: 1
      }]
    };

    // config 
    const userconfig = {
      type: 'bar',
      data:userdata,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const userchart = new Chart(
      document.getElementById('userchart'),
      userconfig
    );

    function updateuserChart(range)
    {
        console.log(range);
        const rangeValue= role.slice(0,range.value);
        userchart.config.data.labels=rangeValue;
        userchart.update()

    };
    // Instantly assign Chart.js version
    const userchartVersion = document.getElementById('userchartVersion');
    userchartVersion.innerText = Chart.version;
    </script>

  </body>
</html>