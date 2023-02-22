<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Inventory Lists</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/table.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
</head>
<body>
  <div><div class='title'>Inventory</div><div class="logo">electra erp</div>
  <div class='container'>
          <table class="u-table-entity">
            <colgroup>
              <col width="2%">
              <col width="20%">
              <col width="30px">
              <col width="30px">
              <col width="30px">
              <col width="30px">
              <col width="30px">
            </colgroup>
            

              <?php 
              include 'database.php';
              $sql="select * from inventory";
              $result=mysqli_query($conn,$sql);
              if($result)
              {
                $i=1;
                echo '<thead class="u-align-center u-palette-1-dark-1 u-table-header u-table-header-1">
                <tr style="height: 60px;">
                  <th class="u-border-2 u-border-no-left u-border-no-right u-border-palette-5-dark-1 u-table-cell u-table-cell-1">Sl No.</th>
                  <th class="u-border-2 u-border-no-left u-border-no-right u-border-palette-5-dark-1 u-table-cell u-table-cell-2">PID&nbsp;</th>
                  <th class="u-border-2 u-border-no-left u-border-no-right u-border-palette-5-dark-1 u-table-cell u-table-cell-3">Brand</th>
                  <th class="u-border-2 u-border-no-left u-border-no-right u-border-palette-5-dark-1 u-table-cell u-table-cell-4">Model</th>
                  <th class="u-border-2 u-border-no-left u-border-no-right u-border-palette-5-dark-1 u-table-cell u-table-cell-5">Category</th>
                  <th class="u-border-2 u-border-no-left u-border-no-right u-border-palette-5-dark-1 u-table-cell u-table-cell-6">Quantity</th>
                  <th class="u-border-2 u-border-no-left u-border-no-right u-border-palette-5-dark-1 u-table-cell u-table-cell-7">BasePrice</th>
                  <th class="u-border-2 u-border-no-left u-border-no-right u-border-palette-5-dark-1 u-table-cell u-table-cell-8">GST(%)</th>
                  </tr>
              </thead>
              <tbody class="u-black u-table-body u-table-body-1">';
                while($row=mysqli_fetch_assoc($result))
                {
                  echo '              <tr style="height: 65px;">
                  <td class="u-border-1 u-border-palette-5-dark-1 u-first-column u-table-cell u-table-cell-18">
                  '.$i.'</td>
                  <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-10">
                  '.$row['pid'].'</td>
                  <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-11" style="text-align:center">
                   '.$row['brand'].'</td>
                  <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-12" style="text-align:center">
                  '.$row['model'].'</td>
                  <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-13" style="text-align:center">
                  '.$row['category'].'</td>
                  <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-14" style="text-align:center">
                  '.$row['quantity'].'</td>
                  <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-15" style="text-align:center">
                   '.$row['baseprice'].'</td>   
                   <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-15" style="text-align:center">
                   '.$row['gst'].'</td>         
                </tr> ';
                $i+=1;
                }
              }
              else
              {
                echo "failed to fetch";
              }
              ?>


      
            </tbody>
          </table>
        </div>
  </body>
</html>
