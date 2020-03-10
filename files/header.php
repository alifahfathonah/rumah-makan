<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index">Rumah Makan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <a class="nav-link" href="#">
        	<?php if (isset($_SESSION['username'])): ?>
        		<?= $_SESSION['username'] ?>
        	<?php endif ?>
        </a>
        <?php if (isset($_SESSION['bayar'])): ?>
          <a href="bayar" class="nav-link">Bayar</a>
        <?php endif ?>
        <?php if (isset($_SESSION['status'])): ?>
          <a href="status" class="nav-link">Status</a>
        <?php endif ?>
        <?php if (isset($_SESSION['username'])): ?>
        	<a class="nav-link" href="logout">
        		Logout
        	</a>
        <?php endif ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<p></p>