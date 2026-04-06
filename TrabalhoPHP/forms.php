<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Receita</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" type="image/x-icon" href="img/bolo-de-fuba.png">
</head>

<body class="text-marrom">

    <nav class="navbar navbar-expand-lg navbar-light bg-bege">
        <div class="container-fluid">
            <a class="navbar-brand text-marrom fw-bold" href="index.php">
                <img src="img/bolo-de-fuba.png" alt="" width="30" height="30">
                Receitas da Vovó
            </a>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center mb-4">Compartilhe sua Receita</h2>
        <div class="card-terrosa p-4 shadow-sm">
            <form action="dados.php?var=exemplo123" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="nom" class="form-label">Seu Nome</label>
                    <input type="text" class="form-control" name="nome" id="nom" maxlength="50"
                        placeholder="Digite seu nome" required>
                </div>

                <div class="mb-3">
                    <label for="ema" class="form-label">Email para contato</label>
                    <input type="email" class="form-control" name="email" id="ema" maxlength="50"
                        placeholder="Digite seu email" required>
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" name="telefone" id="telefone" maxlength="50"
                        placeholder="Digite seu telefone" required>
                </div>

                <div class="mb-3">
                    <label for="nomre" class="form-label">Nome da Receita</label>
                    <input type="text" class="form-control" name="nomereceita" id="nomre" maxlength="50"
                        placeholder="Ex.: Brigadeiro" required>
                </div>

                <div class="mb-3">
                    <label for="ing" class="form-label">Ingredientes</label>
                    <textarea class="form-control" id="ing" name="ingredientes" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="prep" class="form-label">Modo de Preparo</label>
                    <textarea class="form-control" id="prep" name="preparo" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="ft" class="form-label">Foto da Receita</label>
                    <input type="file" class="form-control" name="foto" id="ft" accept="image/*">
                </div>
                <div class="mb-3 text-center">
                    <img id="preview" src="#" alt="Preview da imagem"
                        style="max-width: 50%; display: none; border-radius: 10px;">
                </div>

                <div class="mb-3">
                    <p>Você autoriza a postagem dessa receita no site?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="ss" name="autoriza" value="sim" required>
                        <label class="form-check-label" for="ss">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="nn" name="autoriza" value="nao" required>
                        <label class="form-check-label" for="nn">Não</label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn-laranja px-4">Mandar Receita</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const telInput = document.getElementById('telefone');
        telInput.addEventListener('input', function (e) {
            let valor = e.target.value.replace(/\D/g, '');
            if (valor.length > 11) valor = valor.slice(0, 11);
            if (valor.length > 6) {
                valor = valor.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
            } else if (valor.length > 2) {
                valor = valor.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
            } else {
                valor = valor.replace(/^(\d*)/, '($1');
            }
            e.target.value = valor;
        });

        const inputFoto = document.getElementById('ft');
        const preview = document.getElementById('preview');

        inputFoto.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function () {
                    preview.setAttribute('src', this.result);
                    preview.style.display = 'block';
                });

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

    </script>

    <footer class="text-center py-3 bg-bege text-marrom">
        <p>© 2026 Receitas da Vovó - Feito por Michelle R. e Sofia A.</p>
    </footer>

</body>

</html>