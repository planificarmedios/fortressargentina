	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Gestor de Alta de Objetivos					</a></div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        
		<li class="<?php echo $active_clientes;?>"><a href="../clientes.php"><i class='glyphicon glyphicon-user'></i>Objetivos</a></li>
		<li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
        <li class="<?php ?>"><a href="listar.php"><i  class='glyphicon glyphicon-ok'></i>Exportar a .csv </a></li>
        <li class="<?php ?>"><a href="../listarBis.php"><i  class='glyphicon glyphicon-export'></i>Crear archivo .txt</a></li>
		
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="../login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>