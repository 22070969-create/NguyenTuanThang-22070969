<!DOCTYPE html>
<html>
  <body>
    <h1>PHP Arithmetic & Comparison Example</h1>

    <?php
      
      $x = 12;
      $y = 4;

      echo "<h3>Giá trị ban đầu:</h3>";
      echo "x = $x, y = $y <br><br>";

      // --- Phép toán số học ---
      echo "<h3>Phép toán số học:</h3>";

      $z = $x + $y;
      echo "The sum of x and y is: <br>" . $z . "<br><br>";

      $z = $x - $y;
      echo "The difference of x and y is: <br>" . $z . "<br><br>";

      $z = $x * $y;
      echo "The product of x and y is: <br>" . $z . "<br><br>";

      $z = $x / $y;
      echo "The division of x and y is: <br>" . $z . "<br><br>";

      $z = $x % $y;
      echo "The modulus of x and y is: <br>" . $z . "<br><br>";

      // --- So sánh ---
      echo "<h3>So sánh:</h3>";

      $z = ($x == $y);
      echo "x == y : " . ($z ? "true" : "false") . "<br>";

      $z = ($x != $y);
      echo "x != y : " . ($z ? "true" : "false") . "<br>";

      $z = ($x < $y);
      echo "x < y : " . ($z ? "true" : "false") . "<br>";

      $z = ($x > $y);
      echo "x > y : " . ($z ? "true" : "false") . "<br>";

      $z = ($x <= $y);
      echo "x <= y : " . ($z ? "true" : "false") . "<br>";

      $z = ($x >= $y);
      echo "x >= y : " . ($z ? "true" : "false") . "<br>";
    ?>
  </body>
</html>
localhost

