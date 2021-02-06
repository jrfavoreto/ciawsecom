<?php
//Inicialização 
session_start();

if (isset($_SESSION['view_ativa'])) {
    echo "<h3 class='mt-4'> Anterior: " . $_SESSION['view_ativa'] ."</h3>";
}
$_SESSION['view_ativa'] = "Conteúdo 2";
?>

<h1 class="mt-4"><?php echo $_SESSION['view_ativa'] ?></h1>
<p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
<p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>