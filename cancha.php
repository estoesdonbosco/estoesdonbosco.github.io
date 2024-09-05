<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Asientos - SVG</title>
    <style>

.scroll-container {
            width: 8010px;  /* Ancho fijo */
            height: 3000px; /* Alto fijo */ 
            overflow: auto; /* Permite el scroll si el contenido es más grande */
            border: 1px solid #ccc; /* Opcional: Agrega un borde al contenedor */
        }
        .seat {
            fill: #e1f7e4; /* Color para asientos no vendidos */
            stroke: #d9fada; /* Borde de los asientos */
            cursor: pointer;
        }
        .sold {
            fill: #229547; /* Color para asientos vendidos */
        }
        .seat:hover {
            opacity: 0.8; /* Efecto al pasar el ratón */
        }
    </style>
</head>
<body>
  <div class="scroll-container">

      <svg width="100%" height="100%">
          <?php
          // Configuración inicial
          $rows = 150;
          $cols = 400;
          $seatWidth = 10;
          $seatHeight = 10;
          $padding = 2; // Espacio entre los asientos

          // Ejemplo de asientos vendidos
          $soldSeats = [
              [1, 2], [3, 5], [6, 10], [9, 19] // Ejemplos: Asiento en fila 1 columna 2, etc.
          ];

          // Generar asientos
          for ($i = 0; $i < $rows; $i++) {
              for ($j = 0; $j < $cols; $j++) {
                  $x = $j * ($seatWidth + $padding);
                  $y = $i * ($seatHeight + $padding);
                  $isSold = false;

                  // Verificar si el asiento está vendido
                  foreach ($soldSeats as $seat) {
                      if ($seat[0] == $i && $seat[1] == $j) {
                          $isSold = true;
                          break;
                      }
                  }

                  // Asignar la clase según el estado del asiento
                  $class = $isSold ? 'sold' : 'seat';

                  echo "<rect class='$class' x='$x' y='$y' width='$seatWidth' height='$seatHeight' onclick=\"location.href='https://linkdepago.com?seat={$i}_{$j}'\" />";
              }
          }
          ?>
      </svg>
  </div>
</body>
</html>