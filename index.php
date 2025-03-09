<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  </head>
  <body class=" flex justify-center items-center h-screen bg-gray-200">
    <div  class="bg-green-900 p-6 rounded-lg shadow-lg w-80 text-center">
        <h2 class="text-2xl text-white font-bold mb-4">PHP Calculator</h2>

        <!-- Calculator Display  -->

        <form  method="POST">
            <input type="text" name="display" id="display" class="w-full p-2 text-right shadow-lg text-2xl border border-green-500 rounded-lg bg-gray-200"
            value="<?php echo isset($display) ? $_POST['display'] : ''; ?>" readonly >

            <!-- Buttons   -->
             <div class="grid grid-cols-4 gap-2 mt-4">
                <?php
                    $buttons = [
                        '7', '8', '9', '/',
                        '4', '5', '6', '*',
                        '1', '2', '3', '-',
                        '0', 'C', '=', '+'
                    ];

                    foreach ($buttons as $button) {
                        if($button == 'C'){
                            echo "<button type='submit' name='btn' value='$button' 
                                class='p-3 border-green-900 border bg-red-500  hover:border-green-200 rounded-md text-2xl shadow-md hover:bg-green-900 text-white'>$button</button>";
                        }elseif($button == '=' || $button == '+' || $button == '-' || $button == '*' || $button == '/') {
                            echo "<button type='submit' name='btn' value='$button' 
                            class='p-3 border-green-900 border bg-yellow-500  hover:border-green-200 rounded-md text-2xl shadow-md hover:bg-green-900 text-white'>$button</button>";
                        }
                        
                        else{
                            echo "<button type='submit' name='btn' value='$button' 
                                class='p-3 border-green-900 border bg-green-200  hover:border-green-200 rounded-md text-2xl shadow-md hover:bg-green-900 hover:text-white'>$button</button>";
                        }
                        
                    }
                ?>
             </div>
        </form>
        <?php
           if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $display = $_POST['display'];
            $btn = $_POST['btn'];

            if ($btn == "=") {
                $display = eval ("return $display;"); // Evaluate the expression
            } elseif ($btn == "C") {
                $display = ""; // Clear display
            } else {
                $display .= $btn; // Append button value to display
            }

            echo "<script> document.getElementById('display').value = '$display';</script>";
        }
        ?>
    </div>
  </body>
</html>