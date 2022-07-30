<?php 
session_start();
if (!isset($_SESSION['cap_do'])) {
    header('location: ../index.php');
    exit;
} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thống kê tổng quan</title>
	<link rel="stylesheet" type="text/css" href="../../styles.css">
    <link rel="stylesheet" type="text/css" href="./overview.css">
    <link rel="icon" href="../../resource/logo.png">
    <style type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
          min-width: 360px;
          max-width: 800px;
          margin: 1em auto;
      }

      .highcharts-data-table table {
          font-family: Verdana, sans-serif;
          border-collapse: collapse;
          border: 1px solid #ebebeb;
          margin: 10px auto;
          text-align: center;
          width: 100%;
          max-width: 500px;
      }

      .highcharts-data-table caption {
          padding: 1em 0;
          font-size: 1.2em;
          color: #555;
      }

      .highcharts-data-table th {
          font-weight: 600;
          padding: 0.5em;
      }

      .highcharts-data-table td,
      .highcharts-data-table th,
      .highcharts-data-table caption {
          padding: 0.5em;
      }

      .highcharts-data-table thead tr,
      .highcharts-data-table tr:nth-child(even) {
          background: #f8f8f8;
      }

      .highcharts-data-table tr:hover {
          background: #f1f7ff;
      }
  </style>
</head>
<body>
    <?php
    require '../../database/connect.php';

    //3 rows, 4 products each row
    $products_per_page = 15;
    require '../../partial/process_pagination.php';

    // Searching
    require '../../partial/process_search.php';

      //doanh thu 
    $query_doanh_thu = "
    SELECT 
    SUM(hoa_don.tong_tien) AS tong_tien
    FROM hoa_don
    WHERE hoa_don.trang_thai = 1
    ";
    $return_doanh_thu = mysqli_fetch_array(mysqli_query($connect,$query_doanh_thu));


    //doanh thu trong ngày
    $query_doanh_thu_trong_ngay = "
    SELECT 
    SUM(hoa_don.tong_tien) AS tong_tien
    FROM hoa_don
    WHERE hoa_don.trang_thai = 1 AND cast(hoa_don.thoi_gian_dat AS DATE ) = CURRENT_DATE()
    ";
    $return_doanh_thu_trong_ngay = mysqli_fetch_array(mysqli_query($connect,$query_doanh_thu_trong_ngay));

    ?>
    <div id="main_div">

      <?php include '../header.php'; ?>
      <?php 
      if ($_SESSION['cap_do'] == 1)
        include '../menu.php';
    else 
        include '../products/menu.php';
    ?>

    <div id="middle_div" style="z-index: 9999">
     <div id="content">
        <p>

            <figure class="highcharts-figure">
              <div id="container"></div>
          </figure>

          <div id="alert">
            <span style="font-size:20px;display: block;">
                <h2>Thống kê doanh thu</h2>
            </span>

            <table class="main_table1">
                <tr style="background-color: #95c5ff;">
                    <th>
                        Tổng doanh thu: 
                    </th>
                </tr>
                <tr name="each_row" style="background-color: #DFE1F8;">
                    <td>
                        <?php echo number_format($return_doanh_thu['tong_tien'],'0','',',') . '₫
                        '; ?>
                    </td> 
                </tr>

            </table>
            <table class="main_table2">
                <tr style="background-color: #95c5ff;">
                    <th>
                        Doanh thu <em>trong ngày</em> 
                    </th>
                </tr>
                <tr name="each_row" style="background-color:#DFE1F8;">
                    <td>
                        <?php echo number_format($return_doanh_thu_trong_ngay['tong_tien'],'0','',',') . '₫
                        '; ?>
                    </td> 
                </tr>
            </table>
        </div>
    </p>
</div>
</div>
<?php include '../../partial/footer.php';?>
</div>
<?php mysqli_close($connect); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: 'chart_index.php',
            dataType: 'json',
            data: {},
        })
        .done(function(response) {
            array_month = Object.keys(response);
            array_revenue = Object.values(response);

            Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Thống kê doanh thu theo tháng'
                },
                xAxis: {
                    title: {
                      text: 'Ngày'
                    },
                    categories: array_month
                    },
                yAxis: {
                    title: {
                        text: 'VND'
                    }
                },
                plotOptions: {
                    line: {
                      dataLabels: {
                        enabled: true
                    },
                        enableMouseTracking: true
                    }
                },
                series: [
                    {
                        name: 'Doanh thu',
                        data: array_revenue
                    }
                ]

            });
        });
        
    });
</script>


</body>
</html>
