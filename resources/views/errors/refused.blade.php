
<script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>

<style>
body {
  background-color: #3490dc;
}

.mainbox {
  background-color: #3490dc;
  margin: auto;
  height: 600px;
  width: 600px;
  position: relative;
}

  .err {
    color: #ffffff;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 11rem;
    position:absolute;
    left: 20%;
    top: 8%;
  }

.far {
  position: absolute;
  font-size: 8.5rem;
  left: 42%;
  top: 15%;
  color: #ffffff;
}

 .err2 {
    color: #ffffff;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 11rem;
    position:absolute;
    left: 68%;
    top: 8%;
  }

.msg {
    text-align: center;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 1.6rem;
    position:absolute;
    left: 16%;
    top: 45%;
    width: 75%;
  }

a {
  text-decoration: none;
  color: white;
}

a:hover {
  color: #343a40;
}
</style>

<body>
    <div class="mainbox">
      <div class="err">4</div>
      <i class="far fa-question-circle fa-spin"></i>
      <div class="err2">1</div>
      <div class="msg">utilisateur non authentifié
          <p>revient sur<a href="/" style="text-decoration: none">home</a> et réessaye a partir de la .</p></div>
    </div>
  </body>

