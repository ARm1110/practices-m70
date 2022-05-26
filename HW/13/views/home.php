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
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
        <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </svg>
      <?php echo $_GET['errorW']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php } ?>
<?php if (isset($_GET['errorD'])) { ?>
  <div class="position-absolute top-0 mt-5 start-50 translate-middle">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo $_GET['errorD']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php } ?>
<?php if (isset($_GET['errorD'])) { ?>
  <div class="position-absolute top-0 mt-5 start-50 translate-middle">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
      </svg>
      <?php echo $_GET['errorD']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php } ?>
<?php if (isset($_GET['massage'])) { ?>
  <div class="position-absolute top-0 mt-5 start-50 translate-middle">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
      </svg>
      <?php echo $_GET['massage']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php } ?>