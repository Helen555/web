<div id="menu">
  <ul>
    <?php
    $menu_result = $pdo->query("SELECT * FROM  `page`");
    while ($menu_item = $menu_result->fetch(PDO::FETCH_ASSOC)) {
      ?>
    <li><p><a href="<?php echo $menu_item["url"] ?>"><?php echo $menu_item["name"] ?></a></p></li>
      <?php
    }
    ?>
  </ul>
</div>