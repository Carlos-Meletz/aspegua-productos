<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="shortcut icon" href="./assets/icons/logo.ico" type="image/x-icon">
    <title>Aspegua | Productos</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <img src="./assets/images/logo1.png" alt="LogoAspegua" height="80" width="80">
            <div class="info">
                <p id="ong"><b>Organizacion Aspegua</b></p>
                <p id="dir">Km 132.5 Ruta a Sololá, Cooperativa Xajaxac, Sololá</p>
                <p id="tel">Tel: 3260-6907</p>
            </div>
        </div>
        <form action="#">
            <h2>Créditos Productos</h2>
            <label for="">Precio del Producto</label>
            <input type="number" step="0.01" name="precio" id="precio" placeholder="Precio" required>
            <label for="">Plazo</label>
            <select name="plazo" id="plazo" required>
                <option value="3">3 Meses</option>
                <option value="6">6 Meses</option>
                <option value="10">10 Meses</option>
                <option value="12">12 Meses</option>
                <option value="18">18 Meses</option>
                <option value="24">24 Meses</option>
                <option value="30">30 Meses</option>
                <option value="36">36 Meses</option>
            </select>
            <div class="btn">
                <input type="submit" name="calcular" id="calcular" value="Calcular Cuota">
            </div>
        </form>
        <div class="resultado" id="resultado">

        </div>
    </div>
    <script src="./assets/js/jquery.min.js"></script>
    <script>
        $('form').submit(function(e){
        e.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            url: './lib/calculo.php',
            type: 'POST',
            data: data,
            success: function(val){
                document.getElementById('resultado').innerHTML = val;
                // if(val === ""){
                //     alert('ERROR: Recibo ya Operado!');
                    
                // }else{
                //     alert("Transaccion Exitosa! Imprima Recibo.");
                //     var idm = parseInt(val);
                
                // }
            }
        })
    })
    </script>
</body>
</html>