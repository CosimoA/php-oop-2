<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online per Animali</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        h2 {
            margin-top: 20px;
        }

        .prodotto {
            display: inline-block;
            width: 200px;
            margin: 10px;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .prodotto img {
            width: 100%;
            border-radius: 5px;
        }

        .prodotto strong {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php

    class Prodotto
    {
        public $immagine;
        public $titolo;
        public $prezzo;
        public $categoria;
        public $tipo;

        public function __construct($immagine, $titolo, $prezzo, $categoria, $tipo)
        {
            $this->immagine = $immagine;
            $this->titolo = $titolo;
            $this->prezzo = $prezzo;
            $this->categoria = $categoria;
            $this->tipo = $tipo;
        }
    }

    class Categoria
    {
        public $nome;
        public $prodotti = array();

        public function __construct($nome)
        {
            $this->nome = $nome;
        }

        public function aggiungiProdotto($prodotto)
        {
            $this->prodotti[] = $prodotto;
        }
    }

    class Shop
    {
        public $categorie = array();

        public function aggiungiCategoria($categoria)
        {
            $this->categorie[] = $categoria;
        }

        public function aggiungiProdotto($categoria, $prodotto)
        {
            foreach ($this->categorie as $cat) {
                if ($cat->nome == $categoria) {
                    $cat->aggiungiProdotto($prodotto);
                    break;
                }
            }
        }
    }

    // Creazione istanze di categoria e prodotti
    $categoriaCani = new Categoria('Cani');
    $categoriaGatti = new Categoria('Gatti');

    $dentalSnack = new Prodotto('next-dental-stick-mini-7pz.jpg', 'Next Dog Dental Stick 7 Pezzi', 10.99, 'Cani', 'cibo');
    $branchToy = new Prodotto('branch-rametto-in-gomma-beige.jpg', 'Mr. Branch Rametto in Gomma', 15.99, 'Cani', 'gioco');
    $lodgeHouse = new Prodotto('eco-lodge.jpg', 'Cuccia per Cani Eco Lodge', 249.99, 'Cani', 'cuccia');

    $catisfactionSnack = new Prodotto('catisfaction.jpg', 'Catisfactions Snack Gatto', 8.99, 'Gatti', 'cibo');
    $catnipToy = new Prodotto('CATNIP.jpg', 'Euphoria Palla Catnip', 12.99, 'Gatti', 'gioco');
    $cucciaGatto = new Prodotto('36357.jpg', 'Cuccia Igloo Livia', 46.99, 'Gatti', 'cuccia');

    // Creazione dello shop e aggiunta di categorie e prodotti
    $shop = new Shop();
    $shop->aggiungiCategoria($categoriaCani);
    $shop->aggiungiCategoria($categoriaGatti);

    $shop->aggiungiProdotto('Cani', $dentalSnack);
    $shop->aggiungiProdotto('Cani', $branchToy);
    $shop->aggiungiProdotto('Cani', $lodgeHouse);

    $shop->aggiungiProdotto('Gatti', $catisfactionSnack);
    $shop->aggiungiProdotto('Gatti', $catnipToy);
    $shop->aggiungiProdotto('Gatti', $cucciaGatto);

    // Stampare le card dei prodotti
    foreach ($shop->categorie as $categoria) {
        echo "<h2>{$categoria->nome}</h2>";
        foreach ($categoria->prodotti as $prodotto) {
            echo "<div class='prodotto'>";
            echo "<img src='{$prodotto->immagine}' alt='{$prodotto->titolo}'><br>";
            echo "<strong>{$prodotto->titolo}</strong><br>";
            echo "Prezzo: {$prodotto->prezzo}€<br>";
            echo "Categoria: {$prodotto->categoria}<br>";
            echo "Tipo: {$prodotto->tipo}<br>";
            echo "</div>";
        }
    }
    ?>

</body>

</html>