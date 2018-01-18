<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,minimum-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#FF00FF">
  <title>Side-nav</title>
  <!-- Links -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/side-nav.css">

</head>

<body ng-app="myApp">
  <div class="header">
    <button class="js-menu-show header__menu-toggle"><i class="material-icons">menu</i></button>
  </div>

  <aside class="js-side-nav side-nav">
    <nav class="js-side-nav__container side-nav__container">
      <button class="js-menu-hide side-nav__hide"><i class="material-icons">close</i></button>
      <header class="side-nav__header">
        Side Nav
      </header>
      <ul class="side-nav__content">
        <li><a href=""></a></li>
        <li><a href=""></a></li>
        <li><a href=""></a></li>
      </ul>
    </nav>
  </aside>

  <div class="main">
    <h1>Hellow</h1>
  </div>

  <script src="js/side-nav.js"></script>
</body>

</html>
