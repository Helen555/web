<div id="auth_block" class="module">
  <?php
  if (isset($_SESSION["name"])) {
    ?>
    <h2><?php echo $_SESSION["name"]; ?></h2>
    <form method="post">
      <a href="admin/">Админка</a>
      <input class="btn" value="Выход" type="submit" name="exit" />
    </form>
  <?php } else { ?>
    <h2>Авторизация</h2>
    <span class="err"><?php echo $message_err; ?></span>

    <form method="post"> <!-- передача данных-->
      <input name="name" type="text" placeholder="Логин" size="20"/>
      <input name="pass" type="password" placeholder="Пароль" size="20"/>
      <input class="btn" type="submit" value="Ok"/>
    </form>
    <?php
  }
  ?>
</div>

