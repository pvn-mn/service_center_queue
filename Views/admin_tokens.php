<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Manage Tokens</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
</head>
<body class="bg-light">

<div class="container py-5">


  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Admin Panel - Service Queue</h1>
    <div>
      <span class="me-3">Welcome, <strong><?= session()->get('username') ?></strong> (Role: <?= session()->get('role') ?>)</span>
      <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-danger">Logout</a>
    </div>
  </div>


  <div class="card shadow-sm">
  <div class="card-header bg-dark text-white">
    Manage Tokens
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped align-middle mb-0">
      <thead class="table-white">
        <tr>
          <th>ID</th>
          <th>Token Number</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="adminTable">
        <!-- loadAll() -->
      </tbody>
    </table>
    </div>
  </div>
  </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  
  function loadAll() {
    $.getJSON('<?= base_url('token/getList') ?>', function(tokens) {
      let html = '';
      tokens.forEach(t => {
        html += `
          <tr>
            <td>${t.id}</td>
            <td>${t.token_number}</td>
            <td><span>${t.status}</span></td>
            <td>
              <button onclick="setStatus(${t.id}, 'Waiting')" class="btn btn-danger">Waiting</button>
              <button onclick="setStatus(${t.id}, 'Ongoing')" class="btn btn-warning">Ongoing</button>
              <button onclick="setStatus(${t.id}, 'Ended')" class="btn btn-success"> Ended</button>
            </td>
          </tr>`;
      });
      $('#adminTable').html(html);
    });
  }

  
  function setStatus(id, status) {
    $.post('<?= base_url('token/update-status') ?>', { id, status }, function(res) {
      if (res.ok) loadAll();
    }, 'json');
  }

  
  loadAll();
  setInterval(loadAll, 1000);
</script>
</body>
</html>
