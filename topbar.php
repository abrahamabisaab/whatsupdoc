<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  * {box-sizing: border-box;}

  body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .header {
    overflow: hidden;
    background-color: #f1f1f1;

  }

  .header a {
    float: left;
    color: black;
    text-align: center;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    line-height: 25px;
    border-radius: 4px;
  }


  .header a:hover {
    background-color: #ddd;
    color: black;
  }

  .logo {
    display: inline-block;
    vertical-align: top;
    width: 100%;
    height: 300px;
    margin-right: 0;
    margin-top: 0;
  }

  .header a.active {
    background-color: dodgerblue;
    color: white;
  }

  .header-right {
    float: right;
  }

  @media screen and (max-width: 500px) {
    .header a {
      float: none;
      display: block;
      text-align: left;
    }

    .header-right {
      float: none;
    }
  }
  </style>
  <body>
    <div class="header">
      <img class="logo" src="logo.png">
      <div class="header-right">


      </div>
    </div>

  </body>
</html>
