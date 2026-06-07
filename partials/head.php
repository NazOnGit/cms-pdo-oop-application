<!DOCTYPE html>
<html lang="en">

<head>
  <!-- META -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- TITLE -->
  <title><?php echo $page_title; ?></title>
  <!-- BOOTSTRAP CSS + CSS STRUCTURE ORDER -->

  <!-- 1. Load Bootstrap utility classes, components, and predefined styles FIRST -->

  <!-- 2. Load local/custom styles AFTER Bootstrap so local styles can override Bootstrap styles if needed -->

  <!-- CSS loads top → bottom, so styles loaded later/below come second and win over earlier Bootstrap styles -->

  <!-- load order -->

  <!-- 1. Bootstrap CSS -->

  <!-- 2. Google font -->

  <!-- 3. reuse.css (local/custom styles) -->

  <!-- 4. dynamic page/component CSS (local/custom styles) -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet">
  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <!-- GLOBAL STYLESHEETS -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/reuse.css" />
  <!-- DYNAMIC PAGE SPECIFIC STYLESHEETS -->
  <?php if (!empty($page_specific_stylesheet)): ?>
    <?php foreach ($page_specific_stylesheet as $stylesheet): ?>
      <link rel="stylesheet" href="<?php echo htmlspecialchars($stylesheet); ?>" />
    <?php endforeach;  ?>
  <?php endif; ?>
</head>

<body>
  <!-- flex container opened for vertical spacing for all pages and closes in footer.php -->
  <div class="page">