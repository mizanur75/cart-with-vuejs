<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vue JS</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/dashboard.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-success flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Cart in VueJS</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Cart in VueJS <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cart in VueJS</h1>
          </div>
          <div id="app">
            <table class="table table-sm">
              <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Action</th>
              </tr>
              <tr>
                <td>
                  <select v-model="newCat.mtype" id="" class="form-control-sm form-control code">
                  <?php
                    $db = new mysqli("localhost","root","","test");

                    $select = $db->query("select code from product");

                    while (list($code) = $select->fetch_row()) {
                      echo "<option value='$code'>$code</option>";
                    }
                  ?>
                  </select>
                </td>
                <td>
                  <input type="text" v-model="newCat.name" class="form-control-sm form-control name"/>
                </td>
                <td>
                  <input type="text" v-model="newCat.rules" class="form-control-sm form-control price"/>
                </td>
                <td>
                  <button class="btn btn-sm" @click="addCat">+</button>
                </td>
              </tr>
            </table>
              <br>
              <div class="table-responsive">
                <table class="table table-sm">
                  <tr>
                    <th>Code</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th class="text-center">Action</th>
                  </tr>
                  <tr v-for="(cat, n) in cats">
                    <td>{{cat.mtype}}</td>
                    <td>{{cat.name}}</td>
                    <td>{{cat.rules}}</td>
                    <td class="text-center"><button @click="removeCat(n)" class="btn btn-sm btn-danger">X</button></td>
                  </tr>
                </table>
              </div>
          </div>
          </div>
        </main>
      </div>
    </div>

	<!-- <script src="js/jquery-3.3.1.slim.min.js"></script> -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/vue.js"></script>
	<script src="js/custom.js"></script>
  <script>
    $(function(){
      $(".code").change(function(){
        var code = $(this).val();

        $.ajax({
          url : 'select.php',
          method : 'POST',
          dataType : 'JSON',
          data : {code:code},
          success : function(echo){
            $('.name').val(echo.name);
            $('.price').val(echo.price);
          }
        });
        
      });
    })
  </script>
</body>
</html>