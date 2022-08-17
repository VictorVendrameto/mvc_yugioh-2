<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Carta</title>
    <link rel="stylesheet" href="style_cartas.css" class="css"/>
</head>
<body>
    <table>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Nome</th>
            <th>Nível</th>
            <th>Atributo</th>
            <th>Tipo</th>
            <th>Ponto ATK</th>
            <th>Ponto DEF</th>

        </tr>

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td>
                <a href="/yugioh/delete?id=<?= $item->id ?>">X</a>
            </td>

            <td><?= $item->id ?></td>

            <td>
                <a href="/yugioh/form?id=<?= $item->id ?>"><?= $item->nome ?></a>
            </td>
            <td><?= $item->nivel ?></td>
            <td><?= $item->atributo ?></td>
            <td><?= $item->tipo ?></td>
            <td><?= $item->ponto_atk ?></td>
            <td><?= $item->ponto_def ?></td>

            
        </tr>
        <?php endforeach ?>

        
        <?php if(count($model->rows) == 0): ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado.</td>
            </tr>
        <?php endif ?>

    </table>
    
</body>
</html>