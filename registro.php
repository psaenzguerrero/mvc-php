
<body>
    <?php if(isset($err)) echo $err; ?>
    <form action="index.php?action=registrar" method="post">
        <label for="nom">Nombre de usuario</label>
        <br>
        <input type="text" name="nom">
        <br>
        <label for="psw">Contraseña</label>
        <br>
        <input type="password" name="psw">
        <br>
        <label for="psw2">Contraseña2</label>
        <br>
        <input type="password" name="psw2">
        <br>
        <input type="submit" value="Enviar" name="fReg">
    </form>
    <p>
        ¿Ya tiene cuenta?
        <a href="index.php">Inicia Sesion</a>
    </p>
</body>
