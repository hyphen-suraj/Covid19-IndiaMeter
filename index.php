<?php include "includes/header.php"?>

  <!-- Page Wrapper -->
  <div id="wrapper">

   

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <div class="page-header text-center"> 
          <h1> Covid 19 India Meter</h1>
        </div>

        <!-- Begin Page Content -->
        <div class="container-fluid">

         

          <!-- Content Row -->
          <div class="row">

          <?php
          
         
          $query="SELECT SUM(confirmed) as sum_con FROM statewiselist; ";
          
          $result=mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($result)){
            $confirmed=$row['sum_con'];
          }
          
          
         
          
          
          ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Confirmed Cases</div>
                      <?php echo " <div id='confirmed' class='h5 mb-0 font-weight-bold text-gray-800'>  {$confirmed} </div> ";?>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-heartbeat fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php
            $query="SELECT SUM(recovered) as sum_rev FROM statewiselist; ";
          
          $result=mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($result)){
            $recovered=$row['sum_rev'];
          }
?>
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Recovered</div>
                      <?php echo " <div class='h5 mb-0 font-weight-bold text-gray-800'>  {$recovered} </div> ";?>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-stethoscope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
            $query="SELECT SUM(death) as sum_death FROM statewiselist; ";
          
          $result=mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($result)){
            $dead=$row['sum_death'];
          }
?>

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Deaths</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <?php echo " <div class='h5 mb-0 font-weight-bold text-gray-800'>  {$dead} </div> ";?>
                        </div>
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-thermometer-empty fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php
$active=$confirmed-$dead-$recovered;

$avtivePer=ceil(($active/$confirmed)*100);
$recoveredPer=ceil(($recovered/$confirmed)*100);
$deadPer=floor(($dead/$confirmed)*100);

?>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Active Cases</div>
                      <?php echo " <div class='h5 mb-0 font-weight-bold text-gray-800'>  {$active} </div> ";?>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-plus-square fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>








<script type="text/javascript">

google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Active');
      data.addColumn('number', 'Dead');
      data.addColumn('number', 'Recovered');

      data.addRows([

<?php
  $query="SELECT * FROM (
    SELECT * 
    FROM dailylist 
   
    ORDER BY date DESC
    LIMIT 14
  ) AS `table` ORDER by date ASC ";

  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed". mysqli_error($connection));
  }

  while($row=mysqli_fetch_assoc($result)){
  
   $datecase=substr($row['date'],0,2);
   $activeccase=$row['active'];
   $recoveredcase=$row['recovered'];
   $deadcase=$row['dead'];

    echo "[{$datecase},  {$activeccase}, {$deadcase}, {$recoveredcase}],";


  }
  
  
  
  
  
  
  
  
  
  
  ?>





     
      ]);

      var options = {
        chart: {
          width: '100%'
          
        },
        
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }



</script>







          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daily Overview</h6>
                  <div class="dropdown no-arrow">
                    
                   
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area" id="linechart_material">
                    



                  </div>
                </div>
              </div>
            </div>
</div>



<div class="row">

<div class="col-xl-6 ">



<table class="table table-responsive table-hover table-dark table-striped " >
<thead>
<tr>

<th>State</th>
<th>Confirmed Case</th>
<th>Recovered</th>
<th>Deaths</th>
<th>Active</th>
</thead>

<tbody>
  <?php
 $query= "SELECT * FROM statewiselist";
 $category_list=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($category_list)){
                   
                   $state=$row['state'];
                   $confirmed=$row['confirmed'];
                   $recovered=$row['recovered'];
                   $death=$row['death'];
                   $active=$confirmed-$recovered-$death;
                  echo "<tr>";
                  
                  echo "<td>{$state}</td>";
                  echo "<td>{$confirmed}</td>";
                  echo "<td>{$recovered}</td>";
                  echo "<td>{$death}</td>";
                  echo "<td>{$active}</td>";
                  echo "</tr>";
                 }
 ?>
 </tbody>
 </table>
 
</div>


<div class="col-xl-6 ">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
  </div>
  <div class="card-body">
  <?php
  echo "<h4 class='small font-weight-bold'>Active Cases <span class='float-right'>{$avtivePer}%</span></h4>";
  ?>
    <div class="progress mb-4">

    <?php
      echo "<div class='progress-bar' role='progressbar' style='width: {$avtivePer}%' aria-valuenow='60'aria-valuemin='0' aria-valuemax='100'></div>";
      ?>
    </div>

    <?php
  echo "<h4 class='small font-weight-bold'>Recovered Cases <span class='float-right'>{$recoveredPer}%</span></h4>";
  ?>
    <div class="progress mb-4">

    <?php
      echo "<div class='progress-bar bg-warning' role='progressbar' style='width: {$recoveredPer}%' aria-valuenow='60'aria-valuemin='0' aria-valuemax='100'></div>"
      ?>
    </div>


    <?php
  echo "<h4 class='small font-weight-bold'>Death Cases <span class='float-right'>{$deadPer}%</span></h4>";
  ?>
    <div class="progress mb-4">

    <?php
      echo "<div class='progress-bar bg-danger' role='progressbar' style='width: {$deadPer}%' aria-valuenow='60'aria-valuemin='0' aria-valuemax='100'></div>"
      ?>
    </div>

    </div>
</div>





<!-- Project Card Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Indian positive case outside india</h6>
  </div>
  <div class="card-body">
  <table class=" table table-hover  table-striped responsive" >
<thead>
<tr>

<th>Country</th>
<th>Active Case</th>

<th>Deaths</th>

</thead>

<tbody>
  <?php
 $query= "SELECT * FROM outside";
 $category_list=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($category_list)){
                   
                   $country=$row['country'];
                   $active=$row['active'];
                  
                   $death=$row['death'];
                   
                  echo "<tr>";
                  
                  echo "<td>{$country}</td>";
                  echo "<td>{$active}</td>";
                  
                  echo "<td>{$death}</td>";

                  echo "</tr>";
                 }
 ?>
 </tbody>
 </table>
  </div>
</div>

<!-- Project Card Example -->

<script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Popularity'],

          <?php
 $query= "SELECT * FROM countrywise ";
 $category_list=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($category_list)){
                   
                   $country=$row['country'];
                   $confirm=$row['confirmed'];
                  
                   
         echo "['{$country}', {$confirm}]," ;
}
?>
         
        ]);

        var options = {
          width: '100%',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>  
   
   <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Positive cases all over world</h6>
  </div>
   
   <div class="card-body">
      <div class="chart-area" id="regions_div" >
      

      </div>
    </div>
</div>
          
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">World Overview</h6>
  </div>
  <div class="card-body">
  <table class=" table  table-hover  table-striped " >
<thead>
<tr>

<th>Country</th>
<th>Confirmed Case</th>


<th>Deaths</th>

</thead>

<tbody>
  <?php
 $query= "SELECT * FROM countrywise order by 'confirmed' limit 8 ";
 $category_list=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($category_list)){
                   
                   $country=$row['country'];
                   $confirm=$row['confirmed'];
                   
                  
                   $death=$row['death'];
                   
                  echo "<tr>";
                  
                  echo "<td>{$country}</td>";
                  echo "<td>{$confirm}</td>";
                  
                  echo "<td>{$death}</td>";

                  echo "</tr>";
                 }
 ?>
 </tbody>
 </table>
  </div>


</div> 
</div>













  
  <?php include "includes/footer.php"?>