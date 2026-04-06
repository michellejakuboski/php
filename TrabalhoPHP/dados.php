<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" type="image/x-icon" href="img/bolo-de-fuba.png">
</head>
<style>
    h2 {
        color: #5c4033 !important;
    }
    img{
        margin-bottom: 10px;
        width: 200px;
    }
</style>

<body class="container my-5">
    <div class="card-terrosa p-4 shadow-sm">

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $nomereceita = $_POST["nomereceita"];
            $ingredientes = $_POST["ingredientes"];
            $preparo = $_POST["preparo"];
            $autoriza = $_POST["autoriza"] ?? "Não autorizado";

            $foto = $_FILES["foto"];

            if ($foto['error'] === 0) {

                if ($foto['size'] <= 2 * 1024 * 1024) {

                    $tiporeal = mime_content_type($foto['tmp_name']);

                    if (strpos($tiporeal, 'image') !== false) {


                        $extensao = pathinfo($foto['name'], PATHINFO_EXTENSION);
                        $extensao = strtolower($extensao);

                        if ($extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png') {

                            $nomearq = uniqid() . "." . $extensao;

                            move_uploaded_file($foto['tmp_name'], "uploads/" . $nomearq);

                            echo "<h2>Dados do form:</h2>";
                            echo "<p>Imagem enviada:</p>";
                            echo "<img src='uploads/$nomearq'>";
                            echo "<p>Nome: $nome</p>";
                            echo "<p>Email: $email</p>";
                            echo "<p>Telefone: $telefone</p>";
                            echo "<p>Nome da Receita: $nomereceita</p>";
                            echo "<p>Ingredientes: $ingredientes</p>";
                            echo "<p>Preparo: $preparo</p>";
                            echo "<p>Autorização: $autoriza</p>";

                        } else {
                            echo "Apenas arquivos JPG ou PNG são permitidos.";
                        }

                    } else {
                        echo "O arquivo enviado não é uma imagem válida.";
                    }

                } else {
                    echo "A imagem é muito grande. Máximo: 2MB.";
                }

            } else {
                echo "Erro ao enviar a imagem.";
            }
        }
        ?>
    </div>
</body>

</html>