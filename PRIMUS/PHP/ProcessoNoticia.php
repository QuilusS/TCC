<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['texto'];
    $categoria = $_POST['categoria'];
    $imagemCapa = '';
    $imagem = '';

    // Diretório para armazenar as imagens das notícias
    $diretorio = 'Fotos das noticias/';
    if (!is_dir('../IMGS/' . $diretorio)) {
        mkdir('../IMGS/' . $diretorio, 0777, true);
    }

    // Upload da imagem da capa
    if (isset($_FILES['imagemCapa']) && $_FILES['imagemCapa']['error'] == 0) {
        $nomeOriginalCapa = $_FILES['imagemCapa']['name'];
        $caminhoCapa = 'IMGS/' . $diretorio . uniqid('capa_') . '_' . $nomeOriginalCapa;
        if (move_uploaded_file($_FILES['imagemCapa']['tmp_name'], '../' . $caminhoCapa)) {
            $imagemCapa = $caminhoCapa;
        } else {
            $_SESSION['erro_upload'] = "Erro ao salvar a imagem da capa.";
            header("Location: ../PAGINAS/NoticiasEditar.php");
            exit();
        }
    }

    // Upload da imagem da notícia
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $nomeOriginal = $_FILES['imagem']['name'];
        $caminho = 'IMGS/' . $diretorio . uniqid('img_') . '_' . $nomeOriginal;
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], '../' . $caminho)) {
            $imagem = $caminho;
        } else {
            $_SESSION['erro_upload'] = "Erro ao salvar a imagem da notícia.";
            header("Location: ../PAGINAS/NoticiasEditar.php");
            exit();
        }
    }

    // Insere a notícia no banco de dados
    $sql = "INSERT INTO noticias (titulo, descricao, categoria, imagemCapa, imagem) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $titulo, $descricao, $categoria, $imagemCapa, $imagem);

    if ($stmt->execute()) {
        header("Location: ../PAGINAS/Noticias.php");
        exit();
    } else {
        echo "Erro ao criar notícia: " . $conn->error;
    }
}

if (isset($_GET['acao']) && $_GET['acao'] === 'remover' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Busca o caminho das imagens
    $sqlBusca = "SELECT imagemCapa, imagem FROM noticias WHERE id = $id";
    $result = $conn->query($sqlBusca);
    if ($result && $row = $result->fetch_assoc()) {
        // Exclui imagem da capa
        if (!empty($row['imagemCapa']) && file_exists('../' . $row['imagemCapa'])) {
            unlink('../' . $row['imagemCapa']);
        }
        // Exclui imagem da notícia
        if (!empty($row['imagem']) && file_exists('../' . $row['imagem'])) {
            unlink('../' . $row['imagem']);
        }
    }

    $sql = "DELETE FROM noticias WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error: ' . $conn->error;
    }
    exit();
}
?>