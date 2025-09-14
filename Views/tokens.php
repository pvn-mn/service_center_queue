<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Token System (with Sessions)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-light">

<div class="container py-5">


  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Service Queue</h1>
    <div>
      <span class="me-3">Welcome, <strong><?= session()->get('username') ?></strong></span>
      <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-danger">Logout</a>
    </div>
  </div>

  <!-- $('#btnCreate').on('click', function() { -->
  <div class="mb-4">
    <button id="btnCreate" class="btn btn-primary">Generate Token</button>
  </div>

  <!-- function loadMe() { -->
  <div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
      My Token
    </div>
    <div class="card-body">
      <div id="myToken" class="fs-5 text-muted">None yet</div>
    </div>
  </div>

  <!-- function loadTokens() { -->
  <div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
      All Tokens
    </div>
    <div class="card-body">
      <ul id="tokenList" class="list-group"></ul>
    </div>
  </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $('#btnCreate').on('click', function() {
    $.post('<?= base_url('token/create') ?>', {}, function(data) {
        $('#myToken').html('Token: ' + data.token_number + ' (' + data.status + ')');
        loadTokens();
    }, 'json');
    });


    function loadMe() {
    $.getJSON('<?= base_url('token/me') ?>', function(data) {
        if (data) {
        $('#myToken').html('Token: ' + data.token_number + ' (' + data.status + ')');
        }
    });
    }


    function loadTokens() {
    $.getJSON('<?= base_url('token/getList') ?>', function(tokens) {
        let html = '';
        tokens.forEach(t => {
        html += '<li>' + t.token_number + ' - ' + t.status + '</li>';
        });
        $('#tokenList').html(html);
    });
    }


    setInterval(function() {
        loadMe();
        loadTokens();
    }, 1000);
</script>

</body>

</html>
