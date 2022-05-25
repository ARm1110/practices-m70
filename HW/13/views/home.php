<?php
// var_dump($_SESSION, '<br>');
// var_dump($data, '<br>');
// exit;
?>
<?php if (!isset($_SESSION['id'])) {
?>
  <section class="hero" id="hero">
    <div class="heroText d-flex flex-column justify-content-center">
      <h1 class="mt-auto mb-2">
        Better
        <div class="animated-info">
          <span class="animated-item">health</span>
          <span class="animated-item">days</span>
          <span class="animated-item">lives</span>
        </div>
      </h1>
      <p class="mb-4">Medic Care is a Bootstrap 5 Template provided by TemplateMo website. Credits go to FreePik and RawPixel for images used in this template.
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos optio facilis distinctio placeat minus, perferendis dignissimos ducimus odit delectus?
        In alias autem ab amet esse iste reiciendis quos qui repudiandae.
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos optio facilis distinctio placeat minus, perferendis dignissimos ducimus odit delectus?
        In alias autem ab amet esse iste reiciendis quos qui repudiandae.
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos optio facilis distinctio placeat minus, perferendis dignissimos ducimus odit delectus?
        In alias autem ab amet esse iste reiciendis quos qui repudiandae.
      </p>
  </section>
<?php } else {  ?>
  <section class="hero" id="hero">
    <div class="heroText d-flex flex-column justify-content-center">
      <h3 class="mt-auto mb-2">
        <?php echo $_SESSION['massage']; ?>
      </h3>
      <p class="mb-4">Medic Care is a Bootstrap 5 Template provided by TemplateMo website. Credits go to FreePik and RawPixel for images used in this template.
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos optio facilis distinctio placeat minus, perferendis dignissimos ducimus odit delectus?
        In alias autem ab amet esse iste reiciendis quos qui repudiandae.
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos optio facilis distinctio placeat minus, perferendis dignissimos ducimus odit delectus?
        In alias autem ab amet esse iste reiciendis quos qui repudiandae.
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos optio facilis distinctio placeat minus, perferendis dignissimos ducimus odit delectus?
        In alias autem ab amet esse iste reiciendis quos qui repudiandae.
      </p>
  </section>
<?php } ?>
<?php if (isset($_SESSION['id'])) {
?>
  <div class="d-flex align-items-end flex-column bd-highlight mb-3" style="height: 200px;">
    <div class="mt-auto p-2 bd-highlight">
      <div class="card" style="width: 18rem;">
        <img src="../public_html/uploads/img/uwp899709.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data[0]['firstName'] . ' ' . $data[0]['lastName']; ?> </h5>
          <p class="card-text"><?php echo $data[0]['email']; ?></p>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<?php if (isset($_GET['errorW'])) { ?>
  <div class="position-absolute top-0 mt-5 start-50 translate-middle">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>warning</strong>!</strong> <?php echo $_GET['errorW']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php } ?>
<?php if (isset($_GET['errorD'])) { ?>
  <div class="position-absolute top-0 mt-5 start-50 translate-middle">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Alert</strong>!</strong> <?php echo $_GET['errorD']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php } ?>